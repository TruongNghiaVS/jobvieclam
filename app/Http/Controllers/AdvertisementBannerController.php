<?php

namespace App\Http\Controllers;

use App\Models\AdvertisementBanner;
use Illuminate\Http\Request;

class AdvertisementBannerController extends Controller
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
                $possition = $request->input("postion");
                $linkDesktop = $request->input("linkDesktop");
                $linkMobile = $request->input("linkMobile");
                $status = $request->input("status");
                $item = AdvertisementBanner::where("postion", $possition)->firstOrFail();
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
                    $item = new AdvertisementBanner();
                    $tiem->linkDesktop = $linkDesktop;
                    $tiem->linkMobile = $linkMobile;
                    $tiem->possition = $possition;
                    $tiem->status = "1";
                    $item->save();

                }
                return $item;
        }

     public function getAll(Request $request)
         {
            $possition = $request->input("postion");
            $query = AdvertisementBanner::where("status","1");
            if($possition != "")
            {
                $query = AdvertisementBanner::where("possition",$possition);
            }
            return $query->get();
        }

    
}
