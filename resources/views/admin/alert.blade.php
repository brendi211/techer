@if (Session::has('success'))
<div class="uk-alert uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    {{ Session::get('success') }}
</div>        
<script>
    setTimeout(function(){
        UIkit.alert('.uk-alert').close();
    }, 5000)
</script>
@endif
@if ($errors->any())
<div class="uk-alert uk-alert-danger" uk-alert>
	<a class="uk-alert-close" uk-close></a>
    <ul class="uk-list">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>        
<script>
    setTimeout(function(){
        UIkit.alert('.uk-alert').close();
    }, 5000)
</script>
@endif	