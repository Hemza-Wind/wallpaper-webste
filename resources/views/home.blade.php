@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1>Weaaboo palace</h1>



            <div id="basicExample" class="justified-gallery">

                @foreach($wallpapers as $wallpaper)

                    <a data-lightbox="1" href="{{URL::asset('../wallpapers/' . $wallpaper->path) }}">
                        <img alt="Uploaded by: <strong>
                        @foreach($users as $user)
                            @if($user->id === $wallpaper->uploadedby) {{ $user->name }}@endif
                        @endforeach </strong>"
                             src="{{URL::asset('/wallpapers/thumbnails/' . $wallpaper->path) }}" alt="">
                    </a>



                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection
