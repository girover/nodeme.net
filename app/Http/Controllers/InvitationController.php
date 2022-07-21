<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteRequest;
use App\Mail\Invitation;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    /**
     * Display the activation form to send email
     */
    public function create()
    {
        return view('user.invitation.form');
    }

    /**
     * Sending Invitation Email to 
     * 
     * @param \Illuminate\Http\Request
     */
    public function invite(InviteRequest $request)
    {
        Mail::to('girover.mhf@gmail.com')->send(new Invitation($request->user()));

        return back()->with('success', 'E-mail sent successfully');
    }
}
