@extends('welcome')
@section('body')

<style>
.comments {
  margin: 2.5rem auto 0;
  max-width: 60.75rem;
  padding: 0 1.25rem;
}

.comment-wrap {
  margin-bottom: 1.25rem;
  display: table;
  width: 100%;
  min-height: 5.3125rem;
}

.photo {
  padding-top: 0.625rem;
  display: table-cell;
  width: 3.5rem;
}
.photo .avatar {
  height: 2.25rem;
  width: 2.25rem;
  border-radius: 50%;
  background-size: contain;
}

.comment-block {
  padding: 1rem;
  background-color: #fff;
  display: table-cell;
  vertical-align: top;
  border-radius: 0.1875rem;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
}
.comment-block textarea {
  width: 100%;
  resize: none;
}

.comment-text {
  margin-bottom: 1.25rem;
}

.bottom-comment {
  color: #acb4c2;
  font-size: 0.875rem;
}

.comment-date {
  float: left;
}

.comment-actions {
  float: right;
}
.comment-actions li {
  display: inline;
  margin: -2px;
  cursor: pointer;
}
.comment-actions li.complain {
  padding-right: 0.75rem;
  border-right: 1px solid #e1e5eb;
}
.comment-actions li.reply {
  padding-left: 0.75rem;
  padding-right: 0.125rem;
}
.comment-actions li:hover {
  color: #0095ff;
}
</style>
<div class="container">

  <div class="page-header">
    <h1>Post Details</h1>
  </div>

  <div class="row">

    <div class="col-md-8">
      <article id="">
        <header>
          <div class="meta">

            Written by <span class="author">{{userName($post->user_id)}}</span> <span class="date">{{$post->created_at->diffForHumans()}}</span> | <span class="comments"><span class="badge">4</span> Comments</span>
          </div>
          <h2>
            {{$post->title}}</h2>
        </header>
        <div class="entry-content">
          <a href="">
            <img src="{{ \URL::asset('/uploads/'.$post->image)}}" alt="" class="img-fluid" />
          </a>
          <p class="lead">{{$post->description}}</p>

          
        </div>
        <footer>
        </footer>
      </article>
      
     




    </div>
    <aside class="col-md-4">


      <h3>Recent Posts</h3>
      <div class="list-group  mb-3">
        @foreach($recent_post as $post_data)
        <a href="#" class="list-group-item active">
          <h4 class="list-group-item-heading">{{$post_data->title}}g</h4>
          <p class="list-group-item-text">
            {{substr($post->description,0,60)}}
          </p>
        </a>
     @endforeach
      </div>






<div class="container">
<h3>Follow Us</h3>
<div class="social">
  <a href=""><i class="fa fa-3x fa-facebook-square"></i></a>
  <a href=""><i class="fa fa-3x fa-twitter-square"></i></a>
  <a href=""><i class="fa fa-3x fa-linkedin-square"></i></a>
  <a href=""><i class="fa fa-3x fa-google-plus-square"></i></a>
</div>
  
</div>
      
      
      
    </aside>
  </div>


<div class="comments">
        <div class="comment-wrap">
                <div class="photo">
                        <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
                </div>
                <div class="comment-block">
                        <form action="" class="form-group" method="POST" action="{{route('comment')}}">
                          @csrf_field 

                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="form-group">
                            <input type="text" name="name" class="form-control" value="@auth {{Auth::user()->name }} @endauth" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" value="@auth {{Auth::user()->email }} @endauth" placeholder="email">
                        </div>
                              <div class="form-group">
                                <textarea name="comment" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
                            </div>

                              <div class="form-group">
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                </div>
        </div>

        <div class="comment-wrap">
                <div class="photo">
                        <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>
                </div>
                <div class="comment-block">
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam reprehenderit quasi
                                sapiente modi tempora at perspiciatis mollitia, dolores voluptate. Cumque, corrupti?</p>
                        <div class="bottom-comment">
                                <div class="comment-date">Aug 24, 2014 @ 2:35 PM</div>
                                <ul class="comment-actions">
                                        <li class="complain">Complain</li>
                                        <li class="reply">Reply</li>
                                </ul>
                        </div>
                </div>
        </div>

        <div class="comment-wrap">
                <div class="photo">
                        <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg')"></div>
                </div>
                <div class="comment-block">
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam.</p>
                        <div class="bottom-comment">
                                <div class="comment-date">Aug 23, 2014 @ 10:32 AM</div>
                                <ul class="comment-actions">
                                        <li class="complain">Complain</li>
                                        <li class="reply">Reply</li>
                                </ul>
                        </div>
                </div>
        </div>
</div>

</div>



</div>


@endsection