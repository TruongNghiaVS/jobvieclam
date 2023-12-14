<?php
namespace App\Http\Controllers;



use App\Models\AdvertisementBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementBannerController extends Controller
{
   
        public function createOrUpdate(Request $request)
        {       
            
              
                $possition = $request->input("position");
                $linkDesktop = $request->input("linkDesktop");
                $linkMobile = $request->input("linkMobile");
                $status = $request->input("status");
               
                $item = AdvertisementBanner::where("postion", $possition)->first();
         
                if($item)
                {
                    
                   
                    $item->linkDesktop = $linkDesktop;
                
                    $item->linkMobile = $linkMobile;
                    $item->postion = $possition;
                    $item->status = $status;
            
                    $item->save();
                }
                else 
                {
                    $itemInsert = new AdvertisementBanner();
                
                    $itemInsert->linkDesktop = $linkDesktop;
                    $itemInsert->linkMobile = $linkMobile;
                    $itemInsert->postion = $possition;
                    $itemInsert->status = "1";
                   
                    $itemInsert->save();

                }
                return true;
        }

        public function getAll(Request $request)

         {
            
            $possition = $request->input("position");
            $query = AdvertisementBanner::where("status","1");
            if($possition != "")
            {
                $query = $query->where("postion",$possition);
            }


            
            
            return $query->get();
        }


        public function delete(Request $request)
        {
           $id = $request->input("id");
           $query = AdvertisementBanner::where("id",$id);
           $query->delete();
           return true;
       }

    
}
