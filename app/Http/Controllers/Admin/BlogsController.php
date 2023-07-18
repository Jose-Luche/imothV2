<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;

class BlogsController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::paginate(10);

        return view('admin.blogs.blogs',[
            'blogs'=>$blogs
        ]);
    }
    //Create blogs
    public function create()
    {
        return view('admin.blogs.create');
    }
    //submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image'=>'mimes:jpeg,jpg,png,bmb,gif,svg',
            'content'=> 'required',
        ]);

        $slug = Str::slug($request->input('title'));
        $checkSlug = Blog::where('slug',$slug)->first();
        if (isset($checkSlug))
        {
            $slug = $slug."".uniqid();
        }

        $createBlog = Blog::create([
            'title'=>$request->input('title'),
            'slug'=>$slug,
            'content'=>$request->input('content'),
            'status'=>0,
            'userId'=>Auth::user()->refId,
        ]);

        if (!$createBlog)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Save your blog somewhere else, reload the page and try again.');
        }

        if ($request->hasFile('image'))
        {
            //Upload the damn image
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = 'blog/'.time().'.'.$extension;

            //Upload File to s3
            $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');

            $fileUrl = $filenametostore;
            if ($storeImage)
            {
                $storePath = Blog::where('slug',$slug)
                    ->update([
                        'image'=>$fileUrl,
                    ]);
                return redirect()->route('admin.blog.details',$slug)->with('success','Blog Draft saved successfully.');
            }

            return back()->withInput()->with('errors','An unexpected error occurred.Please reload the page and try again.');
        }
        return redirect()->route('admin.blog.details',$slug)->with('success','Blog Draft saved successfully.');


    }
    //Blog Details
    public function details($slug)
    {
        $details = Blog::where('slug',$slug)->first();

        return view('admin.blogs.details',[
            'details'=>$details
        ]);
    }
    //Update blog
    public function update(Request $request,$slug)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content'=> 'required',
        ]);

        $update = Blog::where('slug',$slug)->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content')
        ]);

        if (!$update)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again');
        }

        if ($request->hasFile('image'))
        {
            //Upload the damn image
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = 'blog/'.time().'.'.$extension;

            //Upload File to s3
            $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');

            $fileUrl = $filenametostore;
            if ($storeImage)
            {
                $storePath = Blog::where('slug',$slug)
                    ->update([
                        'image'=>$fileUrl,
                    ]);
                return back()->with('success','Blog Updated successfully.');
            }

            return back()->withInput()->with('error','An unexpected error occurred.Please reload the page and try again.');
        }
        return back()->withInput()->with('success','Blog Draft saved successfully.');

    }
    //Publish
    public function publish($slug)
    {
        $publish = Blog::where('slug',$slug)->update([
            'status'=>1
        ]);

        if (!$publish)
        {
            return back()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Blog published successfully..');
    }
    //Unpublish
    public function unpublish($slug)
    {
        $publish = Blog::where('slug',$slug)->update([
            'status'=>0
        ]);

        if (!$publish)
        {
            return back()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Blog Un-Published successfully..');
    }
    //Read Blog
    public function read($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        return view('admin.blogs.read',[
            'blog'=>$blog
        ]);
    }
    //Delete Blog
    public function delete($id)
    {
        $blog = Blog::where('id',$id)->first();
        $blog->delete();

        return back()->with('success','Blog deleted successfully.');
    }
}
