<?php

namespace App\Listeners;

use Mail;
use App\Events\UserRegistered;
use App\Mail\UserRegisteredMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserResetPasswordListener implements ShouldQueue
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
     * @param  CompanyRegistered  $event
     * @return void
     */
    public function handle(UserResetPassword $event)
    {
        // Mail::send(new UserRegisteredMailable($event->user));
    }

}
