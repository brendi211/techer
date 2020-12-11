<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>

    <li class="uk-nav-header uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: users"></span>Пользователи</li>
    <li class="uk-nav-divider"></li>
    <li><a href="{{ route('users.index') }}"><span class="uk-margin-small-right" uk-icon="icon: grid"></span> Все пользователи</a></li>
    <li><a href="{{ route('roles.index') }}"><span class="uk-margin-small-right" uk-icon="icon: print"></span> Роли пользователей</a></li>
    <li><a href="{{ route('users.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Добавить пользователя</a></li>
    <li class="uk-nav-divider"></li>
    <li><a href="{{ route('admin.category.index') }}"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Категории</a></li>
    <li><a href="{{ route('admin.post.index') }}"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Все посты</a></li>

    <li class="uk-nav-divider"></li>
    <li>
    	<a href="javascript:{}" onclick="document.getElementById('logout').submit();">
    		<span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> Выйти
    	</a>
	</li>

</ul>

<form action="{{ route('logout') }}" method="POST" id="logout">
    @csrf
</form>       


