
@extends('layout')

@section('content')
    <br><br><br><br><br><br>

    {!! Form::open(['method' => 'POST', 'action' => 'BadDomainController@store', 'class'=>'form-inline']) !!}

    {{ Form::label('name', 'Domain', ["class" => "control-label",]) }}

    {{ Form::text('name', null, [ "class" => "form-control", "id" => "inputSuccess3", "placeholder" => "example.com"]) }}
    @if ($errors->has('title'))
        <label id="name-error" class="text-danger" for="name">{{ $errors->first('name') }}</label>
    @endif

    {{ Form::submit('Добавить', [ "class" => "btn btn-info btn-fill"]) }}

    {!! Form::close() !!}
@endsection
