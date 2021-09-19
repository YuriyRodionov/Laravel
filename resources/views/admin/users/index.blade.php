@extends('layouts.admin')
@section('title') Список новостей - @parent @stop
@section('content')
<h2>Пользователи и заказы</h2>
<p>{{ $list }}</p>
@endsection

