<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use URL;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_posts = Post::where('editor_id',\Auth::user()->id)->whereIn('status',[2,3,4])->get();
       return view('backEnd.editor.posts',compact('my_posts'));
    }

   public function postInfo($id){

        $product = Post::findorfail($id);

  $output = '';
  
  $output .= '

              <div class="col-md-5 modal_body_left">
              <img src="'. URL::asset("/uploads/".$product->image) .'" alt=" " class="img-responsive" height="200px" width="300px"/>
              </div>
              <div class="col-md-7 modal_body_right">
                     <h4>'.$product->title.'</h4>
                    <p>'.$product->description.'</p>
              <div class="clearfix"> </div>
              </div>

              <div class="modal_body_right_cart simpleCart_shelfItem">
                    
              </div>

              
              </div> 
              <div class="clearfix"> </div>';

    echo $output;


   }


    public function statusChange($id,$slug)
    {
        $post_id = \Crypt::decrypt($id);

        $status = checkStatus($slug);

        $post = Post::where('id',$post_id)->first();
        $post->status = $status;
        $post->save();
if($post->status == 1){
 $details = [
        'title' => $post->title,
        'description' => $post->description
    ];
   
    \Mail::to(userEmail($post->user_id))->send(new \App\Mail\PostApprovedMail($details));
}

        return redirect()->back()->with('success','Post Status Change');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
