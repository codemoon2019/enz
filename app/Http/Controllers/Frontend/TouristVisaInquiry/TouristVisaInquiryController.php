<?php

namespace App\Http\Controllers\Frontend\TouristVisaInquiry;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\TouristVisaInquiry\TouristVisaInquiryRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use App\Mail\Frontend\Tourist\TouristMail;
use Mail;
use Arcanedev\NoCaptcha\Rules\CaptchaRule;


/**
 * Class TouristVisaInquiryController
 *
 * @package App\Http\Controllers\Frontend\TouristVisaInquiry
 */
class TouristVisaInquiryController extends Controller
{
    /**
     * @var \App\Repositories\TouristVisaInquiry\TouristVisaInquiryRepository
     */
    private $touristVisaInquiriesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * TouristVisaInquiryController constructor.
     *
     * @param \App\Repositories\TouristVisaInquiry\TouristVisaInquiryRepository $touristVisaInquiriesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(TouristVisaInquiryRepository $touristVisaInquiriesRepository, PageRepository $pageRepository)
    {
        $model = $touristVisaInquiriesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->touristVisaInquiriesRepository = $touristVisaInquiriesRepository;
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
        return $this->touristVisaInquiriesRepository;
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

            'first_name'       => 'required',
            
            'last_name'        => 'required',
            
            'email_address'    => 'required',
            
            'mobile_number'    => 'required',
            
            'country_to_visit' => 'required',
            
            'inquiry'          => 'required',
            
            'g-recaptcha-response' => 'required|captcha',
        
        ]);

        $model = TouristVisaInquiry::create([

            'first_name'       => $request['first_name'],
            
            'last_name'        => $request['last_name'],
            
            'email_address'    => $request['email_address'],
            
            'mobile_number'    => $request['mobile_number'],
            
            'country_to_visit' => $request['country_to_visit'],
            
            'inquiry'          => $request['inquiry'],
            
        ]);

        // 0 = User / 1 = Admin

        // foreach ([0, 1] as $value) {
            
        //     if ($value) {

        //         switch ($model->country_to_visit) {
                    
        //             case 'Australia': $email = 'australia@enzconsultancy.com'; break;

        //             case 'Canada': $email = 'canada@enzconsultancy.com'; break;
                    
        //             default: $email = 'newzealand@enzconsultancy.com'; break;
                
        //         }

        //         $details = ['to' => $email, 'subject' => 'New Inquiry for ENZ', 'type' => $value];

        //     }else{

        //         $details = ['to' => $model->email_address, 'subject' => 'Inquiry for ENZ', 'type' => $value];
                
        //     }

        //     Mail::send(new TouristMail($model, $details));

        // }

        session()->flash('flash_success', 'Inquiry Success');

        // return redirect()->back()->withFlashSuccess('Inquiry Submitted');

    }

}
