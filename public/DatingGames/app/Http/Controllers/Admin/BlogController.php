<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\Blog;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function showBlogCats()
    {
        $blogCategories = BlogCategory::paginate(10);
        return view('admin/blogs/blogcats_show',['blogCategories' => $blogCategories, 'search' => '',]);
    }

    public function searchBlogCats(Request $request) {
        $search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterBlogCategories= BlogCategory::where ( 'name', 'LIKE', '%' . $search_parameter . '%' )
        ->paginate(10)->setPath( '' );
        return view('admin/blogs/blogcats_show', 
        [
            'blogCategories' => $filterBlogCategories, 
            'search' => $request->search
            ]);
       }
       return $this->showBlogCats();
    }

    public function showCreateBlogCats() {
       return view('admin/blogs/blogcats_create');
    }

    public function createBlogCats(Request $request) {
        $blogCategory = new \App\BlogCategory($request->all());
        $blogCategory->save();
        return redirect()->route('admin.blogCat.showBlogCats')->with('flash_message','Blog Category has been added successfully');
    }

    public function destroyBlogCat(Request $request) {
        if ($request->id) {
           $blogCategory = BlogCategory::find($request->id);
           $blogCategory->delete();
           return response()->json(['message' => 'Blog Category has been deleted successfully'], 200);
        }
           return response()->json(['message' => 'Blog Category Id is required'], 400);
   }

   public function showEditBlogCat(Request $request, $slug) {
    $blogCat = BlogCategory::findBySlugOrFail($slug);
       return view('admin/blogs/blogcats_edit', ['blogCat' => $blogCat]);
   }

   public function updateBlogCat(Request $request, $slug) {
    $blogCat = BlogCategory::findBySlugOrFail($slug);
    $blogCat->update($request->all());
    return redirect()->route('admin.blogCat.showBlogCats')->with('flash_message','Blog Category has been updated successfully');
   }

   public function showBlogs() {
       $blogs = Blog::paginate(10);
       return view('admin/blogs/blogs_show', ['blogs' => $blogs, 'search' => '']);
   }

   public function searchBlog(Request $request) {
    $search_parameter = $request->search;
    
   if($search_parameter != "") {
    $filterBlogs= Blog::where ( 'title', 'LIKE', '%' . $search_parameter . '%' )
    ->paginate(10)->setPath( '' );
    
    return view('admin/blogs/blogs_show', 
    [
        'blogs' => $filterBlogs, 
        'search' => $request->search
        ]);
   }
   return $this->showBlogs();
}


   public function showCreateBlog() {
        $blogCats = BlogCategory::all()->where('status', '=', '1');
        return view('admin/blogs/blog_create', ['blogCats' => $blogCats]);
   }

   public function createBlog(Request $request) {
    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $path = public_path('/upload/images/'.$filename);
    Image::make($image->getRealPath())->resize(300, 300)->save($path);
    Blog::create([
        'category' => $request['category'],
        'title' => $request['title'],
        'content' => $request['content'],
        'image' => $filename,
        'metatitle' => $request['metatitle'],
        'metakeywords' => $request['metakeywords'],
        'metadescription' => $request['metadescription'],
        'author_name' => $request['author_name'],
    ]);
    return redirect()->route('admin.blog.showBlogs')->with('flash_message','Blog has been added successfully');
   }

   public function destroyBlog(Request $request) {
        if ($request->id) {
        $blog = Blog::find($request->id);
        $image_path = public_path('/upload/images/'.$blog->image);
        unlink($image_path);
        $blog->delete();
        return response()->json(['message' => 'Blog has been deleted successfully'], 200);
        }
        return response()->json(['message' => 'Blog Id is required'], 400);
    }

    public function showEditBlog(Request $request, $slug) {
        $blog = Blog::findBySlugOrFail($slug);
        $blogCats = BlogCategory::all()->where('status', '=', '1');;
        return view('admin/blogs/blog_edit', ['blog' => $blog, 'blogCats' => $blogCats]);
    }

    public function updateBlog(Request $request, $slug) {
        $blog = Blog::findBySlugOrFail($slug);
        if(!$request->image) {
            $blog->update($request->all());
        } else {
            $image_path = public_path('/upload/images/'.$blog->image);
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($image->getRealPath())->resize(300, 300)->save($path);
            if(file_exists($image_path)) {
                unlink($image_path);
            }
            $blog->update([
                'category' => $request['category'],
                'title' => $request['title'],
                'content' => $request['content'],
                'image' => $filename,
                'metatitle' => $request['metatitle'],
                'metakeywords' => $request['metakeywords'],
                'metadescription' => $request['metadescription'],
                'status' => $request['status'],
            ]);
        }
        return redirect()->route('admin.blog.showBlogs')->with('flash_message','Blog has been updated successfully');
    }

}
