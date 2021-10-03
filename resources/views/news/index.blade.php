@extends('layouts.main')
@section('content')

                <!-- Blog post-->
                @forelse ($newsList as $news)
                <div class="card mb-4">
                    <a href="{{route('news.show', ['id' => $news->id])}}">{{$news->title}}<img class="card-img-top" src=@if($news->image) {{ Storage::disk('public')->url($news->image) }} @else "https://dummyimage.com/700x350/dee2e6/6c757d.jpg @endif" style="height: 350px;" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $news->created_at }}</div>
                        <h2 class="card-title h4">{{$news->category_id}}</h2>
                        <p class="card-text">{{$news->author}}</p>
                        <a class="btn btn-primary" href="{{route('news.show', ['id' => $news->id])}}">{{$news->title}} &nbsp;Read more →</a>
                    </div>
                </div>
                    @if($loop->last)
                        <p>Пора спать</p>
                    @endif
                @empty
                    <h1>@include('include.messages', ['wow' => 'hop'])</h1>
                @endforelse

        <!-- Pagination-->
                {!! $newsList->links() !!}



    {{-- так делается комментарий --}}


@endsection


