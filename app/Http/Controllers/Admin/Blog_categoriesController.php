<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Auth;
use App\Blog_category;
use Image;

class Blog_categoriesController extends Base
{

    public function index(Request $request)
    {
        $typepost = $request->query("typePost");

        $user = Blog_category::where("typePost", '!=' , "1")->get();
        if($typepost == "1")
        {
            $user = Blog_category::where("typePost" , "1")->get();
        }
        else 
        {
            $typepost = "0";
        }
  
        return view('admin/blog_categories/blog_categories', compact('user'))->with("typepost",$typepost);
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
        ], [
            'title.required' => ' Tiêu đề là trường bắt buộc/ The title field is required.',
            'slug.required' => ' Slug là trường bắt buộc/ The slug field is required.',
        ]);
        $blog_category = new Blog_category();
        $page_slug = $request->slug;
        $slugs = unique_slug($page_slug, 'blog_categories', $field = 'slug', $key = NULL, $value = NULL);
        $blog_category->heading = $request->title;

        $blog_category->slug = $slugs;
        $blog_category->typepost =  $request->input("typepost");
        
        $blog_category->save();
        if ($blog_category->save() == true) {
            $request->session()->flash('message.added', 'success');
            $request->session()->flash('message.content', 'Danh mục được thêm thành công/ Category added successfully !');
        } else {
            $request->session()->flash('message.added', 'danger');
            $request->session()->flash('message.content', 'Error!');
        }
        return redirect('/admin/blog_category?typePost='.$blog_category->typepost);
    }
    public function get_blog_category_by_id($id = '')
    {
        if ($id != '') {
            $row = Blog_category::findOrFail($id);
            $json_data = json_encode($row);
            echo $json_data;
            return;
        }
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title_update' => 'required',
            'slug_update' => 'required',
        ], [
            'title_update.required' => ' Tiêu đề là trường bắt buộc/ The title field is required.',
            'slug_update.required' => ' Slug là trường bắt buộc/ The slug field is required.',
        ]);
     
        $blog_category = Blog_category::findOrFail($request->id);
  
        $blog_category->heading = $request->title_update;
        $blog_category->slug = $request->slug_update;
        $blog_category->typepost =  $request->input("typepost");
      
        $blog_category->save();
       
        if ($blog_category->save() == true) {
            $request->session()->flash('message.updated', 'success');
            $request->session()->flash('message.content', 'Category updated successfully!');
        } else {
            $request->session()->flash('message.updated', 'danger');
            $request->session()->flash('message.content', 'Error!');
        }
        return redirect('/admin/blog_category?typePost='.$blog_category->typepost);
    }


    public function destroy($idCa, Request $request)
    {
        $blog_category2 = Blog_category::findOrFail($idCa);
   
        $blog_category2->delete();

        return response()->json($blog_category2);
    }
}
