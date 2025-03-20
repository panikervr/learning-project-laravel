<header class="pb-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="{{route('pages.news.index')}}" class="nav-link px-2 link-body-emphasis">Новости</a></li>
                <li><a href="{{route('pages.users.index')}}" class="nav-link px-2 link-body-emphasis">Пользователи</a></li>
                <li><a href="{{route('pages.shop.index')}}" class="nav-link px-2 link-body-emphasis">Магазин</a></li>
            </ul>
            @guest
            <div class="col-md-3 text-end">
                <a href="{{route('login')}}" role="button" class="btn btn-outline-primary me-2">Войти</a>
                <a href="{{route('pages.register')}}" role="button" class="btn btn-primary">Регистрация</a>
            </div>
            @endguest
            @auth
            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">

                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        {{auth()->user()->name ?? NULL}}

                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{route('pages.login.logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Выйти</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>

</header>
