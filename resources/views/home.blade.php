@extends('layouts.main')
@section('title'){{ config('app.name', 'Techer') }} - Новости смартфонов, планшетов и гаджетов  @endsection


@section('content')

      <!-- Blog Entries Column -->
      <div class="col-lg-9">





        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>
       @foreach($posts as $post)
            <!-- Blog Post -->
            <article class="post-preview">
                <div class="img-post">
                    <a href="{{ route('post.index',[$post->id,$post->code]) }}">
                        <img src="http://placehold.it/500x200" alt="">
                    </a>
                </div>

                <div class="post-title">
                    <a class="hovers" href="{{ route('post.index',[$post->id,$post->code]) }}">
                        {{ $post->name }}
                    </a>
                </div>

                <div class="post-line">
                    <span class="post-category">
                        <a href="{{ route('category.code',$post->getCategory->code) }}">{{$post->getCategory->name}}</a>
                    </span>
                    <span class="post-date">
                            @if($post->created_at)
                                {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y в H:i')}}
                            @endif
                            
                            Просмотров: {{ $post->viewPost->count() }}
                    </span>
                    <span class="post-comment">
                        <a href="{{ route('post.index',[$post->id,$post->code]) }}#comments">{{ $post->Comments->where('moderate')->count() }}</a>
                    </span>
                </div>

                <div class="post-text">
                    {{ mb_strimwidth($post->text, 0, 150, "...")}}
                </div>
            </article>
        @endforeach

{{ $posts->links('vendor.pagination.bootstrap-4') }}

        <!-- Pagination -->
        <!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">← Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer →</a>
          </li>
        </ul> -->

      </div>





@endsection