<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>

<div class="container">
    <div class="row">

@include('layouts.navbar')
    @yield('content')
    <!-- right panel -->
    @include('layouts.aside')
    <!-- end right panel -->
    
    </div>
  </div>


 @include('layouts.footer')

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>