<div class="card m-3" style="max-width: 580px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img width="250px" height="250px" src="https://orthomoda.ru/bitrix/templates/.default/img/no-photo.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$title ?? NULL}}</h5>
                    <p class="card-text">{{$content ?? NULL}}</p>
                    <p class="card-text"><small class="text-body-secondary">Создано: {{$created_at ?? NULL}}</small></p>
                    <p>Категория: <span class="badge rounded-pill text-bg-light">{{$category_name ?? NULL}}</span></p>
                    <p class="card-text"><small class="text-body-secondary">Автор: <b>{{$username ?? NULL}}</b></small></p>
                    <div class="text-end">
                        <a href="{{route('pages.news.show', $id)}}" class="btn btn-primary">Перейти {{$id}}</a>
                    </div>
                </div>
            </div>
        </div>
</div>

