@extends('layout')

@section('header')
    @endsection
@section('content')
    <h2 class="sub-header">Success!</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <td>{{ $click->uid }}</td>
            </tr>
            <tr>
                <th>user_agent</th>
                <td>{{ $click->user_agent }}</td>
            </tr>
            <tr>
                <th>ip</th>
                <td>{{ $click->ip }}</td>
            </tr>
            <tr>
                <th>referer</th>
                <td><a href="{{ $click->referer }}">{{ $click->referer }}</a></td>
            </tr>
            <tr>
                <th>param1</th>
                <td>{{ $click->param1 }}</td>
            </tr>
            <tr>
                <th>param2</th>
                <td>{{ $click->param2 }}</td>
            </tr>
            <tr>
                <th>errors</th>
                <td>{{ $click->errors }}</td>
            </tr>
            <tr>
                <th>bad_domain</th>
                <td>{{ $click->bad_domain }}</td>
            </tr>
        </table>
    </div>
@endsection