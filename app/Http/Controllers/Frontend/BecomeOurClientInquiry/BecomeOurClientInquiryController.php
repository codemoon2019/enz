<?php

namespace App\Http\Controllers\Frontend\BecomeOurClientInquiry;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use Illuminate\Support\Facades\Storage;
use Uuid;

use Mail;
use App\Mail\Frontend\Client\BecomeOurClientMail;


/**
 * Class BecomeOurClientInquiryController
 *
 * @package App\Http\Controllers\Frontend\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryController extends Controller
{
    /**
     * @var \App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository
     */
    private $becomeOurClientInquiriesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * BecomeOurClientInquiryController constructor.
     *
     * @param \App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository $becomeOurClientInquiriesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(BecomeOurClientInquiryRepository $becomeOurClientInquiriesRepository, PageRepository $pageRepository)
    {
        $model = $becomeOurClientInquiriesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->becomeOurClientInquiriesRepository = $becomeOurClientInquiriesRepository;
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
        return $this->becomeOurClientInquiriesRepository;
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

        $data = $request->all();

        $validation = [

            'first_name'           => 'required',
            
            'last_name'            => 'required',
            
            'middle_name'          => 'required',
            
            'country_birth'        => 'required',
            
            'passport_number'      => 'required',
            
            'citizenship'          => 'required',
            
            'month'                => 'required',
            
            'day'                  => 'required',
            
            'year'                 => 'required',
            
            'expiry_month'         => 'required',
            
            'expiry_day'           => 'required',
            
            'expiry_year'          => 'required',
            
            'street_number'        => 'required',
            
            'street_name'          => 'required',
            
            'town'                 => 'required',
            
            'province'             => 'required',
            
            'zip_code'             => 'required',
            
            'email'                => 'required',
            
            'mobile_number'        => 'required',
            
            'telephone_number'     => 'required',
            
            'elementary_school'    => 'required',
            
            'elementary_from'      => 'required',
            
            'elementary_to'        => 'required',
            
            'high_school_school'   => 'required',
            
            'high_school_from'     => 'required',
            
            'high_school_to'       => 'required',
            
            'tertiary_school'      => 'required',
            
            'tertiary_from'        => 'required',
            
            'tertiary_to'          => 'required',
            
            'declaration_1'        => 'required',
            
            'declaration_2'        => 'required',
            
            'declaration_3'        => 'required',
            
            'declaration_4'        => 'required',
            
            'declaration_5'        => 'required',
            
            'file'                 => 'required|mimes:png,jpeg,jpg,svg',
            
            'g-recaptcha-response' => 'required|captcha',
        
        ];


        if ($data['employment_status'] != 'Unemployed') {

            $validation['employment_status_name'] = 'required';

            $validation['employment_status_from'] = 'required';

            $validation['employment_status_to'] = 'required';

        }

        $validatedData = $request->validate($validation);

        $data['date_of_birth'] = $data['month'] . ' ' .$data['day'] . ', ' . $data['year'];

        $data['expiry_date'] = $data['expiry_month'] . ' ' .$data['expiry_day'] . ', ' . $data['expiry_year'];

        if ($request['file'] != null) {

            $file = $request['file'];

            $name = $file->getClientOriginalName();

            $encrypt_name = Uuid::generate(4)->string;

            $file->storeAs('public/client_inquiry', $encrypt_name);

            $data['file'] = json_encode([$name, $encrypt_name]);

        }

        $model = BecomeOurClientInquiry::create($data);

        $model->otherDetails()->create($data);

        session()->flash('flash_success', 'Application Submitted');

        // 0 = User / 1 = Admin

        foreach ([0, 1] as $value) {
            
            if ($value) {

                // switch ($model->country) {
                    
                //     case 'Australia': $email = 'australia@enzconsultancy.com'; break;

                //     case 'Canada': $email = 'canada@enzconsultancy.com'; break;
                    
                //     default: $email = 'newzealand@enzconsultancy.com'; break;
                
                // }

                $details = ['to' => 'info@enzconsultancy.com', 'subject' => 'STUDY PATHWAYS INQUIRY', 'type' => $value];

            }else{

                $details = ['to' => $model->email, 'subject' => 'STUDY PATHWAYS INQUIRY', 'type' => $value];
                
            }

            Mail::send(new BecomeOurClientMail($data, $details, $model));

        }


        // return redirect()->back()->withFlashSuccess('Submitted Successfully');

    }
}
