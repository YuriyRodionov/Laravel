@extends('layouts.admin')
@section('content')
@section('title') Список пользователей - @parent @stop

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список пользователей</h1>

</div>

<div class="row">

    <div class="col-md-12">
        @include('include.messages')
        <div class="table-responsive">
            {{-- @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif --}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Статус админа</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_admin}}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}">Ред.</a>
                        </td>
                    </tr>

                @empty
                    <h2>Пусто-выросла капуста</h2>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
