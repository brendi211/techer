@extends('layouts.main')

@section('title')
<title>Авторизация</title>
@endsection
@section('content')


<div class="col-md-8">
    <h3 class="heading-divider">Авторизация</h3>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus="">
            @error('email')
                <span class="alert alert-danger text-small">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input class="form-control" id="password" name="password" type="password" value="{{ old('password') }}" required autocomplete="new-password">
            @error('password')
                <span class="alert alert-danger text-small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="checkbox">
            <label class="form-check-label" for="checkbox">Запомнить</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection