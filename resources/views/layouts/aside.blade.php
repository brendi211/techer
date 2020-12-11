      <!-- Sidebar Widgets Column -->
      <div class="col-md-3">

        <!-- Search Widget -->
        <div class="card my-3" style="max-width: 300px;">
          <h5 class="card-header">Глобальный Поиск</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Искать...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Поиск!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-3" style="max-width: 300px;">
          <h5 class="card-header">Категории</h5>
                <ul class="list-group nav_category">
                  @php
                  $nav_category = App\Models\Category::orderBy('id','DESC')->get();
                  @endphp
                  @foreach($nav_category as $navCategory)
                  <a class="text-dark" href="{{ route('category.code',$navCategory->code) }}"><li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $navCategory->name }}
                    <span class="badge badge-primary badge-pill">{{ $navCategory->post->count() }}</span>
                  </li></a>
                 
                  @endforeach
                </ul>
        </div>

        <!-- Side Widget -->
        <div class="card my-3" style="max-width: 300px;">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>
