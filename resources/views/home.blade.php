@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1>Weaaboo palace</h1>

            <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-form-label">
                        Title <input class="form-control" type="text" value="" name="name" id="name" >
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                       path for test <input class="form-control" type="text" value="" name="path" id="name" >
                    </label>
                </div>
                <div class="form-group">
                        <label class="btn btn-default btn-file ">
                           Upload a wallpaper <input type="file" style="display: none;" name="wallpaper">
                        </label>
                    <button class="btn btn-primary">Add Wallpaper</button>
                </div>

            </form>
            <div id="basicExample">
                <a href="http://i.imgur.com/jPuULfq.jpg">
                    <img alt="caption for image 1" src="http://i.imgur.com/jPuULfq.jpg"/>
                </a>
                <a href="http://i.imgur.com/lcXFKDN.jpg">
                    <img alt="caption for image 2" src="http://i.imgur.com/lcXFKDN.jpg"/>
                </a>

            </div>
        </div>
    </div>
</div>


@endsection
