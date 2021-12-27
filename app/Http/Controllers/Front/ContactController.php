<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
use App\Models\Websit;
use App\Notifications\NewContactNotification;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ContactController extends Controller
{
    public function viewContact()
    {
        $setting = Websit::first();
        return view('frontend.contact',[
            'setting' => $setting,
        ]);
    }

    public function store(ContactRequest $request)
    {
        # code...
        DB::beginTransaction();

        try{
            $contact = Contact::create($request->validated());

            //User::where('id',1)->notify(new NewOrderNotification());
            foreach(User::get() as $user){
                $user->notify(new NewContactNotification($contact));
            }

            DB::commit();
        }catch(Throwable $e){
            DB::rollBack();
            return redirect()->back()->with('error','Operation Failed!');
        }


        if($contact)
        {
            return redirect()->back()->with('success','the message has been sent successfully');
        }
    }

}
