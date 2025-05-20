<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }

    public function contact(Request $request){
        $attributes = request()->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:10'],
            'message' => ['required', 'string'],
        ]);
            Mail::to(env('ADMIN_MAIL'))
                ->send(
                    new Contact(
                        $attributes['f_name'],
                        $attributes['l_name'],
                        $attributes['email'],
                        $attributes['phone'],
                        $attributes['message']
                    )
                );
            return redirect()->back()->with('reply', 'We will get back you soon')->withInput();

    }
}
