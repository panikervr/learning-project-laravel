@extends('templates.main')
@section('body')
<div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Форма регистрации пользователя</h1>
        <p class="col-lg-10 fs-4">Ниже приведен пример формы, полностью созданной с использованием элементов управления формами Bootstrap. Каждая требуемая группа форм имеет состояние проверки, которое может быть вызвано попыткой отправки формы без ее заполнения.</p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="{{route('pages.register.store')}}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Почта</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Ваше имя">
                <label for="floatingInput">Ваше имя</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password">
                <label for="floatingPassword">Пароль</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="password_confirmation">
                <label for="floatingPassword">Повторите Пароль</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Запомнить меня
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
            <hr class="my-4">
            <small class="text-body-secondary">Нажимая кнопку Зарегистрироваться, вы соглашаетесь с условиями использования.</small>
        </form>
    </div>
</div>
@endsection
