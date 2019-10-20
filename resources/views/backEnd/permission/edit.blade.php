 @extends('backEnd.master')
@section('body')
<div class="container-fluid">

  <h3 style="text-align:center; ">Edit Permission</h3>

    <form action="{{route('permission.update',$permission->id)}}" method="post" role="form">
        {{ method_field('PATCH') }}
		{{csrf_field()}}
        <input type="hidden" name="permissionId" value="{{$permission->id}}">

    	<div class="form-group">
    		<label for="name"> Category</label>
    		<input type="text" class="form-control" name="slug" id="" placeholder="Name of Category" value="{{$permission->slug}}">
    	</div>
        <div class="form-group">
    		<label for="description">Description</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="Description" value="{{$permission->name}}">
    	</div> 

   




    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>

	   @endsection