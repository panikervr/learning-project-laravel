@extends('templates.main')

@section('body')
    <div class="row align-items-center g-lg-5 py-5">
        <div class="card m-3 shadow " style="max-width: 1250px">
            @include('components.news.show')
    @auth
            <div class="mb-3" style="max-width: 450px">
                <form class="p-4 border rounded-3 bg-body-tertiary" action="{{route('pages.news.commentAdd', ['news'=> $news->id])}}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('comment')is-invalid @enderror" name="comment" placeholder="Контент" id="floatingTextarea2" style="height: 100px">{{old('comment')}}</textarea>
                        <label for="floatingTextarea2">Коментарий</label>
                        @error('comment')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Оставить коментарий</button>
                    <hr class="my-4">
                    <small class="text-body-secondary">Все коментарии проверяются модераторами.</small>
                </form>
            </div>
    @endauth
            <h4>Comments</h4>

            <div class="mb-3">
                @if($news->comments->isEmpty())<p>Коментариев нет </p>@endif
                @foreach($comments as $comment)
                        @include('components.news.comments', [
                            'name' => $comment->username,
                            'comment' => $comment->comment
                        ])
                @endforeach
            </div>
        </div>
    </div>
@endsection
