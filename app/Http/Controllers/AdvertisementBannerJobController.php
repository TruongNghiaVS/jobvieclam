<?php

namespace App\Http\Controllers;

use App\Models\AdvertisementBannerJob;
use Illuminate\Http\Request;

class AdvertisementBannerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(Request $request)
        {
                $possition = $request->input("priorities");
                $linkDesktop = $request->input("linkDesktop");
                $linkMobile = $request->input("linkMobile");
                $status = $request->input("status");
                $id =  $request->input("status");
                $item = AdvertisementBannerJob::where("postion", $possition)->firstOrFail();
                if($item)
                {
                    $tiem->linkDesktop = $linkDesktop;
                    $tiem->linkMobile = $linkMobile;
                    $tiem->possition = $possition;
                    $tiem->status = $status;
                    $item->save();
                }
                else 
                {
                    $item = new AdvertisementBannerJob();
                    $tiem->linkDesktop = $linkDesktop;
                    $tiem->linkMobile = $linkMobile;
                    $tiem->possition = $possition;
                    $tiem->status = "1";
                    $item->save();

                }
                return true;
        }

     public function getAll(Request $request)
         {
            $possition = $request->input("postion");
            $query = AdvertisementBannerJob::where("status","1");
            if($possition != "")
            {
                $query = AdvertisementBannerJob::where("possition",$possition);
            }
            return $query->get();
        }

    
}
