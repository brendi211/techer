@extends('layouts.main')
@section('title'){{ $categories->description }} @endsection
@section('description'){{ $categories->description }} @endsection
@section('content')

      <!-- Blog Entries Column -->
      <div class="col-md-8 mt-3">
 <!-- Page Heading -->
      <h1 class="my-4">Категория: {{ $categories->name }}
      </h1>
      @if(!($category->count()))
      <div class="alert alert-danger">В данной категории пока что нет записей.</div>
      @endif
      @foreach($category as $posts)
        <!-- Project One -->
        <div class="row">
          <div class="col-md-7">
            <a href="#">
              <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            </a>
          </div>
          <div class="col-md-5">
            <h3>{{ $posts->name }}</h3>
            <p>{{ $posts->text }}</p>
            <a class="btn btn-primary" href="{{ route('post.index', [$posts->id,$posts->code]) }}">Читать</a>
          </div>
        </div>
        <!-- /.row -->

        <hr>
      @endforeach


      </div>

@endsection