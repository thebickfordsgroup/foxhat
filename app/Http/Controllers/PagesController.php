<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{   
    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) 
        {
            Newsletter::subscribe($request->email, ['FNAME'=>$request->fname, 'LNAME'=>$request->lname]);
            
            Session::flash('subscribe', 'subscribe');
        }

        return redirect('/');
    }

    public function postContact(Request $formData)
    {
        $this->validate($formData, [
            'name' => 'min:2',
            'email' => 'required|email',
            'postcode' => 'min:4',
            'phone' => 'min:8',
            'message' => 'min:10']);

        $data = array(
            'name' => $formData->name,
            'email' => $formData->email,
            'postcode' => $formData->postcode,
            'phone' => $formData->phone,
            'content' => $formData->message);

        Mail::send('emails.email', $data, function($message) use ($data)
        {
            $message->from('no-reply@foxhatbrewing.com.au', 'Fox Hat Brewing');
            $message->replyTo('no-reply@foxhatbrewing.com.au', 'Fox Hat Brewing');
            $message->subject('New enquiry from '.$data['name']);
            $message->to('reception@bickfordsgroup.com');
            $message->cc('craig.davies@wheelandbarrow.com.au');
        });

        Session::flash('message', 'message');

        return redirect('/');
    }
}
