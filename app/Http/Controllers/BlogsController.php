<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{Tag,Blogs,BlogComment,BlogCategory,ReplyComment};
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{

    public function index()
    {
        $blogs = Blogs::orderBy('created_at', 'desc')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create', [
            "blogCategories" => BlogCategory::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->title) . "_" . Str::random(9);

        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'category_id'   => 'required',
            // 'image'   => 'required|image',
        ]);

        $blog = Blogs::create($request->except('_token','tag') + [
            'created_at'  => Carbon::now(),
            'user_id'     => Auth::id(),
            'slug'        => $slug,
            'image'       => $request->image,
            'video_link'  => $request->video_link,
        ]);

        $blog->tags()->attach($request->tag);

        if($request->hasFile('image')){
            $blog_photo       = $request->file('image');
            $fileName         = uniqid() . "." . $blog_photo->extension();
            $location         = public_path('uploads/blogs');
            $blog->image      = $fileName;

            $blog_photo->move($location, $fileName);
            $blog->save();
        }

        return redirect()->route('blogs.index')->withSuccess('Blog Created Success !');
    }

    public function show(Blogs $blogs, $id)
    {
        $singleBlog = Blogs::find($id);
        return view('admin.blog.show', compact('singleBlog'));
    }

    public function edit(Blogs $blogs, $id)
    {
        $blogs = Blogs::find($id)->first();
        $blogCategories = BlogCategory::all();
        $tags = Tag::all();
        return view('admin.blog.edit', compact('blogs', 'blogCategories', 'tags'));
    }

    public function update(Request $request, Blogs $blogs, $id)
    {
        $slug = Str::slug($request->title) . "_" . Str::random(9);
        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
        ]);

        $blogs = Blogs::find($id);

        if(is_null($request->videoo_link))
        {
            $blogs->image = $request->image;
            $blogs->video_link = '';
            $blogs->save();
        }

        if(is_null($request->image))
        {
            $blogs->video_link = $request->video_link;
            $blogs->image = '';
            $blogs->save();
        }
        $blogs->update($request->except('_token', '_method', 'tag') + [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'slug' => $request->slug,
                'created_at'  => Carbon::now(),
                'user_id'     => Auth::user()->id,
                'category_id' => $request->category_id,
                'slug'        => $slug,
            ]);

        $blogs->tags()->detach($request->tag);
        // dd($tags);

        if($request->hasFile('image')){
            $blog_photo       = $request->file('image');
            $fileName         = uniqid() . "." . $blog_photo->extension();
            $location         = public_path('uploads/blogs');
            $blogs->image      = $fileName;

            $blog_photo->move($location, $fileName);
            $blogs->save();
        }

        return redirect()->route('blogs.index')->withSuccess('Blog Created Success !');
    }

    public function destroy(Blogs $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->withDanger('Blog Deleted Success !');
    }

    public function writeComment(Request $request)
    {
        // dd($request->all());
        $request->validate(['email' => 'required']);

        $push = BlogComment::create($request->except('_token', '_method') + [
            'blog_id' => $request->blog_id,
        ]);
        if(!$push){
            return back()->with('error', 'Something Goes Wrong !');
        }else{
            return back()->with('success', 'Your Comment Submitted');
        }
    }

    public function replyComment(Request $request, $id)
    {
        $request->validate(['email' => 'required']);

        $push = ReplyComment::create($request->except('_token', '_method') + [
            'comment_id' => $request->comment_id,
            'blog_id' => $id,
        ]);

        if(!$push){
            return back()->with('error', 'Something Goes Wrong !');
        }else{
            return back()->with('success', 'Your Comment Submitted');
        }
    }

    public function categoryIndex()
    {
        return view('admin.blog.category.index', [
            'categories' =>  BlogCategory::all(),
        ]);
    }

    public function categoryStore(Request $request)
    {
       $category = BlogCategory::create($request->all());

       if(!$category){
            return back()->with('error', 'Something Goes Wrong !');
        }else{
            return back()->with('success', 'Your Categoey Updated !');
        }
    }

    public function categoryDelete($id)
    {
       $delete = BlogCategory::find($id)->delete();
       if(!$delete){
            return back()->with('error', 'Something Goes Wrong !');
        }else{
            return back()->with('success', 'Your Categoey deleted !');
        }
    }

    public function categoryUpdate(Request $request, $id)
    {
       $delete = BlogCategory::find($id)->update($request->except('_token', '_method') + [
        'name' => $request->name
       ]);
       if(!$delete){
            return back()->with('error', 'Something Goes Wrong !');
        }else{
            return back()->with('success', 'Your Categoey deleted !');
        }
    }
}
