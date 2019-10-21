@extends('backEnd.master')
@section('title')
Post Management
@endsection

@section('body')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .main-section{
            margin:0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0px 0px 20px #c1c1c1;
        }
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }
        .form_lable{

  font-size: 2em;
}
    </style>
<div class="container-fluid">
<div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">New Post</h3>
                        </div>
                        <div class="card-body">
                        <form class="text-center" style="color: #757575;" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    	{{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Title</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Category</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" size="0" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tags</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" type="text" name="tags[]" data-role="tagsinput"  value=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="description" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Feature Image</label>
                                    <div class="col-lg-9">
                      <div class="file-loading">
                        <input id="file-1" type="file" name="photos" class="file" data-overwrite-initial="false" data-min-file-count="4">
                      </div>
                    </div>
                    </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                    <div class="col-lg-9">
                                    <select name="status" id="" class="form-control">
		                                <option >Select Status</option>
                                        @if(userRole(Auth::user()->id)=="author")
                                        <option value="2">Send for Review</option>
                                        @endif
                                         @if(userRole(Auth::user()->id)=="editor")
                                        <option value="1">Published</option>
                                        @endif
		                                <option value="0">UnPublished</option>
		                             </select>
                                    </div>
                                </div>
                           
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
           

          

            </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('backEnd/')}}/js/fileinput.js" type="text/javascript"></script>
    <script src="{{asset('backEnd/')}}/js/input-theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

      <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>

@endsection