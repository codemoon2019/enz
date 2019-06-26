<?php

namespace App\Http\Controllers\Frontend\Event;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Event\EventRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\Event\EventInquiry;
use Mail;

use App\Mail\Frontend\Event\EventMail;


/**
 * Class EventController
 *
 * @package App\Http\Controllers\Frontend\Event
 */
class EventController extends Controller
{
    /**
     * @var \App\Repositories\Event\EventRepository
     */
    private $eventsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * EventController constructor.
     *
     * @param \App\Repositories\Event\EventRepository $eventsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(EventRepository $eventsRepository, PageRepository $pageRepository)
    {
        $model = $eventsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->eventsRepository = $eventsRepository;
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

        $models = activeEvents();

        return view("{$this->viewFrontendPath}.index", compact('page', 'models', 'Model'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->eventsRepository;
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

            'first_name'           => 'required',
            
            'last_name'            => 'required',
            
            'email_address'        => 'required',
            
            'contact_number'       => 'required',
            
            'address'              => 'required',
            
            'profession'           => 'required',
            
            'g-recaptcha-response' => 'required|captcha',
        
        ]);

        // dd($request->all());

        $model = EventInquiry::create([
            
            'event_id'       => $request['event_id'],
            
            'first_name'     => $request['first_name'],
            
            'last_name'      => $request['last_name'],
            
            'email_address'  => $request['email_address'],
            
            'address'        => $request['address'],
            
            'contact_number' => $request['contact_number'],
            
            'profession'     => $request['profession'],
            
        ]);

        // 0 = User / 1 = Admin

        foreach ([0, 1] as $value) {
            
            if ($value) {

                $details = ['to' => env('ADMIN_EMAIL', 'info@enzconsultancy.com'), 'subject' => 'New Event Inquiry for ENZ', 'type' => $value];

            }else{

                $details = ['to' => $model->email_address, 'subject' => 'Event Inquiry for ENZ', 'type' => $value];
                
            }

            Mail::send(new EventMail($model, $details));

        }

        session()->flash('flash_success', 'Event Inquiry Success');

        // return redirect()->back()->withFlashSuccess('Inquiry Submitted');

    }
}
