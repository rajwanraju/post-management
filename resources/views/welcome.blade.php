<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Post Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Styles -->
<style>
    .site-heading h3{
    font-size : 40px;
    margin-bottom: 15px;
    text-transform: uppercase;
    font-weight: 600;
}
.border {
    background: #d1360e;
    height: 2px;
    width: 165px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 25px;
}
/* Blog-CSS */
.blog-box {
    padding: 0 0px;
    transition: .5s;
    border: 1px solid #e2e2e2;
    margin-bottom: 30px;
}
.blog-box-content h4 a {
    font-size: 20px;
    padding: 0px 0 0px;
    text-transform: uppercase;
    color:#2b2b2b;
     text-decoration:none;
    
}
.blog-box-content h4:hover {
    color:#000;
     text-decoration:none;
    
}

.blog-box-content {
padding: 0 20px 20px;
}
.blog-box-text h4 a {
    color: #333;
}

.review-like input[type="radio"] + .fas,
.review-like input[type="radio"] + label > .fas { cursor: pointer; font-size: 20px; }

/* Unchecked */
.review-like input[type="radio"] + .fas:before,
.review-like input[type="radio"] + label > .fas:before {   color: rgba(215, 215, 215, 1); }

/* Checked */
.review-like input[type="radio"]:checked + .fas:before,
.review-like input[type="radio"]:checked + label > .fas:before {  color: var(--blue-color); }

.review-like i {
    color: rgba(215, 215, 215, 1) !important;
    padding-right: 5px;
}
.hide {
    display: none;
}

.myButton {
    background-color:#0688fa;
    border-radius:28px;
    border:1px solid #18ab29;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:12px;
    padding:10px 20px;
    text-decoration:none;
    text-shadow:0px 1px 0px #2f6627;
}
.myButton:hover {
    background-color:#5cbf2a;
}
.myButton:active {
    position:relative;
    top:1px;
}
</style>

    </head>
    <body>

@include('frontEnd.nav')
@include('flash-message')
     @yield('body')



<!-- alert modal -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center">Alert</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You need To Login for action.....
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script>

$(document).ready(function() {

    $('.alert').on('click',function(){

        $('#alert_modal').modal();
    });

  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
  
$('.like').click(function(){
//get product by from ayttribute that i set the link
        var post_id = $(this).attr('post_id');
        var value = $(this).attr('value');
    
    $.ajax({

            type:'POST',
            data: {
                        post_id:post_id,
                        value:value
                    },

           url:'<?php echo url('like-dislike')?>',

           success:function(data){
           location.reload();

           }

        });
  });

});

$(document).ready(function() {
    $('#example').DataTable();
    $('.alert-message').fadeOut(5000);
} );
</script>
    </body>
</html>
