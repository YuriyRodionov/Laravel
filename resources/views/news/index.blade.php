@extends('layouts.main')
@section('content')

                <!-- Blog post-->
                @forelse ($newsList as $news)
                <div class="card mb-4">
                    <a href="{{route('news.show', ['id' => $news['id']])}}">{{$news['title']}}<img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{now()->format('d:m:Y H:i')}}</div>
                        <h2 class="card-title h4">{{$news['title_id']}}</h2>
                        <p class="card-text">{{$news['author']}}</p>
                        <a class="btn btn-primary" href="{{route('news.show', ['id' => $news['id']])}}">{{$news['title']}} &nbsp;Read more →</a>
                    </div>
                </div>
                    @if($loop->last)
                        <p>Пора спать</p>
                    @endif
                @empty
                    <h1>@include('include.messages', ['wow' => 'hop'])</h1>
                @endforelse

        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                <li class="page-item"><a class="page-link" href="#!">15</a></li>
                <li class="page-item"><a class="page-link" href="#!">Older</a></li>
            </ul>
        </nav>


    {{-- так делается комментарий --}}


@endsection


