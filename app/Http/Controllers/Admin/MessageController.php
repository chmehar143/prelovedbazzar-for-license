<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendToUser;
use App\Models\Message;
use Notification;


class MessageController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    
    public  function  message()
    {
       // $messages = Message::orderBy('created_at', 'DESC')->groupBy('order_id')->get();
        $messages = NULL;
        return view('admin.message.messagelist', compact('messages'));
    }

    public  function  notifyto(Request $request)
    {
        $user = $request->input('email');
        //dd($user);
        $details=[
            'greeting'=> 'Notification for order no. '.$request->input('order'),
            'subject'=> $request->input('subject'),
            'body'=> $request->input('text'),
            'actiontext'=>'Visit our site',
            'actionurl'=> env('APP_URL'),
            'lastline'=>'Multivendor App',
        ];
       // dd($details);
      //  Notification::send($user, new SendToUser($details));
        Notification::route('mail', $user)->notify(new SendToUser($details));

        if($details){
            $message = new Message();
            $message->admin_id = $request->input('admin_id');
            $message->order_id = $request->input('order');
            $message->email = $request->input('email');
            $message->subject = $details['subject'];
            $message->message = $details['body'];
            $message->save();        
        }

        return back()->with('success', 'Your message was sent successfully! We will contact you soon.');
    }


    public  function  messageview()
    {
        return view('admin.message.messagelist_view');
    }

    public  function  view()
    {
        return view('admin.message.view');
    }

    public  function  details()
    {
        return view('admin.message.details');
    }

    public  function  invoice()
    {
        return view('admin.message.invoice');
    }
}
