<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/6/18
 * Time: 10:14 AM
 */

namespace App\Helpers\Frontend\Core\Slide;


use App\Repositories\Core\Domain\DomainRepository;
use App\Repositories\Core\Slide\SlideRepository;

class Slider
{
    protected $sliderRepository;
    protected $domainRepository;
    private $viewPath;

    public function __construct()
    {
        $this->sliderRepository = resolve(SlideRepository::class);
        $this->domainRepository = resolve(DomainRepository::class);
        $this->viewPath = $this->sliderRepository->model()::VIEW_FRONTEND_PATH;
    }

    /**
     * @param string $machineName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \Exception
     */
    public function render(string $machineName)
    {
        $slider = $this->getByMachineName($machineName);

        if (is_null($slider)) {
            return '';
        }

        if ($slider->status != 'enable') {
            return '';
        }

        return view("{$this->viewPath}.{$slider->template}")->with([
            'slider' => $slider,
        ]);
    }

    /**
     * @param string $machineName
     *
     * @return mixed
     * @throws \Exception
     */
    private function getByMachineName(string $machineName)
    {
        return app('query.cache')->queryCache(function () use ($machineName) {
            return $this->domainRepository
                ->getInstanceByBaseUrl()
                ->sliders()
                ->where([
                    'machine_name' => $machineName,
                ])->first();
        }, $machineName);
    }
}