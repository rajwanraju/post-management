 @extends('backEnd.master')
@section('body')
<div class="container-fluid">

  <h3 style="text-align:center; ">Edit Roles</h3>

    <form action="{{route('role.update',$role->id)}}" method="post" role="form">
		{{method_field('PATCH')}}
		{{csrf_field()}}

    	<div class="form-group">
    		<label for="name">Slug of Role</label>
    		<input type="text" class="form-control" name="slug" id="" placeholder="Slug of Role" value="{{$role->slug}}">
    	</div>
        <div class="form-group">
    		<label for="display_name">Display Name</label>
    		<input type="text" class="form-control" name="name" id="" value="{{$role->name}}" placeholder="Display name">
    	</div>
  

        <div class="form-group text-left">
            <h3>Permissions</h3>
            @foreach($permissions as $permission)
    		<input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
            @endforeach
    	</div>





    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>

	   @endsection