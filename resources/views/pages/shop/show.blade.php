@extends('templates.main')
@section('body')
    @foreach($shops as $shop)
        <b>Название: </b>{{$shop->name}}<br>
        <b>Цена: </b>{{$shop->price}} <b>ру</b><br>
        <b>Ркон: </b>{{$shop->rcon}}<br>
        <b>Описание: </b>{{$shop->description}}<br><br>
    @endforeach
@endsection
