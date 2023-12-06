<?php

namespace App\Listeners;

use Mail;
use App\Events\UserRegistered;
use App\Mail\UserRegisteredMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CodeActive;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class UserRegisterdListener implements ShouldQueue
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
    public function handle(UserRegistered $event)
{     
        $data = $event->user;
        
        if($data)
        {

        }
        else 
        {
            return;
        }
        $response = Http::post('http://localhost:8082/sendMailRegisterUV', [
                'emailTo' => $data->email,
                'fullName' =>  $data->name
        ]);
    }

}
