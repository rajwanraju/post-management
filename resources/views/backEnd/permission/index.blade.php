 @extends('backEnd.master')
@section('body')
<div class="container-fluid">
 <h3 style="text-align: center;">Permissions</h3>
    
    <a class="btn btn-success" href="{{route('permission.create')}}"> Create Permission</a>
     
    <table class="table" id="example">
        <tr>
            <th>Permission Slug</th>
            <th>Display Name</th>
            <th>Action</th>
        </tr>

           @forelse($permissions as $permission)
            <tr>
                <td>{{$permission->slug}}</td>
                <td>{{$permission->name}}</td>
                
                <td>
                   <td>   <a class="btn btn-info btn-sm" href="{{route('permission.edit',$permission->id)}}">Edit</a>  </td>
                   <td> 
     
                     <form action="{{route('permission.destroy',$permission->id)}}"  method="POST">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                     </form>
           
                     </td>
                </td>
            </tr>
            @empty
            <tr>
                <td>No permission</td>
            </tr>
            @endforelse

    </table>
</div>

        @endsection