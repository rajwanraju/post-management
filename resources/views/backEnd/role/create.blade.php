 @extends('backEnd.master')
@section('body')
<div class="container-fluid">
<h3>Create Roles</h3>

    <form action="{{route('role.store')}}" method="post" role="form">
        {{csrf_field()}}

    	<div class="form-group">
    		<label for="name">Slug of Role</label>
    		<input type="text" class="form-control" name="slug" id="" placeholder="Slug of role">
    	</div>
        <div class="form-group">
    		<label for="display_name">Display name</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="Display name">
    	</div>


        <div class="form-group text-left">
            <h3>Permissions</h3>
            @foreach($permissions as $permission)
    		<input type="checkbox"   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
            @endforeach
    	</div>






    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
   @endsection