@extends('admin.layouts.base')

@section('title')
<title>Категории</title>
@endsection
@section('content')
<h4>Категории</h4>
@include('admin.alert')
<table class="uk-table uk-table-small uk-table-middle uk-table-striped uk-text-small uk-margin-remove-vertical">
	<thead>
		<tr>
			<th class="uk-table-expand">Имя</th>
			<th class="uk-table-expand">Описание</th>
			<th class="uk-table-expand">URL</th>
			<th class="uk-text-right">Управление</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categories as $category)
		<tr>
			<td>
				{{ $category->name }}
			</td>
			<td>
				{{ $category->description }}
			</td>
			<td>
				{{ $category->code }}
			</td>
			<td class="uk-text-right">
				<ul class="uk-iconnav uk-float-right">
				    <li><a href="{{ route('users.role', $category->id) }}" uk-icon="icon: thumbnails" title="Посты данной категории"></a></li>
				    <li><a href="#update-{{ $category->id }}" title="Изменить" uk-icon="icon: file-edit" uk-toggle></a></li>
				    <li><a href="#destroy-{{ $category->id }}" title="Удалить" uk-icon="icon: trash" uk-toggle></a></li>
				</ul>				
			</td>
		</tr>
		@endforeach			
	</tbody>
</table>
<div class="uk-margin">
	<a href="#store" class="uk-button uk-button-primary" uk-toggle>Добавить Категорию</a>
</div>
<div id="store" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Заполните поля Категории</h4>
		<form action="{{ route('admin.category.create') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="uk-margin">
				<input type="text" name="name" class="uk-input" placeholder="Название категории">
			</div>
			<div class="uk-margin">
				<input type="text" name="description" class="uk-input" placeholder="Описание катеории">
			</div>
			<div class="uk-margin">
				<input type="text" name="code" class="uk-input" placeholder="красивый url категории">
			</div>
			<div class="uk-margin">
				<input type="file" name="image" class="uk-input" title="Images">
			</div>

			<button type="submit" class="uk-button uk-button-primary">Добавить</button>
		</form>		

    </div>
</div>
@foreach($categories as $category)
<div id="update-{{ $category->id }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Подтвердить</h4>
		<form action="{{ route('admin.category.update', $category->id) }}" method="post">
			@csrf
			<div class="uk-margin">
				<input type="text" name="name" class="uk-input" value="{{ $category->name }}">
			</div>
			<div class="uk-margin">
				<input type="text" name="description" class="uk-input" value="{{ $category->description }}">
			</div>
			<div class="uk-margin">
				<input type="text" name="code" class="uk-input" value="{{ $category->code }}">
			</div>
			<button type="submit" class="uk-button uk-button-primary">Обновить</button>
		</form>		

    </div>
</div>
<div id="destroy-{{ $category->id }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Удалить?</h4>
		<form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
			@csrf
			@method('DELETE')
			<div class="uk-margin">
				Удалить Категорию {{ $category->name }}?
			</div>
			<button type="submit" class="uk-button uk-button-primary">Удалить</button>
		</form>		

    </div>
</div>
@endforeach	
@endsection
