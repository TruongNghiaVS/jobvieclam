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

class ForgotPasswordController extends Controller
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

use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function RequestResetPassword(Request $request)
    {
        $email = $request->input("email");
        $company = new User();
        $company->email = $email;
        $codegenerate =  Str::random(30);
        // $email = $data->email;
        $companyItem = User::where('email', $email)->first();
        $error = array();
        if($companyItem)
        {
            
        }
        else 
        {
            $itemError = new stdClass();
            $itemError->key ="email";
            $itemError->textError = "Không tồn tại email trong hệ thống";
            array_push($error, $itemError);
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 400);
         
        }
        $codeActive = new ResetPassword();
        $codeActive->code = $codegenerate;
        $codeActive->userId = $companyItem->id;
        $codeActive->type = "2";
        $codeActive->status = "1";
        $codeActive->save();

        $response = Http::post('http://localhost:8082/pushMailResetPassword', [
            'emailTo' => $companyItem->email,
            'isMember'=>1,
            'fullName'=> $companyItem->name,
            'code' =>  $codeActive->code
        ]);
        return response()->json([
                'sucess'=>true,
                "error"=> $error,
                'message' => 'Yêu cầu thành công']
                , 200);
       

    }

}
