<?php

namespace App\Http\Controllers;

use App\Mail\SendContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ContactoController extends Controller
{
    public function create()
    {
        return view('contact.form');
    }

    public function send(Request $request){
        $request->validate([
            'subject' => ['required', 'string', 'min:5', 'max:50'],
            'mensaje' => ['required', 'string', 'min:15', 'max:300']
        ]);

        Mail::to(User::first())->send(new SendContactForm($request->subject, $request->mensaje));

        return back()->with("mensaje", " enviado");
    }

}
