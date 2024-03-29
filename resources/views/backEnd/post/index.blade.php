@extends('backEnd.master')
@section('title')
Post Management
@endsection

@section('body')

<?php

$editors = \DB::table('users_roles')->where('role_id',5)->get();

?>
<style>
.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}
</style>
<div class="container-fluid">
      <h2 class="text-center">Posts </h2>
      <hr>
        <div class="col-md-12">
<a href="{{route('post.create')}}" class="btn btn-primary" style="float:right">Add Post</a>
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
            @foreach($posts as $post)
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