@extends('admin.layouts.base')

@section('title')
<title>Добавит пользователя</title>
@section('content')
<h4>Добавить пользователя</h4>
@include('admin.alert')	
<div class="uk-grid" uk-grid>
	<div class="uk-width-1-2@xl uk-width-2-3@l">
		<form action="{{ route('users.store') }}" class="uk-form-horizontal" id="update" method="post">
			@csrf
			<div class="uk-margin">
				<label for="name" class="uk-form-label">Имя</label>
				<div class="uk-form-controls">
					<input type="text" class="uk-input" name="name" id="name" value="{{ old('name') }}" autofocus="">
				</div>
			</div>

			<div class="uk-margin">
				<label for="email" class="uk-form-label">Email</label>
				<div class="uk-form-controls">
					<input type="text" class="uk-input" name="email" id="email" value="{{ old('email') }}">
				</div>
			</div>

			<div class="uk-margin">
				<label for="password" class="uk-form-label">Пароль</label>
				<div class="uk-form-controls">
					<input type="password" class="uk-input" name="password" id="password">
				</div>
			</div>

			<div class="uk-margin">
				<label for="" class="uk-form-label">Группа</label>
				<div class="uk-form-controls">
					@foreach($roles as $role)
						<label>
							<input class="uk-checkbox" type="checkbox" name="role[]" value="{{ $role->name }}"> {{ $role->name }}
						</label><br>
					@endforeach							
				</div>
			</div>		
			<div class="uk-margin">
				<div class="uk-form-controls">							
					<a href="javascript:{}" onclick="document.getElementById('update').submit();" class="uk-button uk-button-primary">Сохранить</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection