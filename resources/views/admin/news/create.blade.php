@extends('layouts.admin')
@section('content')
<form action="new">
    <p>
        <input type="text" name="name">Название новости
        <input type="text" name="description">Описание новости
        <input type="text" name="fullText">Текст новости
    </p>
    <p>
        <input type="submit">SUBMIT
    </p>
</form>
@endsection
