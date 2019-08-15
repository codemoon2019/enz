<?php

namespace App\Http\Controllers\Frontend\Subscription;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Subscription\SubscriptionRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\Subscription\Subscription;
use Arcanedev\NoCaptcha\Rules\CaptchaRule;
use Uuid;


use App\Mail\Frontend\Course\CourseMail;
use Mail;
use Illuminate\Support\Facades\Storage;

/**
 * Class SubscriptionController
 *
 * @package App\Http\Controllers\Frontend\Subscription
 */
class SubscriptionController extends Controller
{
    /**
     * @var \App\Repositories\Subscription\SubscriptionRepository
     */
    private $subscriptionsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * SubscriptionController constructor.
     *
     * @param \App\Repositories\Subscription\SubscriptionRepository $subscriptionsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SubscriptionRepository $subscriptionsRepository, PageRepository $pageRepository)
    {
        $model = $subscriptionsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->subscriptionsRepository = $subscriptionsRepository;
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

        MetaTag::setEntity($page);

        $models = $this->repository()->paginate(12);

        return view("{$this->viewFrontendPath}.index", compact('page', 'models', 'Model'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->subscriptionsRepository;
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

            'full_name'     => 'required',
            
            'email_address' => 'required',
            
            'mobile_number' => 'required',
            
            'location'      => 'required',
            
            'school'        => 'required',
            
            'course'        => 'required',
            
            'profession'    => 'required',
            
            'message'       => 'required',
            
            'resume'        => 'required|mimes:doc,pdf,docx,zip',
            
            'g-recaptcha-response' => 'required|captcha',
        
        ]);

        $data = $request->all();

        if ($request['resume'] != null) {

            $file = $request['resume'];

            $name = $file->getClientOriginalName();

            $encrypt_name = Uuid::generate(4)->string;

            $file->storeAs('public/course', $encrypt_name);

            $data['resume'] = json_encode([$name, $encrypt_name]);

        }

        $model = Subscription::create($data);


        // $model->addMedia($request['resume'])->preservingOriginal()->toMediaCollection("document");
        

        // 0 = User / 1 = Admin

        foreach ([0, 1] as $value) {
            
            if ($value) {

                $details = ['to' => env('ADMIN_EMAIL', 'info@enzconsultancy.com'), 'subject' => 'STUDY PATHWAYS INQUIRY ('.$request['school'].' - ' .$request['course']. ') - ' . $request['full_name'], 'type' => $value];

            }else{

                $details = ['to' => $model->email_address, 'subject' => 'STUDY PATHWAYS INQUIRY ('.$request['school'].' - ' .$request['course']. ')', 'type' => $value];
                
            }

            Mail::send(new CourseMail($model, $details));

        }

        session()->flash('flash_success', 'Course Inquiry Submitted');

    }
}
