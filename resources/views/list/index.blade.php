<?php use App\Type; ?>
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Активные элементы</h1>
        <p><a class="btn btn-primary" href="/all" role="button">Архив</a>  <a class="btn btn-primary" href="/list/create" role="button">Добавить элемент</a></p>
    </div>
    <div class="col-md-6">
    @if(count($list)>= 1):
    @foreach($list as $lists)
        <div class="well">
            <a href="list/{{$lists->id}}"><h3>{{$lists->title}}</h3></a>
            <h4>{{$lists->description}}    <a class="btn btn-success" href="/list/status/{{$lists->id}}" role="button">Куплено</a></h4>
            <h4><b>{{$lists->quantity}}</b> {{Type::where('id', $lists->type_id)->first()->title}}</h4>
            <hr>
        </div>
    @endforeach
        {{$list->links()}}
    @else
        <p>Элементов списка нет</p>
    @endif
    </div>
@endsection