@extends('layouts.admin')
@section('content')
    @section('title') Список новостей - @parent @stop

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список новостей</h1>
    <a href="{{route('admin.news.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i>Добавить новость</a>
    <a href="{{route('admin.parser')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i>Парсить новости</a>
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
                <th>Категория новости</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Источник</th>
                <th>Дата добавления</th>
                <th>Управление</th>
            </tr>
        </thead>
        <tbody>
@forelse($newsList as $news)
    <tr>
        <td>{{$news->id}}</td>
        <td>{{optional($news->category)->title}}</td>
        <td>{{$news->title}}</td>
        <td>{{$news->description}}</td>
        <td>{{$news->source->title}}</td>
        <td>{{$news->created_at}}</td>
        <td>
            <a href="{{ route('admin.news.edit', ['news'=>$news->id]) }}">Ред.</a>
            &nbsp;&nbsp;
            <a href="javascript:;" class="delete" rel="{{ $news->id }}">Уд.</a>
        </td>
    </tr>

@empty
    <h2>Пусто-выросла капуста</h2>
@endforelse
        </tbody>
    </table>

    {!! $newsList->links() !!}
</div>
</div>
</div>
@endsection

@push('js')
    <script type="text/javascript">

        /* Вариант на js
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            console.log(el);
            el.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const rel = e.getAttribute("rel");
                    if(confirm("Подтверждаете удаление c #ID " + rel + " ?")) {
                        submit("/admin/news/" + rel).then(() => {
                            location.reload();
                        })
                    }
                });
            })
        });
        async function submit(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }*/

        $(function() {

            $(".delete").on('click', function () {
                var id = $(this).attr("rel");
                if (confirm("Подтвердите удаление записи с #ID " + id)) {
                    $.ajax({
                        type: "delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/news/" + id,
                        success: function (response) {
                            alert("Запись успешно удалена");
                            console.log(response);
                            //location.reload();
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });

        });

    </script>
@endpush
