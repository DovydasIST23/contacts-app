<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmissionMail;
use App\Mail\PDFMail;


class FormController extends Controller
{
    public function submit(Request $request)
    {
        $formData = $request->all();
        $name = request('name');
        $phone = request('phone');
        $email = request('email');
       

        // Išsiunčiame el. laišką su formos duomenimis
        Mail::to('recipient@example.com')->send(new FormSubmissionMail($formData));
        //Mail::to('test@example.com')->send(new PDFMail());

        return back()->with('success', 'Forma sėkmingai pateikta ir kopija išsiųsta el. paštu.');
    }
}

