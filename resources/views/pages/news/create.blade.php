@extends('templates.main')
@section('body')
    <div class="row align-items-center py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Форма добавления новости</h1>
        </div>
        <div class="">
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="{{route('pages.news.store')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title')is-invalid @enderror" id="floatingInput" placeholder="Название новости">
                    <label for="floatingInput">Тайтл</label>
                    @error('title')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('content')is-invalid @enderror" name="content" placeholder="Контент" id="floatingTextarea2" style="height: 100px">{{old('content')}}</textarea>
                    <label for="floatingTextarea2">Контент</label>
                    @error('content')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <select name="category" class="form-select form-select-sm mb-3 @error('category')is-invalid @enderror" aria-label=".form-select-sm пример">
                    <option selected>Выберите категорию</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <div class="form-check mb-3">
                    <input class="form-check-input" name="published" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Флажок по умолчанию
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button>
                <hr class="my-4">
                <small class="text-body-secondary">Нажимая кнопку Зарегистрироваться, вы соглашаетесь с условиями использования.</small>
            </form>
        </div>
    </div>
@endsection
