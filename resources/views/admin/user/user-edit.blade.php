@extends('admin.layouts.base')

@section('title')
<title>Профиль пользователя</title>
@endsection
@section('content')
<h4>Профиль пользователя</h4>
@include('admin.alert')		
<div class="uk-grid" uk-grid>
	<div class="uk-width-1-2@xl uk-width-2-3@l">
		<form action="{{ route('users.update', $user->id) }}" class="uk-form-horizontal" id="update" method="post">
			@csrf
			<div class="uk-margin">
				<label for="name" class="uk-form-label">Имя</label>
				<div class="uk-form-controls">
					<input type="text" class="uk-input" name="name" id="name" value="{{ $user->name }}" autofocus="">
				</div>
			</div>

			<div class="uk-margin">
				<label for="email" class="uk-form-label">Email</label>
				<div class="uk-form-controls">
					<input type="text" class="uk-input" name="email" id="email" value="{{ $user->email }}">
				</div>
			</div>
			<div class="uk-margin @if(Auth::user()->id === $user->id) uk-hidden @endif">
				<label for="" class="uk-form-label">Группа</label>
				<div class="uk-form-controls">
					@foreach($user->roles as $userRole)
					<label>
						<input class="uk-checkbox" type="checkbox" name="role[]" value="{{ $userRole->name }}" checked> {{ $userRole->name }}
					</label><br>
					@endforeach				
					@foreach($roles as $role)
					<label>
						<input class="uk-checkbox" type="checkbox" name="role[]" value="{{ $role }}"> {{ $role }}
					</label><br>
					@endforeach				
				</div>
			</div>		
			<div class="uk-margin">
				<div class="uk-form-controls">							
					<a href="javascript:{}" onclick="document.getElementById('update').submit();" class="uk-button uk-button-primary">Сохранить</a>
					@if(Auth::user()->id != $user->id)<a href="#destroy" class="uk-button uk-button-danger" uk-toggle>Удалить</a>@endif
					<a href="{{ route('users.index') }}" class="uk-button uk-button-default">Назад</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
<div id="destroy" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Подтвердите действие</h4>
		<form action="{{ route('users.destroy', $user->id) }}" method="post">
			@csrf
			@method('DELETE')
			<button type="submit" class="uk-button uk-button-primary">Удалить</button>
		</form>		

    </div>
</div>