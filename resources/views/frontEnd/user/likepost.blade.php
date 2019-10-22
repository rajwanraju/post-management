@extends('welcome')
@section('body')
<div class="blog-section paddingTB60 ">
<div class="container">
    <div class="row">
        <div class="site-heading text-center">
                        <h3 class="text-center">My Like Post</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt <br> ut labore et dolore magna aliqua. Ut enim ad minim </p>
                        <div class="border"></div>
                    </div>
    </div>
    <div class="row text-center">
        @foreach($posts as $post)

        <div class="col-sm-6 col-md-4">
            <div class="blog-box">
                <div class="blog-box-image">
                    <img src="{{ \URL::asset('/uploads/'.$post->image)}}" class="img-fluid img-thumbnaile" alt="">
                </div>
                <div class="blog-box-content">
                    <h4><a href="{{url('post/'.$post->id)}}">{{$post->title}}</a></h4>
                    <p>{{substr($post->description,0,100)}}.....</p>
                    <div class="row">
                    <div data-toggle="buttons" class="col-md-6">
                        @auth
                        <label class="btn btn-info like @auth @if(like_check($post->id)) active @endif  @endauth" post_id="{{$post->id}}" value="1">
                            <input type="radio" class="value"  name="like"   autocomplete="off" > <i class="fa fa-thumbs-up fa-lg"></i><strong >{{like($post->id)}}</strong>
                        </label>
                        <label class="btn btn-info like @auth @if(dislike_check($post->id)) active @endif  @endauth" post_id="{{$post->id}}" value="0">
                            <input type="radio" class="value"  name="dislike"  autocomplete="off">  <i class="fa fa-thumbs-down fa-lg"></i><strong>{{dislike($post->id)}}</strong>
                        </label>
                        @else
                        <label class="btn btn-info alert">
                            <input type="radio" class="value"  name="like"   autocomplete="off" > <i class="fa fa-thumbs-up fa-lg"></i><strong >{{like($post->id)}}</strong>
                        </label>
                        <label class="btn btn-info alert">
                            <input type="radio" class="value"  name="dislike"  autocomplete="off">  <i class="fa fa-thumbs-down fa-lg"></i><strong>{{dislike($post->id)}}</strong>
                        </label>

                        @endauth

                    </div>

                    <div class="col-md-6">

                        @auth
        <a href="{{url('wishlist/'.$post->id)}}" style="float: right">Add To Wishlist</a>
    @else
     <a href="#" class="alert" style="float: right">Add To Wishlist</a>
      @endauth

  </div>
  </div>

                </div>


            </div>
        </div> 
        @endforeach
    </div>
</div>
</div>
@endsection