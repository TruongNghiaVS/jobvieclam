<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\ArticlePage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function createOrUpdate(Request $request)
    {
            $title = $request->input("title");
            $description = $request->input("description");
            $imageShare = $request->input("imageShare");
            $content = $request->input("content");
            $meta_keywords = $request->input("meta_keywords");
            $meta_descriptions = $request->input("meta_descriptions");
            $slug = $request->input("slug");
            $item = ArticlePage::where("slug", $slug)
                    ->first();

           
            if($item)
            {
                $item->title = $title;
                $item->description = $description;
                $item->meta_keywords = $meta_keywords;
                $item->meta_descriptions = $meta_descriptions;
                $item->imageShare = $imageShare;
                $item->content = $content;
                $item->save();
            }
            else 
            {
                $itemInsert = new ArticlePage();
                $itemInsert->title = $title;
                $itemInsert->description = $description;
                $itemInsert->imageShare = $imageShare;
                $itemInsert->content = $content;
                $itemInsert->meta_keywords = $meta_keywords;
                $itemInsert->meta_descriptions = $meta_descriptions;
                $itemInsert->slug = Str::slug($title);
                $itemInsert->save();

            }
            return redirect('/admin/article-page');
    }
    public function getBYid(Request $request)
    {
            $title = $request->input("id");
           
            $item = ArticlePage::where("id", $slug)
                    ->first();
            
            return $item;
    }
    public function GetArticle($slug)
    {
       
        $item = ArticlePage::where("slug", $slug)->first();
        
        if($item)
        {
            return view("templates.vietstar.article.post", compact($item));
        }
        else 
        {
            abort(404);

        }

    }
    public function delete(Request $request)
        {
           $id = $request->input("id");
           $query = ArticlePage::where("id",$id);
           $query->delete();
           return true;
       }
}
