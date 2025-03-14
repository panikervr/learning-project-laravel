@extends('templates.main')
@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Игроки</h5>

            @foreach($users as $user)
                <div class="d-md-flex align-items-center mb-4">
                    <!-- Avatar -->
                    <div class="avatar me-3 mb-3 mb-md-0">
                        <a href="{{route('pages.users.profile', $user->id)}}"> <img class="avatar-img rounded-circle"  width="70px" height="70px" src="https://github.com/mdo.png" alt=""> </a>
                    </div>
                    <!-- Info -->
                    <div class="w-100">
                        <div class="d-sm-flex align-items-start">
                            <h6 class="mb-0"><a class="nav-link " href="{{route('pages.users.profile', $user->id)}}">{{$user->name}}</a></h6>
                            <p class="small ms-sm-2 mb-0">Full Stack Web Developer</p>
                        </div>
                        <!-- Connections START -->
                        <ul class="list-group mt-1 list-unstyled">
                            <li class="small ms-3">
                                Почта: {{$user->email}}
                            </li>
                        </ul>
                        <!-- Connections END -->
                    </div>
                    <!-- Button -->
                    <div class="ms-md-auto d-flex">
                        <button class="btn btn-danger btn-sm mb-0 me-2"> Remove </button>
                        <button class="btn btn-primary btn-sm mb-0"> Message </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
