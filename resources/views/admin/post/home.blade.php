@extends('admin.layouts.base')

@section('title')
<title>Все посты</title>
@endsection
@section('content')
<h4>Все посты</h4>
@include('admin.alert')
<table class="uk-table uk-table-small uk-table-middle uk-table-striped uk-text-small uk-margin-remove-vertical">
	<thead>
		<tr>
			<th class="uk-table-expand">Название поста</th>
			<th class="uk-table-expand">Мини Описание</th>
			<th class="uk-table-expand">URL</th>
			<th class="uk-table-expand">Категория</th>
			<th class="uk-text-right">Управление</th>
		</tr>
	</thead>
	<tbody>
		@foreach($posts as $post)
		<tr>
			<td>
				{{ $post->name }}
			</td>
			<td>
				{{ Str::words($post->text, 25) }}
			</td>
			<td>
				{{ $post->code }}
			</td>
			<td>
				@isset($post->getCategory->name)
				{{ $post->getCategory->name }}
				@else
				Не определена
				@endisset
			</td>
			<td class="uk-text-right">
				<ul class="uk-iconnav uk-float-right">
				    <li><a href="{{ route('users.role', $post->id) }}" uk-icon="icon: thumbnails" title="Посты данной категории"></a></li>
				    <li><a href="#update-{{ $post->id }}" title="Изменить" uk-icon="icon: file-edit" uk-toggle></a></li>
				    <li><a href="#destroy-{{ $post->id }}" title="Удалить" uk-icon="icon: trash" uk-toggle></a></li>
				</ul>				
			</td>
		</tr>
		@endforeach			
	</tbody>
</table>
{{ $posts->links('vendor.pagination.bootstrap-4') }}
<div class="uk-margin">
	<a href="#store" class="uk-button uk-button-primary" uk-toggle>Добавить Категорию</a>
</div>
<div id="store" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Заполните поля Категории</h4>
		<form action="{{ route('admin.post.create') }}" method="post">
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

			<button type="submit" class="uk-button uk-button-primary">Добавить</button>
		</form>		

    </div>
</div>
@foreach($posts as $post)
<div id="update-{{ $post->id }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Подтвердить</h4>
		<form action="{{ route('admin.post.update', $post->id) }}" method="post">
			@csrf

			<div class="uk-margin">
				<input type="text" name="name" class="uk-input" value="{{ $post->name }}">
			</div>

			<div class="uk-margin">
				<textarea name="text" rows="5" class="uk-textarea">{{ $post->text }}</textarea>
			</div>

			<div class="uk-margin">
				<input type="text" name="code" class="uk-input" value="{{ $post->code }}">
			</div>
			@isset($post->getCategory)
				<div class="uk-text-left"><b>Текущая категория: {{$post->getCategory->name}}</b></div>
			@else
				<div class="uk-text-left"><b>Текущая категория: Неопределена, либо удалена</b></div>
			@endisset
			<div class="uk-margin" data-uk-form-select>
				Изменить: 
				<select class="uk-select" name="category">
					@php
					$category_select = App\Models\Category::orderBy('id','DESC')->get();
					@endphp

					@foreach($category_select as $category)

						@if(isset($post->getCategory->name) AND $category->name == $post->getCategory->name)
							<option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
						@else
							<option value="{{$category->id}}" >{{$category->name}}</option>
						@endif
						
					@endforeach
					

				</select>
			</div>

			<button type="submit" class="uk-button uk-button-primary">Обновить</button>
		</form>		

    </div>
</div>
<div id="destroy-{{ $post->id }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">

        <button class="uk-modal-close-default" type="button" uk-close></button>
		<h4 class="">Удалить?</h4>
		<form action="{{ route('admin.category.destroy', $post->id) }}" method="post">
			@csrf
			@method('DELETE')
			<div class="uk-margin">
				Удалить Категорию {{ $post->name }}?
			</div>
			<button type="submit" class="uk-button uk-button-primary">Удалить</button>
		</form>		

    </div>
</div>
@endforeach	
@endsection
