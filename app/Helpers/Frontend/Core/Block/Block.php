<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/11/18
 * Time: 2:09 PM
 */

namespace App\Helpers\Frontend\Core\Block;

use App\Repositories\Core\Block\BlockRepository;

class Block
{
    protected $blockRepository;
    protected $parameters;

    public function __construct()
    {
        $this->blockRepository = resolve(BlockRepository::class);
        $this->parameters = [];
    }

    /**
     * @param array $parameters
     *
     * @return $this
     */
    public function parameters(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @param string $machineName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render(string $machineName)
    {
        $block = $this->blockRepository
            ->skipCriteria()
            ->findWhere([
                'status' => 'enable',
                'machine_name' => $machineName,
            ])->first();

        if (is_null($block)) {
            abort(500, "Block machine name [$machineName] not found.");
        }

        return view(resolve($this->blockRepository->model())::VIEW_FRONTEND_PATH . '.templates.' . $block->template)
            ->with(array_merge([
                'block' => $block,
            ], $this->parameters));
    }
}