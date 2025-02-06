<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Attribute;
use App\Models\ContactLids;
use Illuminate\Http\Request;
use App;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

        //საკონატქტო ინფრომაცია
            $contact = Contact::first();


        $data = array(
            'contact' => $contact,
            'attribute' => $attribute,
        );

        return view('contact.index')->with($data);
    }

    public function message(Request $request){  
   
        //აუცილებელი ველები
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:80'],
            ]);

        //გასაგზავნი ინფორმაცია
            $email = $request->input('email');

        //მომხარებელის აიპი მისამართი
            $ip = $request->ip();

        //მეილზე და ip-ზე შემოწმება
            $check_email = ContactLids::where('email',$email)->first();
            $check_ip = ContactLids::where('ip',$ip)->first();
            if(isset($check_email) || isset($check_ip)){
                return redirect()->to('/')->with('error', trans('title.Message not sent. Email or IP already exists'));;
            }

        //ინფორმაციის შენახვა
            $lids = new ContactLids();
            //იუზერის დაფიქსირება 
                if (auth()->check()) {   
                    $user = auth()->user();
                    $lids->users_id=$user->id;
                }
            $lids->email=$email;
            $lids->ip=$ip;
            $lids->save();

        return redirect()->back()->with('success',trans('title.Your message has been sent successfully'));
    }
}