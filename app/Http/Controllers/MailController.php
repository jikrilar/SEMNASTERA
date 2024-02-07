<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index()
    {
        try {
            Mail::to('dislytte060@gmail.com')->send(new MailNotify());
            return response()->json(['Send email succesfully']);
        } catch (\Throwable $th) {
            return response()->json(['Something went wrong']);
        }
    }
}
