<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Postimage;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('backEnd.post.index',compact('posts'));
    }

    public function createPost(){
        $categories = Category::all();
        return view('backEnd.post.create',compact('categories')); 
    }

    public function storePost(Request $request){

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required',
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('photos'))
 
{

     $cover = $request->file('photos');
    $extension = $cover->getClientOriginalExtension();
    Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
    $post = new Post();

    $post->title = $request->title;
    $post->description = $request->description;
    $post->category_id = $request->category;
    $post->user_id = Auth::user()->id;
    $post->tags = json_encode($request->tags);
    $post->status = $request->status;
    $post->image =  $cover->getFilename().'.'.$extension;
    $post->save();

   

}


return redirect()->back()->with('error','Some Things Wrong');

    }

}
