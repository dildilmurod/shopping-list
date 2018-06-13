@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Создать новый элемент</h1>

    </div>
    <div class="">
        {!! Form::open(['action'=> 'ListController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название')}}
            {{Form::text('title', '', ['class'=>'', 'placeholder'=>'Шафтоли'])}}

        </div>
        <div class="form-group">
            {{Form::label('description', 'Описание')}}
            {{Form::text('description', '', ['class'=>'', 'placeholder'=>'Туксиз кизил'])}}
        </div>
        <div class="form-group">
            {{Form::label('quantity', 'Количество')}}
            {{Form::number('quantity', 'quantity')}}
        </div>

        <div class="form-group">
            {{Form::label('type_id', 'Тип')}}
            <select name="type_id" class="form-control">
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
            </select>
            {{--{{Form::select('category_id', $categories->id, null, ['placeholder' => 'Choose category'])}}--}}
        </div>

        <div class="form-group">
            {{Form::label('status_id', 'Статус')}}
            <select name="status_id" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->title}}</option>
                @endforeach
            </select>
            {{--{{Form::select('category_id', $categories->id, null, ['placeholder' => 'Choose category'])}}--}}
        </div>


        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection