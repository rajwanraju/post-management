<?php
 
if (! function_exists('editorUser')) {
    function editorUser() {
        return \DB::table('users_roles')->where('role_id',5)->get();
    }
}
if (! function_exists('categoryName')) {
    function categoryName($category_id) {
        return \App\Category::findorfail($category_id)->categoryName;
    }
}

if (! function_exists('checkStatus')) {
    function checkStatus($slug) {
        if($slug=="approved"){

        return 1;
    }

    elseif($slug=="reject"){

        return 3;
    }

    elseif($slug=="unpublished"){

        return 0;
    }
    else{
     return 4;
}
    }
}


if (! function_exists('userName')) {
    function userName($id) {
        return \App\User::findorfail($id)->name;
    }
}

if (! function_exists('userEmail')) {
    function userEmail($id) {
        return \App\User::findorfail($id)->email;
    }
}


if (! function_exists('userRole')) {
    function userRole($id,$slug="") {
        $role_id = \DB::table('users_roles')->where('user_id',$id)->first();

        if($slug=""){
        return \App\Role::findorfail($role_id->role_id)->name;
    }
    else{

    return \App\Role::findorfail($role_id->role_id)->slug;
}
    }
}


if (! function_exists('status')) {
    function status($status) {
    if ($status == 1){
        return '<span class="alert alert-success">'."approve".'</span>';
    }elseif ($status == 2){
        return '<span class="alert alert-primary">'."waitting".'</span>';
    }
    elseif ($status == 3){
        return '<span class="alert alert-danger">'."reject".'</span>';
    }elseif ($status == 4){
        return '<span class="alert alert-warning">'."pending".'</span>';
    }elseif ($status == 0){
        return '<span class="alert alert-info">'."unpublish".'</span>';
}
    }
}

if (! function_exists('like')) {
    function like($post_id) {

return \App\PostLike::where('post_id',$post_id)->where('like_dislike',1)->count();

        }
    }

    if (! function_exists('like_check')) {
    function like_check($post_id) {

return \App\PostLike::where('user_id',Auth::user()->id)->where('post_id',$post_id)->where('like_dislike',1)->first();

        }
    }


if (! function_exists('dislike')) {
    function dislike($post_id) {

return \App\PostLike::where('post_id',$post_id)->where('like_dislike',0)->count();

        }
    }

        if (! function_exists('dislike_check')) {
    function dislike_check($post_id) {

return \App\PostLike::where('user_id',Auth::user()->id)->where('post_id',$post_id)->where('like_dislike',0)->first();

        }
    } 



