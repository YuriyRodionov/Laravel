@extends('layouts.admin')
@section('title') Список категорий - @parent @stop
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать Категорию</h1>

    </div>

    <div class="row">

        <div class="col-md-12">
            @include('include.messages')

            <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="title">Заголовок категории</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Текст</label>
                    <input type="text" class="form-control" name="description" id="description" value="{!! $category->description !!}">
                </div>

                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>

            </form>
        </div>
    </div>
@endsection


