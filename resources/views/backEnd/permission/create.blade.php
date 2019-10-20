 @extends('backEnd.master')
@section('body')
<div class="container-fluid">

<div class="col-md-8 offset-2">
<div class="card">
<h3  class="card-title text-center">Create permission</h3>
<div class="card-body">
    <form action="{{route('permission.store')}}" method="post" role="form">
        {{csrf_field()}}

    	<div class="form-group">
    		<label for="name">Permission</label>
    		<input type="text" class="form-control" name="slug" id="" placeholder="Slug of permission">
    	</div>
      
        <div class="form-group">
    		<label for="description">Display Name</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="Display Name">
    	</div>


    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>
</div>
</div>
   @endsection