@extends('layouts.main')
@section('title'){{ config('app.name', 'Techer') }}@endsection
@section('content')

      <!-- Blog Entries Column -->
      <div class="col-md-8 mt-3">
<div class="alert alert-success">Категории</div>
      	@foreach($categories as $category)

      	<div class="row mt-5">
        <div class="col-md-7" style="max-width: 413px;">
          <a href="{{ route('category.code', $category->code) }}">
            @if(Storage::exists($category->image))
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ Storage::url($category->image) }}" alt="">
            @else
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            @endif
            
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{ $category->name }}</h3>
          <p>{{ $category->description }}

          </p>
          <a class="btn btn-primary" href="{{ route('category.code', $category->code) }}">Открыть категорию</a>
        </div>
      </div>

      	@endforeach

      </div>

@endsection