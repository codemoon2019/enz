<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/15/19
 * Time: 1:52 PM
 */

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia\HasMedia;

trait CsvImportHelpersTrait
{
    /**
     * @param string $date
     *
     * @return \Illuminate\Support\Carbon
     */
    public function toCarbon(string $date): Carbon
    {
        return now()->parse(str_replace(' - ', ' ', $date));
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function removeExtraSpaces(Collection $collection): Collection
    {
        return $collection->map(function ($string) {
            $string = preg_replace('/\s+/', ' ', $string);
            return trim($string);
        });
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param string                         $notValidString
     *
     * @return bool
     */
    public function isNotValid(Collection $collection, string $notValidString = '<!-- Page cached by Boost @'): bool
    {
        foreach ($collection as $row) {

            if (strpos($row, $notValidString) !== false) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param int|null                       $forceLimiter
     *
     * @return \Illuminate\Support\Collection
     */
    public function limiter(Collection $collection, int $forceLimiter = null)
    {
        $limit = env('DEV_CSV_LIMIT_IMPORT', 6);
        $this->command->comment(get_class($this) . ' using DEV_CSV_LIMIT_IMPORT with value of ' . $limit);

        if ($limit == 0) {
            $this->command->comment('Total: ' . $collection->count());
            return $collection;
        } elseif (!is_null($forceLimiter)) {
            $limit = $forceLimiter;
            $this->command->comment(get_class($this) . ' force limiter used: ' . $limit);
        }
        return $collection->take($limit);
    }

    /**
     * @param \Spatie\MediaLibrary\HasMedia\HasMedia $model
     * @param string|null                            $imageUrl
     * @param string                                 $collectionName
     */
    public function seedImages(HasMedia $model, string $imageUrl = null, string $collectionName = 'images')
    {
        if (empty($imageUrl)) {
            return;
        }

        $https = 'https://';
        $http = 'http://';

        $hasHttps = strpos($imageUrl, $https) !== false;
        $hasHttp = false;

        if (!$hasHttps) {
            $hasHttp = strpos($imageUrl, $http) !== false;
        }

        $delimiterToExplode = $hasHttps ? $https : ($hasHttp ? $http : false);

        if ($delimiterToExplode === false) {
            $this->command->error(__METHOD__ . ' something wrong here ... [' . $imageUrl . ']');
            die();
        }

        $urls = [];
        foreach (explode($delimiterToExplode, $imageUrl) as $url) {
            if (empty($url)) {
                continue;
            }
            $urls[] = $delimiterToExplode . $url;
        }

        $this->command->comment('[' . get_class($this) . '] [' . get_class($model) . '] [' . $model->id . ']');

        $count = count($urls);

        foreach ($urls as $k => $url) {
            $model->addMediaFromUrl($url)->toMediaCollection($collectionName);

            $this->command->info("done!: " . ($count--) . " $url");
        }

        if (isset($urls[0])) {
            $model->metaTag->addMediaFromUrl($urls[0])->toMediaCollection('images');
            $model->metaTag->update([
                'og_image' => $model->metaTag->getFirstMediaUrl('images', 'og_image'),
            ]);
            $this->command->info("meta image done!: {$urls[0]}");
        }

    }

    public function findDate($string)
    {
        $shortenize = function ($string) {
            return substr($string, 0, 3);
        };

        // Define month name:
        $monthNames = array(
            "january",
            "february",
            "march",
            "april",
            "may",
            "june",
            "july",
            "august",
            "september",
            "october",
            "november",
            "december"
        );
        $shortMonthNames = array_map($shortenize, $monthNames);

        // Define day name
        $dayNames = array(
            "monday",
            "tuesday",
            "wednesday",
            "thursday",
            "friday",
            "saturday",
            "sunday"
        );
        $shortDayNames = array_map($shortenize, $dayNames);

        // Define ordinal number
        $ordinalNumber = ['st', 'nd', 'rd', 'th'];
        $day = "";
        $month = "";
        $year = "";

        // Match dates: 01/01/2012 or 30-12-11 or 1 2 1985
        preg_match('/([0-9]?[0-9])[\.\-\/ ]+([0-1]?[0-9])[\.\-\/ ]+([0-9]{2,4})/', $string, $matches);
        if ($matches) {
            if ($matches[1]) {
                $day = $matches[1];
            }
            if ($matches[2]) {
                $month = $matches[2];
            }
            if ($matches[3]) {
                $year = $matches[3];
            }
        }

        // Match dates: Sunday 1st March 2015; Sunday, 1 March 2015; Sun 1 Mar 2015; Sun-1-March-2015
        preg_match('/(?:(?:' . implode('|', $dayNames) . '|' . implode('|',
                $shortDayNames) . ')[ ,\-_\/]*)?([0-9]?[0-9])[ ,\-_\/]*(?:' . implode('|',
                $ordinalNumber) . ')?[ ,\-_\/]*(' . implode('|', $monthNames) . '|' . implode('|',
                $shortMonthNames) . ')[ ,\-_\/]+([0-9]{4})/i', $string, $matches);
        if ($matches) {
            if (empty($day) && $matches[1]) {
                $day = $matches[1];
            }
            if (empty($month) && $matches[2]) {
                $month = array_search(strtolower($matches[2]), $shortMonthNames);
                if (!$month) {
                    $month = array_search(strtolower($matches[2]), $monthNames);
                }
                $month = $month + 1;
            }
            if (empty($year) && $matches[3]) {
                $year = $matches[3];
            }
        }

        // Match dates: March 1st 2015; March 1 2015; March-1st-2015
        preg_match('/(' . implode('|', $monthNames) . '|' . implode('|',
                $shortMonthNames) . ')[ ,\-_\/]*([0-9]?[0-9])[ ,\-_\/]*(?:' . implode('|',
                $ordinalNumber) . ')?[ ,\-_\/]+([0-9]{4})/i', $string, $matches);
        if ($matches) {
            if (empty($month) && $matches[1]) {
                $month = array_search(strtolower($matches[1]), $shortMonthNames);
                if (!$month) {
                    $month = array_search(strtolower($matches[1]), $monthNames);
                }
                $month = $month + 1;
            }
            if (empty($day) && $matches[2]) {
                $day = $matches[2];
            }
            if (empty($year) && $matches[3]) {
                $year = $matches[3];
            }
        }

        // Match month name:
        if (empty($month)) {
            preg_match('/(' . implode('|', $monthNames) . ')/i', $string, $matchesMonthWord);
            if ($matchesMonthWord && $matchesMonthWord[1]) {
                $month = array_search(strtolower($matchesMonthWord[1]), $monthNames);
            }

            // Match short month names
            if (empty($month)) {
                preg_match('/(' . implode('|', $shortMonthNames) . ')/i', $string, $matchesMonthWord);
                if ($matchesMonthWord && $matchesMonthWord[1]) {
                    $month = array_search(strtolower($matchesMonthWord[1]), $shortMonthNames);
                }
            }
            $month = $month + 1;
        }

        // Match 5th 1st day:
        if (empty($day)) {
            preg_match('/([0-9]?[0-9])(' . implode('|', $ordinalNumber) . ')/', $string, $matchesDay);
            if ($matchesDay && $matchesDay[1]) {
                $day = $matchesDay[1];
            }
        }

        // Match Year if not already setted:
        if (empty($year)) {
            preg_match('/[0-9]{4}/', $string, $matchesYear);
            if ($matchesYear && $matchesYear[0]) {
                $year = $matchesYear[0];
            }
        }
        if (!empty ($day) && !empty ($month) && empty($year)) {
            preg_match('/[0-9]{2}/', $string, $matchesYear);
            if ($matchesYear && $matchesYear[0]) {
                $year = $matchesYear[0];
            }
        }

        // Day leading 0
        if (1 == strlen($day)) {
            $day = '0' . $day;
        }

        // Month leading 0
        if (1 == strlen($month)) {
            $month = '0' . $month;
        }

        // Check year:
        if (2 == strlen($year) && $year > 20) {
            $year = '19' . $year;
        } else {
            if (2 == strlen($year) && $year < 20) {
                $year = '20' . $year;
            }
        }
        $date = array(
            'year' => $year,
            'month' => $month,
            'day' => $day
        );

        // Return false if nothing found:
        if (empty($year) && empty($month) && empty($day)) {
            return false;
        } else {
            return $date;
        }
    }
}