@extends('templates.main')
@section('body')
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Авторизация</h1>
            <p class="col-lg-10 fs-4">Ниже приведен пример формы, полностью созданной с использованием элементов управления формами Bootstrap. Каждая требуемая группа форм имеет состояние проверки, которое может быть вызвано попыткой отправки формы без ее заполнения.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="{{route('pages.login.store')}}" method="post">
                @csrf
                @error('auth_error')
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{$message}}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Закрыть"></button>
                        </div>
                    </div>
                </div>
                @enderror
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Почта</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" value="remember-me"> Запомнить меня
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
                <hr class="my-4">
                <small class="text-body-secondary">Нажимая кнопку Войти, вы соглашаетесь с условиями использования.</small>
            </form>
        </div>
    </div>
@endsection
