<?php

namespace App\Traits;

use App\ProfileSummary;
use App\User;
use App\Http\Requests\ProfileSummaryFormRequest;

trait ProfileSummaryTrait
{

    public function updateProfileSummary($user_id, ProfileSummaryFormRequest $request)
    {
        ProfileSummary::where('user_id', '=', $user_id)->delete();
        $summary = $request->input('summary');
        $ProfileSummary = new ProfileSummary();
        $ProfileSummary->user_id = $user_id;
        $ProfileSummary->summary = $summary;
        $ProfileSummary->save();

        $userUpdate = User::where('id','=',$user_id)->first();
        $userUpdate->isCompleteIntroduction = true;
        $userUpdate->save();
        /*         * ************************************ */
        return  \Redirect::back()->with('message','Operation Successful !');
    }

}
