<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\Contact\ReceiveContact;
use App\Mail\Frontend\Contact\SendContact;
use App\Repositories\Core\Inquiry\InquiryRepository;
use DB;
use Mail;
use Illuminate\Http\Request;

use App\Models\Core\Inquiry;

use App\Mail\Frontend\Contact\ContactEmail;


/**
 * Class ContactController
 *
 * @package App\Http\Controllers\Frontend
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * @param \App\Http\Requests\Frontend\Contact\SendContactRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    // public function send(Request $request)
    public function send(SendContactRequest $request)
    {

        $model = Inquiry::create([

            'full_name' => $request['full_name'],
            
            'email'     => $request['email'],
            
            'contact'   => $request['contact'],
            
            'message'   => $request['message'],
            
            'postcode'  => $request['postcode'],
        
        ]);

        // 0 = User / 1 = Admin

        // foreach ([0, 1] as $value) {
            
        //     if ($value) {

        //         $details = ['to' => env('ADMIN_EMAIL', 'nico.halcyondigital@gmai.com'), 'subject' => 'New Inquiry for Riviera Villas', 'type' => $value];

        //     }else{

        //         $details = ['to' => $model->email, 'subject' => 'Inquiry for Riviera Villas', 'type' => $value];
                
        //     }

        //     Mail::send(new ContactEmail($model, $details));

        // }
            
        return redirect()->back()->withFlashSuccess('Inquiry Submitted');

    }
}
