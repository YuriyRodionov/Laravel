@extends('layouts.admin')
@section('title') Редактировать новость - @parent @stop
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать новость</h1>

    </div>

    <div class="row">

        <div class="col-md-12">
            @include('include.messages')

            <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
                @csrf
                @method('put')

                <div class="form-group">

                    <label for="name">Имя пользователя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    @error('title') <div style="color: red;">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                </div>
                <p>Права администратора</p>
                <select class="form-control" name="is_admin">

                        <option value=1>Есть права администратора</option>

                        <option value=0 @if(!$user->is_admin) selected @endif>Нет прав администратора</option>


                </select>



                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>

            </form>
        </div>
    </div>
@endsection


