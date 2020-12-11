@extends('admin.layouts.base')

@section('title')
<title>Роли пользователей</title>
@endsection
@section('content')
<h4>Роли пользователей</h4>
@include('admin.alert')
<table class="uk-table uk-table-small uk-table-middle uk-table-striped uk-text-small uk-margin-remove-vertical">
	<thead>
		<tr>
			<th class="uk-table-expand">Имя</th>
			<th class="uk-text-right">Управление</th>
		</tr>
	</thead>
	<tbody>
		@foreach($roles as $role)
		<tr>
			<td>
				{{ $role->name }}		
			</td>
			<td class="uk-text-right">
				<ul class="uk-iconnav uk-float-right">
				    <li><a href="{{ route('users.role', $role->name) }}" uk-icon="icon: users"></a></li>
				    <li><a href="#update-{{ $role->id }}" uk-icon="icon: file-edit" uk-toggle></a></li>
				    <li><a href="#destroy-{{ $role->id }}" uk-icon="icon: trash" uk-toggle></a></li>
				</ul>				
			</td>
		</tr>
		@endforeach			
	</tbody>
</table>
<div class="uk-margin">
	<a href="#store" class="uk-button uk-button-primary" uk-toggle>Добавить роль</a>
</div>
<div id="store" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Подтвердить</h4>
		<form action="{{ route('roles.store') }}" method="post">
			@csrf
			<div class="uk-margin">
				<input type="text" name="name" class="uk-input" placeholder="Имя роли">
			</div>
			<button type="submit" class="uk-button uk-button-primary">Добавить</button>
		</form>		

    </div>
</div>
@foreach($roles as $role)
<div id="update-{{ $role->id }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Подтвердить</h4>
		<form action="{{ route('roles.update', $role->name) }}" method="post">
			@csrf
			<div class="uk-margin">
				<input type="text" name="name" class="uk-input" value="{{ $role->name }}">
			</div>
			<button type="submit" class="uk-button uk-button-primary">Обновить</button>
		</form>		

    </div>
</div>
<div id="destroy-{{ $role->id }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Подтвердить</h4>
		<form action="{{ route('roles.destroy', $role->name) }}" method="post">
			@csrf
			@method('DELETE')
			<div class="uk-margin">
				Удалить роль {{ $role->name }}?
			</div>
			<button type="submit" class="uk-button uk-button-primary">Удалить</button>
		</form>		

    </div>
</div>
@endforeach	
@endsection
