@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
        <h2>Upload a single wallpaper</h2>
                <form method="POST" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label">
                            Title <input class="form-control" type="text" value="" name="name" id="name" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">
                            tag <input class="form-control" type="text" value="" name="tag" id="tag" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-default btn-file ">
                            Upload a wallpaper <input type="file" style="display: none;" name="wallpaper" required>
                        </label>
                        <button class="btn btn-primary">Add Wallpaper</button>
                    </div>
                </form>
           </div>
            <div class="col-md-6">
                <h2>Upload an album</h2>
                <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-form-label">
                            Title <input class="form-control" type="text" value="" name="name" id="name" required>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="btn btn-default btn-file ">
                            Upload a wallpaper <input type="file" style="display: none;" name="wallpaper" required>
                        </label>
                        <button class="btn btn-primary">Add Wallpaper</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection