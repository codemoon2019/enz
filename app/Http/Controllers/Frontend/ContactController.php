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

use Illuminate\Support\Facades\Storage;
use Uuid;



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
        $filename = null;

        if ($request['resume'] != null) {

            $file = $request['resume'];

            $name = $file->getClientOriginalName();

            $encrypt_name = Uuid::generate(4)->string;

            $file->storeAs('public/inquiry', $encrypt_name);

            $filename = json_encode([$name, $encrypt_name]);

        }

        $model = Inquiry::create([

            'full_name'     => $request['full_name'],
            
            'profession'    => $request['profession'],
            
            'email_address' => $request['email_address'],
            
            'mobile_number' => $request['mobile_number'],
            
            'location'      => $request['location'],
            
            'inquiry'       => $request['inquiry'],
            
            'consultation'  => $request['consultation'],
            
            'country'       => $request['country'],
            
            'resume'        => $filename,
        
        ]);

        // 0 = User / 1 = Admin

        foreach ([0, 1] as $value) {
            
            if ($value) {

                switch ($model->country) {
                    
                    case 'Australia': $email = 'australia@enzconsultancy.com'; break;

                    case 'Canada': $email = 'canada@enzconsultancy.com'; break;
                    
                    default: $email = 'newzealand@enzconsultancy.com'; break;
                
                }

                $details = ['to' => $email, 'subject' => 'STUDY PATHWAYS INQUIRY', 'type' => $value];

            }else{

                $details = ['to' => $model->email_address, 'subject' => 'STUDY PATHWAYS INQUIRY', 'type' => $value];
                
            }

            Mail::send(new ContactEmail($model, $details));

        }
            
        return redirect()->back()->withFlashSuccess('Inquiry Submitted');

    }
}
