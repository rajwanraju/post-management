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
                <th>Publish date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($my_posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{categoryName($post->category_id)}}</td>
                <td>{{userName($post->user_id)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{!! status($post->status) !!}</td>
                <td>{{$post->title}}</td>
            </tr>
            @endforeach
        </tfoot>
    </table>
               
        </div>
      </div>
    </div>


@endsection