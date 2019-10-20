<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Postimage;
use Auth;
use Imagick;

class PostController extends Controller
{
    public function index(){

        return view('backEnd.post.index');
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

    $post = new Post();

    $post->title = $request->title;
    $post->description = $request->description;
    $post->category_id = $request->category;
    $post->user_id = Auth::user()->id;
    $post->tags = json_encode($request->tags);
    $post->status = $request->status;
    $post->save();

   

        foreach ($request->photos as $photo) {
            $postImage = $photo;
            
            $name = $postImage->getClientOriginalName();
            $uploadPath = 'Image/';
            $postImage->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
            // dd($imageUrl);
    
                PostImage::create([
                    'post_id' => $post->id,
                    'image' => $imageUrl,
                ]);
            }


}


return redirect()->back()->with('error','Some Things Wrong');

    }

}
