<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\ArticlePage;

class ArticleController extends Controller
{

    public function createOrUpdate(Request $request)
    {
            $title = $request->input("title");
            $linkDesktop = $request->input("description");
            $linkMobile = $request->input("imageShare");
            $status = $request->input("content");
            $slug = $request->input("slug");
            $item = ArticlePage::where("slug", $slug)
                    ->firstOrFail();
            if($item)
            {
                $tiem->title = $title;
                $tiem->description = $description;
                $tiem->imageShare = $imageShare;
                $tiem->content = $content;
                $item->save();
            }
            else 
            {
                $item = new ArticlePage();
                $tiem->title = $title;
                $tiem->description = $description;
                $tiem->imageShare = $imageShare;
                $tiem->content = $content;
                $item->slug = Str::slug($title);
                $item->save();

            }
            return true;
    }

    public function GetArticle($slug)
    {

        $item = ArticlePage::where("slug", $slug)->firstOrFail();
        if($item)
        {
            return view("templates.vietstar.article.post", compact($item));
        }
        else 
        {
            abort(404);

        }

    }
}
