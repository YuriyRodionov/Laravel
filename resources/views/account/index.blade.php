<div>
    <h2>Привет {{ Auth::user()->name }}</h2>
    <br>
    @if(Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}">В админку</a>
    @endif
    <br>
    <a href="{{ route('logout') }}">Выход</a>
</div>
