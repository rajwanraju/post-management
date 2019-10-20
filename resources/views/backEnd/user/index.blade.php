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
<a href="{{route('user.create')}}" class="btn btn-primary" style="float:right">Add New User</a>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Join At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{userRole($user->id)}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->name}}</td>
            </tr>
            @endforeach
        </tfoot>
    </table>
               
        </div>
      </div>
    </div>


@endsection