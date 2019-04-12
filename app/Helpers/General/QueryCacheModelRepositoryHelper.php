<?php
namespace App\Helpers\General;

use Closure;
use ReflectionObject;

class QueryCacheModelRepositoryHelper
{
    /**
     * @var
     */
    private static $storeFile;
    /**
     * @var \Illuminate\Cache\CacheManager|\Illuminate\Foundation\Application|mixed
     */
    private $cache;

    /**
     * QueryCacheModelRepositoryHelper constructor.
     */
    public function __construct()
    {
        self::getFilePath();
        $this->cache = app('cache');
    }

    public static function getFilePath()
    {
        return self::$storeFile = storage_path('framework/cache/query-cache-model-repository.json');
    }

    /**
     * @param \Closure $closure
     * @param          $keys
     *
     * @return mixed
     */
    public function queryCache(Closure $closure, $keys)
    {
//        if (config('cache.default') == 'array' OR strpos(app('request')->headers->get('user-agent'), 'GuzzleHttp') !== false) {
//            return $closure();
//        }

        $keys = array_wrap($keys);

        $r = new ReflectionObject($closure);
        $keys[] = md5((string)$r);

        $key = $this->getKeys($keys);

        self::storeKeys($key);

        return $this->cache->remember($key, config('repository.cache.minutes'), $closure);
    }

    /**
     * @param array $args
     *
     * @return string
     */
    private function getKeys(array $args)
    {
        $args = serialize(implode('-', $args));

        // get who call this
        $backTrace = debug_backtrace()[2];

        try {
            $called = "{$backTrace['class']}@{$backTrace['function']}";
        } catch (\Exception $e) {
            $called = 'noneClass@xxx';
        }
        $host = parse_url(app('url')->to('/'))['host'];

        return sprintf('%s:%s-%s', $host, $called, md5($called . $args . app('request')->fullUrl()));
    }

    /**
     * @param $key
     */
    private static function storeKeys($key)
    {
        $content = self::getStoredKeys();

        if (!in_array($key, $content)) {
            $content[] = $key;
        }

        self::putToJson($content);
    }

    private static function getStoredKeys(): array
    {
        if (!file_exists(self::$storeFile)) {
            self::putToJson([]);
            return [];
        }
        return json_decode(file_get_contents(self::$storeFile), true) ?: [];
    }

    private static function putToJson(array $data)
    {
        file_put_contents(self::$storeFile, json_encode($data));
    }

    /**
     * @throws \Exception
     */
    public function flush()
    {
        foreach (self::getStoredKeys() as $key) {
            $this->cache->forget($key);
        }
        self::putToJson([]);
    }
}