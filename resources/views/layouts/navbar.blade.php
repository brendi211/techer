<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Главная
            </a>
          </li>

        @php
        $nav_category = App\Models\Category::orderBy('id','ASC')->get();
        @endphp
        @foreach($nav_category as $navCategory)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.code',$navCategory->code) }}">{{ $navCategory->name }}</a>
            </li>
        @endforeach


        @if (Route::has('login') AND Route::has('register'))
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Вход</a></li>
            @endguest
        @endif
        @auth
              @role('Admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">{{ Auth::user()->name }}</a></li>
              @else
                <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
              @endrole
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <li class="nav-item"><button type="submit" class="mt-2" style="border: 0;background-color: #343a40!important;color: rgba(255,255,255,.5);">Выйти</button></li>
            </form>     
        @endauth
        </ul>
        <form action="" method="POST" class="form-inline">
          @csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Введите текст" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать</button>
  </form>
      </div>
    </div>
  </nav>