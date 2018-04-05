@extends('layouts.main')

@section('content')
    <div class="col-sm-12 col-md-9 blog-main">
      @if($posts->count() > 0)
        <div class="row">
            @foreach($posts as $post)
                    <div class="col-sm-6 col-md-6 article-card">
                        <div class="card">
                            @if(isset($post->thumbnail) && file_exists(public_path('/images/thumbnails/' . $post->thumbnail)))
                                <img class="card-img-top" src="{{asset('/images/thumbnails/' . $post->thumbnail)}}" alt="{{$post->title}}">
                            @else
                                <img class="card-img-top" src="{{asset('/images/app/no-image.png')}}" alt="no-image">
                            @endif
                            <div class="card-body">
                                <h4 class="blog-post-title"><a href="{{route('single.post', ['alias' => $post->alias])}}">{{$post->title}}</a></h4>
                                <p class="blog-post-meta">{{$post->created_at->format('Y-m-d')}}</p>
                                <p class="card-text">{{$post->preview}}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        {{$posts->links()}}
      @else
          <h2 class="text-center"><i>@lang('home.Not published any posts!!!')</i></h2>
      @endif
    </div><!-- /.blog-main -->
@endsection
