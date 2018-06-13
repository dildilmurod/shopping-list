<?php use App\Type; ?>
<?php use App\Status; ?>
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <p><a class="btn btn-primary" href="/list" role="button">Ко всем элементам</a></p>
        <h3>{{$list->title}}</h3>
        <h4>{{$list->description}}</h4>
        <h4>{{$list->quantity}} {{Type::where('id', $list->type_id)->first()->title}}</h4>
        <h4>{{Status::where('id', $list->status_id)->first()->title}}</h4>
        <p><a class="btn btn-success" href="/list/status/{{$list->id}}" role="button">Обновить статус (на куплено)</a> <a class="btn btn-primary" href="/list/{{$list->id}}/edit" role="button">Изменить</a> <a class="btn btn-danger" href="/list/{{$list->id}}/delete" role="button">Удалить</a></p>

    </div>
    <div class="text-center">
        <div class="well">

        </div>
    </div>
@endsection