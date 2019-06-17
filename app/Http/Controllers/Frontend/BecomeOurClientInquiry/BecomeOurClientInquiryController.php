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

        // 0 = User / 1 = Admin

        foreach ([0, 1] as $value) {
            
            if ($value) {

                // switch ($model->country) {
                    
                //     case 'Australia': $email = 'australia@enzconsultancy.com'; break;

                //     case 'Canada': $email = 'canada@enzconsultancy.com'; break;
                    
                //     default: $email = 'newzealand@enzconsultancy.com'; break;
                
                // }

                $details = ['to' => 'australia@enzconsultancy.com', 'subject' => 'New Inquiry for ENZ', 'type' => $value];

            }else{

                $details = ['to' => $model->email, 'subject' => 'Inquiry for ENZ', 'type' => $value];
                
            }

            Mail::send(new BecomeOurClientMail($data, $details));

        }


        return redirect()->back()->withFlashSuccess('Submitted Successfully');

    }
}
