<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ArticlePage;
use App\Blog_category;
use App\Helpers\DataArrayHelper;
use Image;

class ArticlePageController extends Base
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
            $idInput = $request->input("id");
            $item = ArticlePage::where("id", $idInput)
                    ->first();
     

           
            if($idInput != '-1' )
            {
                $item->title = $title;
                $item->description = $description;
                $item->meta_keywords = $meta_keywords;
                $item->meta_descriptions = $meta_descriptions;
                $item->imageShare = $imageShare;
                $item->content = $content;
                $item->slug = $slug;
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
                $itemInsert->slug = $slug;
                $itemInsert->save();

            }
            return redirect('/admin/article-page');
    }
    public function index()
    {
        $user = ArticlePage::get();
        $data['user'] = $user;
        $categories = Blog_category::get();
        $data['categories'] = $categories;
        return view('admin/articlePage/blogs')->with($data);
    }
    // public function show_form()
    // {
    //     $languages = DataArrayHelper::languagesNativeCodeArray();
    //     $categories = Blog_category::get();
    //     $data['categories'] = $categories;
    //     return view('admin/articlePage/post_form')->with('categories',$categories)->with('languages',$languages);
    // }

    public function show_form($id = null)
    {
        $article =null;
    
        if($id== null)
        {
            $article = new ArticlePage();
            $article->id = "-1";
        }
        else 
        {
            $article = ArticlePage::findOrFail($id);
           
        }
        $languages = DataArrayHelper::languagesNativeCodeArray();
        $categories = Blog_category::get();
        $data['categories'] = $categories;
        return view('admin/articlePage/post_form')->with('categories',$categories)
        ->with('item',$article)
        ->with('languages',$languages);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Tiêu Đề là trường bắt buộc/ The title field is required.',
            'slug.required' => ' Slug là trường bắt buộc/ The slug field is required.',
            'content.required' => ' Nội dung là trường bắt buộc/ The content field is required.',
        ]);

        $image = $request->file('image');
        if ($image != '') {
            $nameonly = preg_replace('/\..+$/', '', $request->image->getClientOriginalName());
            $input['imagename'] = $nameonly . '_' . rand(1, 999) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(222, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/uploads/blogs/');
            $image->move($destinationPath, $input['imagename']);
        }
        $page_slug = $request->slug;
        $slugs = unique_slug($page_slug, 'blogs', $field = 'slug', $key = NULL, $value = NULL);
        if ($request->cate_id != '') {
            $category_Ids = implode(",", $request->cate_id);
        } else {
            $category_Ids = '';
        }

        $blog = new Blog();
        $blog->heading = $request->title;
        $blog->slug = $slugs;
        $blog->cate_id = $category_Ids;
        $blog->content = $request->content;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->lang = $request->lang;
        $blog->meta_descriptions = $request->meta_descriptions;
        if ($image != '') {
            $blog->image = $input['imagename'];
        } else {
            $blog->image = '';
        }
        $blog->save();
        if ($blog->save() == true) {
            $request->session()->flash('message.added', 'success');
            $request->session()->flash('message.content', 'Blog was successfully added!');
        } else {
            $request->session()->flash('message.added', 'danger');
            $request->session()->flash('message.content', 'Error!');
        }
        return redirect('/admin/article-page');
    }

    public function get_blog_by_id($id = '')
    {
        if ($id != '') {
            $row = ArticlePage::findOrFail($id);
            $json_data = json_encode($row);
            echo $json_data;
            return;
        }
    }
    public function get_blog($id = '')
    {
        if ($id != '') {
            $data['languages'] = DataArrayHelper::languagesNativeCodeArray();
            $row = ArticlePage::findOrFail($id);
            $data['blog'] = $row;
            $categories = Blog_category::get();
            $data['categories'] = $categories;
            return view('admin/blogs/update_form')->with($data);
        }
    }

    public function update(Request $request)
    {
        return true;
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json($blog);
    }

    public function remove_blog_feature_image($id)
    {
      return true;
    }
}
