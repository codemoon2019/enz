<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/13/18
 * Time: 8:13 AM
 */

namespace App\Helpers\General\Core;

//use App\Repositories\Core\Setting\SettingRepository;
use App\Repositories\Core\Domain\DomainRepository;

class Setting
{
//    protected $settingRepository;
    protected $domainRepository;

    public function __construct()
    {
//        $this->settingRepository = app(SettingRepository::class);
        $this->domainRepository = app(DomainRepository::class);
    }

    /**
     * @param string $machineName
     *
     * @return mixed|null
     * @throws \Exception
     */
    public function get(string $machineName)
    {
        $setting = app('query.cache')->queryCache(function () use ($machineName) {
            return $this->domainRepository
                ->getInstanceByBaseUrl()
                ->settings()
                ->where([
                    'machine_name' => $machineName,
                ])
                ->first();
        }, $machineName);

        $value = null;
        switch ($machineName) {
            case 'site-fav-icon':
                $value = $setting->getFirstMediaUrl($setting->collection_name);
                break;
            case 'site-logo':
                $value = $setting;
                break;
            default:
                $value = $setting->value;
                break;
        }

        return $value;
    }
}