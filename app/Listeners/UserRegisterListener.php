<?php

namespace App\Listeners;

use App\Events\UserRegister;
use App\Mail\UserRegisterEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
class UserRegisterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(UserRegister $event)
    {
        $user = $event->user;
        Mail::to($user->email)->send(new UserRegisterEmail($user, $verification_code));
    }
}
