<?php

namespace App\Http\Controllers\Frontend\MigrationVisa;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\MigrationVisa\MigrationVisaRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use Mail;
use App\Models\MigrationVisa\MigrationVisa;

use App\Mail\Frontend\Contact\ContactEmail;

use Illuminate\Support\Facades\Storage;
use Uuid;

/**
 * Class MigrationVisaController
 *
 * @package App\Http\Controllers\Frontend\MigrationVisa
 */
class MigrationVisaController extends Controller
{
    /**
     * @var \App\Repositories\MigrationVisa\MigrationVisaRepository
     */
    private $migrationVisasRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * MigrationVisaController constructor.
     *
     * @param \App\Repositories\MigrationVisa\MigrationVisaRepository $migrationVisasRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MigrationVisaRepository $migrationVisasRepository, PageRepository $pageRepository)
    {
        $model = $migrationVisasRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->migrationVisasRepository = $migrationVisasRepository;
        $this->pageRepository = $pageRepository;
        $this->viewFrontendPath = $model::VIEW_FRONTEND_PATH;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $model = $this->repository()->makeModel();
        $page = $this->pageRepository->indexPage($this->repository()->model());
        $Model = $model;
        $homeNews = homeNews();
        MetaTag::setEntity($page);

        // $models = $this->repository()->paginate(12);

        return view("{$this->viewFrontendPath}.index", compact('page', 'Model','homeNews'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->migrationVisasRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        $page = $model = $this->getModel($routeKeyName, false);

        MetaTag::setEntity($model);

        return view("{$this->viewFrontendPath}.show", compact('model', 'page'));
    }

    public function inquiry(Request $request)
    {

        $validatedData = $request->validate([

            'full_name'            => 'required|max:255',
            
            'profession'           => 'required|max:255',
            
            'email_address'        => 'required|email|max:255',
            
            'mobile_number'        => 'required',
            
            'inquiry'              => 'required|max:255',
            
            'location'             => 'required|max:255',
            
            // 'country'              => 'required',
            
            'resume'               => 'required|mimes:doc,pdf,docx,zip',
            
            'g-recaptcha-response' => 'required|captcha'
        
        ]);


        $filename = null;

        if ($request['resume'] != null) {

            $file = $request['resume'];

            $name = $file->getClientOriginalName();

            $encrypt_name = Uuid::generate(4)->string;

            $file->storeAs('public/inquiry', $encrypt_name);

            $filename = json_encode([$name, $encrypt_name]);

        }

        $model = MigrationVisa::create([

            'full_name'     => $request['full_name'],
            
            'profession'    => $request['profession'],
            
            'email_address' => $request['email_address'],
            
            'mobile_number' => $request['mobile_number'],
            
            'location'      => $request['location'],
            
            'inquiry'       => $request['inquiry'],
            
            // 'country'       => $request['country'],
            
            'resume'        => $filename,
        
        ]);

        // $model->addMedia($request['resume'])->preservingOriginal()->toMediaCollection("document");

        // 0 = User / 1 = Admin

        foreach ([0, 1] as $value) {
            
            if ($value) {

                $details = ['to' => 'migration@enzconsultancy.com', 'subject' => 'STUDY PATHWAYS INQUIRY', 'type' => $value];

            }else{

                $details = ['to' => $model->email_address, 'subject' => 'STUDY PATHWAYS INQUIRY', 'type' => $value];
                
            }

            Mail::send(new ContactEmail($model, $details));

        }

    }
}
