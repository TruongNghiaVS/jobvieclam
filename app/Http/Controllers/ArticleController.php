<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{

    public function GetArticle($slug)
    {
        return view("templates.vietstar.article.post");
     
    }
}
