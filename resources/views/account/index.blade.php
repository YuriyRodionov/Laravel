<div>
    <h2>Привет {{ Auth::user()->name }}</h2>
    @if(Auth::user()->avatar)
        <br>
        <img src="{{ Auth::user()->avatar }}" style="width: 200px;" alt="abr">
    @endif
    <br>
    @if(Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}">В админку</a>
    @endif
    <br>
    <a href="{{ route('logout') }}">Выход</a>
</div>
