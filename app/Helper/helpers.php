<?php
 
if (! function_exists('categoryName')) {
    function categoryName($category_id) {
        return \App\Category::findorfail($category_id)->categoryName;
    }
}


if (! function_exists('userName')) {
    function userName($id) {
        return \App\User::findorfail($id)->name;
    }
}
if (! function_exists('userRole')) {
    function userRole($id) {
        $role_id = \DB::table('users_roles')->where('user_id',$id)->first();
        return \App\Role::findorfail($role_id->role_id)->name;
    }
}


if (! function_exists('status')) {
    function status($status) {
    if($status == 1){
        return '<span class="btn btn-primary">'."publish".'</span>';
    }elseif ($status == 2){
        return '<span class="btn btn-success">'."approve".'</span>';
    }elseif ($status == 3){
        return '<span class="btn btn-cancelled">'."unread".'</span>';
    }elseif ($status == 4){
        return '<span class="btn btn-warning">'."pending".'</span>';
    }elseif ($status == 5){
        return '<span class="btn btn-error">'."unpublish".'</span>';
}
    }
}
