<?php

namespace App\Http\Controllers\Backend\Core\Inquiry;

use App\Repositories\Core\Inquiry\InquiryRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use File;
use Response;
use App\Models\Core\Inquiry;
use Storage;

use App\Exports\InquiryExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class InquiriesController.
 */
class InquiriesController extends BaseController
{
    protected $inquiryRepository;

    /**
     * InquiriesController constructor.
     *
     * @param \App\Repositories\Core\Inquiry\InquiryRepository $inquiryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(InquiryRepository $inquiryRepository)
    {
        $this->inquiryRepository = $inquiryRepository;
        $model = $inquiryRepository->makeModel();
        $this->middleware('permission:' . $model::permission('index'), ['only' => 'index']);
        $this->middleware('permission:' . $model::permission('show'), ['only' => 'show']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        return view($this->repository()->makeModel()::VIEW_BACKEND_PATH . '.index');
    }

    public function repository(): BaseRepository
    {
        return $this->inquiryRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        return view($this->repository()->makeModel()::VIEW_BACKEND_PATH . '.show')->with([
            'model' => $this->getModel($routeKeyName),
        ]);
    }

    public function download(string $routeKeyName)
    {
        $inquiry = Inquiry::whereSlug($routeKeyName)->first();
        $media = $inquiry->getFirstMedia('document');

        $this->manual($media->getPath(), $media->file_name, $media->mime_type);


        // $resume = json_decode($inquiry->resume);

        // $path = storage_path('app/public/inquiry/' . $resume[1]);

        // if (!File::exists($path)) {
        //     abort(404);
        // }

        // return response()->download($path, $resume[0]);

    }

    public function export()
    {
        return Excel::download(new InquiryExport(), 'inquiries.xlsx');
    }

    private function manual(string $path, string $filename, string $mimeType)
    {
        header('Content-Type: '.$mimeType);
        header("Content-Disposition: attachment; filename=\"".$filename."\";");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        if (ob_get_contents()) {
            ob_end_clean();
        }
        flush();
        readfile($path); //showing the path to the server where the file is to be download
        exit;
    }

}
