@extends('admin.layouts.base')

@section('title')
@if(Route::currentRouteName() === 'users.index') 
<title>Пользователи</title>
@else
<title>Поиск</title>
@endif
@endsection
@section('content')
<div class="uk-flex uk-flex-between uk-flex-middle">
	<div>
		@if(Route::currentRouteName() === 'users.index') 
		<h4>Пользователи</h4>
		@else
		<h4>Поиск</h4>
		@endif
	</div>
	<div>
		<div class="uk-margin">
		    <form class="uk-search uk-search-default" action="{{ route('users.search') }}" method="post" id="search">
		    	@csrf
		        <a href="javascript:{}" onclick="document.getElementById('search').submit();" class="uk-search-icon-flip" uk-search-icon></a>
		        <input class="uk-search-input" name="search" type="search" placeholder="Поиск..." autofocus="">
		    </form>
		</div>
	</div>
</div>
@include('admin.alert')
<table class="uk-table uk-table-small uk-table-middle uk-table-striped uk-table-hover uk-text-small uk-margin-remove-vertical">
	<thead>
		<tr>
			<th class="uk-table-shrink">ID</th>
			<th class="uk-table-expand">Имя</th>
			<th class="uk-table-shrink">Email</th>
			<th class="uk-table-shrink uk-text-right">Роли</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td class="uk-table-link">
				<a href="{{ route('users.edit', $user->id) }}" class="uk-link-reset">{{ $user->id }}</a>
			</td>
			<td class="uk-table-link">
				
				<a href="{{ route('users.edit', $user->id) }}" class="uk-link-reset">{{ $user->name }}</a>
			</td>
			<td class="uk-text-nowrap">
				{{ $user->email }}
			</td>
			<td class="uk-text-right uk-text-nowrap">
				@foreach($user->roles as $role)
					<a href="{{ route('users.role', $role->name) }}" class="uk-link-muted">{{ $role->name }}</a> <br>
				@endforeach	
				@if(!$user->roles->count())
					<a href="{{ route('users.role', 'default') }}" class="uk-link-muted">Registered</a>
				@endif				
			</td>

		</tr>
		@endforeach					

	</tbody>
</table>
@if(Route::currentRouteName() != 'users.search')  
{{ $users->links('pagination') }}
@else
@endif
@endsection