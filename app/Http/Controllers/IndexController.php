<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostLike;
use App\WishPost;
use App\Comment;
use Auth;
use DB;
class IndexController extends Controller
{
    public function index(){

    	$posts = Post::paginate(15);
    	return view('frontEnd.index',compact('posts'));
    }

    public function likedislike(Request $request){

    		$post = Post::findorfail($request->post_id);

    		$like_status = PostLike::where('user_id',Auth::user()->id)->where('post_id',$post->id)->first();
    		

    		if(isset($like_status)){
    		$like_status->like_dislike = $request->value;
    		$like_status->save();
    	}
    	else{

    		$like = new PostLike();
    		$like->post_id = $post->id;
    		$like->user_id = Auth::user()->id;
    		$like->like_dislike = $request->value;
    		$like->save();
    	}



    	$data = array();

    	$data['like'] = PostLike::where('post_id',$post->id)->where('like_dislike',1)->count();
    	$data['dislike'] = PostLike::where('post_id',$post->id)->where('like_dislike',0)->count();

    	return $data;
    	
    }

public function wishPost($id){

$post = Post::findorfail($id);

		$wish_check = WishPost::where('user_id',Auth::user()->id)->where('post_id',$post->id)->first();
    		

    		if(isset($wish_check)){
    		return redirect()->back()->with('success','Post Already Added to WishList');
    	}
    	else{

    		$like = new WishPost();
    		$like->post_id = $post->id;
    		$like->user_id = Auth::user()->id;
    		$like->status = 1;
    		$like->save();
    	}

    			return redirect()->back()->with('success','Post Added to WishList');

}

public function likePost(){

$posts = DB::table('posts')
->join('post_likes','posts.id','post_likes.post_id')
->select('posts.*','post_likes.user_id as person','post_likes.like_dislike')
->where('post_likes.user_id',Auth::user()->id)
->where('post_likes.like_dislike',1)
->get();
return view('frontEnd.user.likepost',compact('posts'));

}

public function dislikePost(){

$posts = DB::table('posts')
->join('post_likes','posts.id','post_likes.post_id')
->select('posts.*','post_likes.user_id as person','post_likes.like_dislike')
->where('post_likes.user_id',Auth::user()->id)
->where('post_likes.like_dislike',0)
->get();
return view('frontEnd.user.dislike',compact('posts'));

}

public function wishlistPost(){

$posts = DB::table('posts')
->join('wish_posts','posts.id','wish_posts.post_id')
->select('posts.*','wish_posts.user_id as person')
->where('wish_posts.user_id',Auth::user()->id)
->get();
return view('frontEnd.user.wishpost',compact('posts'));

}


public function postDetails($id){


 $post = Post::findorfail($id);
  $recent_post = Post::where('status',1)->orderby('created_at','desc')->take(4)->get();
 return view('frontEnd.postDetails',compact('post','recent_post'));

}

public function comment(Request $request)
{
$post = Comment::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->first();

if(is_array($post)){
$comment->comment = $request->comment;
$comment->save();
}
else{

$comment = new Comment();
}
$comment->post_id = $request->post_id;
$comment->user_id = Auth::user() ? Auth::user()->id :0;
$comment->name = $request->name;
$comment->email = $request->email;
$comment->comment = $request->comment;
$comment->save();

return redirect()->back()->with('success','Comment Added');
}

}
