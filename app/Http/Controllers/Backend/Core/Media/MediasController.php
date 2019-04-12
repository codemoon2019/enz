<?php

namespace App\Http\Controllers\Backend\Core\Media;

use App\Http\Controllers\Controller;

/**
 * Class MediasController.
 */
class MediasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:media');
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return view('backend.core.media.index');
    }
}
