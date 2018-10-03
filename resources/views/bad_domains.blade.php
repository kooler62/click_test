@extends('layout')


@section('content')
    <h2 class="sub-header">Section title</h2>
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>id</th>
                <th>Domain</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($domains as $domain)
                <tr>
                    <td>{{ $domain->id }}</td>
                    <td><a href="//{{$domain->name}}"> {{$domain->name}}</a></td>
                    <td><a href="{{route('bad_domains.edit', ['id' => $domain->id])}}">изменить</a></td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['bad_domains.destroy', $domain->id]]) !!}
                        <button  title="Удалить">Удалить</button>
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




{{ $domains->links()  }}

    @endsection