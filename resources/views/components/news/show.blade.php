<div class="row g-0">
    <div class="col-md-4">
        <img width="250px" height="250px" src="https://orthomoda.ru/bitrix/templates/.default/img/no-photo.jpg" class="bg-body-tertiary rounded img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h2 class="border-bottom card-title">{{$news->title}}</h2>
            <p class="card-text">{{$news->content}}</p>
            <br>
            <p class="card-text"><b>Категория: </b>{{$news->category->name}}</p>
            <p class="card-text"><b>Автор: </b>{{$news->user->name}}</p>
            @if(auth()->check())
                <div class="btn-group">
                    <a href="{{route('pages.news.edit', ['news'=> $news->id])}}" class="btn btn-success">Редактировать</a>
                    <form action="{{route('pages.news.destroy', $news->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="card-footer bg-transparent">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <p class=" mb-2"><small class="text-body-secondary"><b>Создано:</b> {{$news->created_at}}</small></p>
    </div>
</div>
