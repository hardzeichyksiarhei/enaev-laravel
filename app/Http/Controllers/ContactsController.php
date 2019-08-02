<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

use App\Mail\OrderEmail;

class ContactsController extends Controller
{
    public function index() {
        return view('contacts');
    }

    public function send(Request $request) {
        $message = $request->all();

        $name = isset($message['name']) ? $message['name'] : '';
        $email = isset($message['email']) ? $message['email'] : '';
        $contact = isset($message['contact']) ? $message['contact'] : '';
        $caption = isset($message['caption']) ? $message['caption'] : '';
        $message = $message['message'];

        $order = Order::create([
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'caption' => $caption,
            'message' => $message
        ]);

        Mail::to("hardzeichyksiarhei@gmail.com")->send(new OrderEmail($order));

        return response()->json(['success'=>'Order Add']);
    }
}
