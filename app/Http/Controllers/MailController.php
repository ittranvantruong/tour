<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMailContact($form_data, $tour){
        $data = new \stdClass();
        $data->subject = "Liên hệ đặt Tour";
        $data->form_data = $form_data;
        $data->tour = $tour;
        Mail::to( 'kirabboytt@gmail.com')->send(new \App\Mail\ContactMail($data));
    }
}
