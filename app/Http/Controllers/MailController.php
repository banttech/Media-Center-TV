<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddCustomerEmail;
use App\Mail\RemainderEmail;

class MailController extends Controller
{
    public static function addCustomerEmail($email, $subject)
    {
        $data = [
            'subject' => $subject,
        ];
        Mail::to($email)->send(new AddCustomerEmail($data));
    }

    public static function remainderEmail($email)
    {
        $data = [];
        Mail::to($email)->send(new RemainderEmail($data));
    }
}