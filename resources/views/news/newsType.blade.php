@extends('layouts.main')
@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Дата добавления</th>

                    </tr>
                    </thead>
                    <tbody>

                    @forelse($typesList as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->created_at }}</td>

                        </tr>
                    @empty
                        <h2>Категории потерялись</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>






@endsection
