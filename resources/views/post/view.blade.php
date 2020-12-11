@extends('layouts.main')
@section('title'){{ $posts->name }} @endsection
@section('content')

      <!-- Post Content Column -->
      <div class="col-lg-9">

        <!-- Title -->
        <h1 class="mt-4">{{ $posts->name }}</h1>

        <hr>

        <!-- Date/Time -->
        <p>{{ \Carbon\Carbon::parse($posts->created_at)->format('d.m.Y в H:i')}}</p>

        <hr>

        <!-- Preview Image -->
        @if(!$posts->image)
          <img class="img-fluid rounded" src="{{ asset('image/post/no-image900x300.jpg') }}" width="900" alt="No image from Post">
        @else
          <img class="img-fluid rounded" src="{{ asset('image/post/'.$posts->image) }}" alt="">
        @endif
        <hr>

        <p>
          {{ $posts->text }}

        </p>

        <hr>


        <section id="comments">
@if (Session::get('success'))
<script type="text/javascript" src="{{ asset('assets/js/uikit.min.js') }}"></script>
<div id="success_com" class="alert alert-primary" alert>
    <a class="alert-close" close></a>
    {{ Session::get('success') }}
</div>        
<script>
    setTimeout(function(){
        UIkit.alert('#success_com').close();
    }, 5000)
</script>
@endif

@if ($errors->any())
<div class="alert alert-danger" alert>
    <a class="alert-close" close></a>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
</div>        
<script>
    setTimeout(function(){
        UIkit.alert('.alert').close();
    }, 5000)
</script>
@endif  

        <!-- Comments Form -->
        <div class="text-dark position-relative">
            <h5 class="">Оставьте свой комментарий:</h5>
            @include('post.form-comment')
        </div>
@if($com->count() == 0)
<div class="alert alert-primary">На данный момент комментариев нет. Станьте первым.</div>
@endif
        @foreach($com as $k => $comments)
<!--Выводим только родительские комментарии parent_id = 0-->
@if($k)
@break
@endif
@include('post.comment', ['items' => $comments])
@endforeach

        </section>


      </div>
<script type="text/javascript" src="{{ asset('assets/js/uikit.min.js') }}"></script>
@endsection