<div id="sidebar" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-default">
            <li class="">{{ Auth::user()->name }}</li>
            <li class="uk-nav-header uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: users"></span>Пользователи</li>
            <li><a href="{{ route('users.index') }}"><span class="uk-margin-small-right" uk-icon="icon: grid"></span> Все пользователи</a></li>
    <li><a href="{{ route('roles.index') }}"><span class="uk-margin-small-right" uk-icon="icon: print"></span> Роли пользователей</a></li>
            <li><a href="{{ route('users.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Добавить пользователя</a></li>
            <li>
                <a href="javascript:{}" onclick="document.getElementById('logout').submit();">
                    <span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> Выйти
                </a>
            </li>            
        </ul>
    </div>
</div>
