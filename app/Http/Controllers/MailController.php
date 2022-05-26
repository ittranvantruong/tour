<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMailContact($form_data, $tour){
        $cc_email = Setting::where('key', 'site_email')->value('plain_value');
        $data = new \stdClass();
        $data->subject = "Liên hệ đặt Tour";
        $data->form_data = $form_data;
        $data->tour = $tour;
        Mail::to($form_data->email)->cc($cc_email)->send(new \App\Mail\ContactMail($data));
    }
}
