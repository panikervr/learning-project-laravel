@extends('templates.main')
@section('body')
    <div class="row align-items-center g-lg-5 ">
        @if(auth()->check())
            <div class="d-grid gap-2 d-md-block">
                <a href="{{route('pages.news.create')}}" class="btn btn-success" type="button">Создать</a>
            </div>
        @endif
        @foreach($news as $new)
            @include('components.news.index', [
            'id' => $new->id,
            'title' => $new->title,
            'content' => $new->content,
            'image' => $new->image,
            'published' => $new->published,
            'created_at' => $new->created_at,
            'category_name' => $new->category_name,
            'username' => $new->username
            ])
        @endforeach
        {{$news->links()}}
    </div>
@endsection
