<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class EmailController extends Controller
{
    public function index(){
        $data = [
            'to'      => 'doyalbiplob1@gmail.com',
            'subject' => 'Test Mail',
            'message' => 'This is a test mail',
            'name'    => 'Biplob',

        ];
        // Mail::to('doyalbiplob1@gmail.com')->send(new TestMail());
        Mail::to($data['to'])->send(new TestMail($data));
        return "Your mail has been send successfully!";
    }
}
