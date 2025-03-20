@extends('templates.main')
@section('body')
    <h1>Выберите Категорию!</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($shops as $shop)
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Shop</text></svg>

                    <div class="card-body">
                        <p class="card-text">{{$shop->category_name}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" href="{{route('pages.shop.show', $shop->id)}}" class="btn btn-sm btn-outline-secondary">Смотреть</a>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
