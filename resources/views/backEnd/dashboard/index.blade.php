@extends('backEnd.master')
@section('title')
Post Management
@endsection

@section('body')
<style>
.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}
</style>
<?php

$editors = \DB::table('users_roles')->where('role_id',5)->get();

?>
<div class="container-fluid">
      <h2>Dashboard</h2>
      <hr>
      <div class="jumbotron">
<div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa newspaper-o" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>

                 @if(userRole(Auth::user()->id)=="admin")
                Posts
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
               Assign Posts
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                My Posts
                @endif

            </h4></div>
                <div class="text-info text-center mt-2"><h1>
                     @if(userRole(Auth::user()->id)=="admin")
                {{count($posts)}}
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                {{count($posts)}}
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                {{count($posts)}}
                @endif
                </h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>
         @if(userRole(Auth::user()->id)=="admin")
                Waitting Post
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                Pending Post
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                Pending Post
                @endif
                </h4></div>
                <div class="text-success text-center mt-2"><h1>
         @if(userRole(Auth::user()->id)=="admin")
                {{count($var_2nd)}}
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                {{count($var_2nd)}}
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                {{count($var_2nd)}}
                @endif
                </h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-check" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>
         @if(userRole(Auth::user()->id)=="admin")
                Published Post
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                Approved Post
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                Published Post
                @endif
                </h4></div>
                <div class="text-danger text-center mt-2"><h1>
                 @if(userRole(Auth::user()->id)=="admin")
                {{count($var_3rd)}}
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                {{count($var_3rd)}}
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                {{count($var_3rd)}}
                @endif
                </h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-user-o" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>
                @if(userRole(Auth::user()->id)=="admin")
               User
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                Reject Post
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                Reject Post
                @endif
                </h4></div>
                <div class="text-warning text-center mt-2"><h1>
                @if(userRole(Auth::user()->id)=="admin")
                {{count($var_4th)}}
                @endif 

                   @if(userRole(Auth::user()->id)=="editor")
                {{count($var_4th)}}
                @endif  

                  @if(userRole(Auth::user()->id)=="author")
                {{count($var_4th)}}
                @endif
                </h1></div>
            </div>
        </div>
     </div>
</div>
      <h5>Recent Waitting Posts</h5>
      <hr>
        <div class="col-md-12">

           <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Editor</th>
                <th>Publish date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($var_2nd as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{categoryName($post->category_id)}}</td>
                <td>{{userName($post->user_id)}}</td>
                <td>@if(isset($post->editor_id)){{userName($post->editor_id)}}@else Not Assign Yet @endif</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{!! status($post->status) !!}</td>
                <td>                   
                 <div class="row">
                        <a href="#" post_id="{{$post->id}}" class="btn btn-sm btn-primary showPost">Show</a>
                        &nbsp;
                        @if(userRole(Auth::user()->id)=="admin")
                        @if($post->status !=1)
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Post Management
                        </button>
                        
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($editors as $editor)
                            <a class="dropdown-item" href="{{url('admin/postAssign/'.\Crypt::encrypt($post->id).'/'.$editor->user_id)}}" >{{userName($editor->user_id)}} @if($editor->user_id ==$post->editor_id) <i class="fas fa-check"></i> @endif</a>
                            @endforeach
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
</td>
            </tr>
            @endforeach
        </tfoot>
    </table>
               
        </div>
      </div>
    </div>

    @endsection