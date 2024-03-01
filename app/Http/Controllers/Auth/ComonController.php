<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\Models\ResetPassword;
use App\Events\CompanyResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \stdClass;
use Illuminate\Support\Facades\Http;

class ComonController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset emails and
      | includes a trait which assists in sending these notifications from
      | your application to your users. Feel free to explore this trait.
      |
     */



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    public function loginPage(Request $request)
    {
        return view('templates.vietstar.auth.login2');
    }

    public function resisterPage(Request $request)
    {
        return view('templates.vietstar.auth.register2');
    }
}
