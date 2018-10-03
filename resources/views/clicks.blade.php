<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://plunix.ru/w/sortirovka/sort.js"></script>
    <script src="jquery.tablesorter.min.js" type="text/javascript"></script>


    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/jquery.tablesorter.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                _this = this;
                $.each($("#user_list tbody tr"), function() {
                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#user_list").tablesorter({sortList: [[0,1]]});
        });
    </script>
</head>
<body>
@section('header')
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Clicks</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('bad_domains.create')}}">Add Bad domain</a></li>
                    <li><a href="{{route('bad_domains.index')}}">Bad domains</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                 <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
                </form>
            </div>
        </div>
    </div>
@show
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-1 col-md-10 col-md-offset-1 main">

<br><br><br><br><br>
            <div class="table-responsive">
<table id="user_list">
    <thead>
    <tr>
        <th>id</th>
        <th>User Agent</th>
        <th>ip</th>
        <th>referer</th>
        <th>param1</th>
        <th>param2</th>
        <th>errors</th>
        <th>bad_domains</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clicks as $click)
        <tr id="z_{{$loop->iteration}}">
            <td><a href="/success/{{ $click->uid }}"> {{ $click->uid }}</a></td>
            <td>{{ $click->user_agent }}</td>
            <td>{{ $click->ip }}</td>
            <td><a href=" {{ $click->referer }}"> {{ $click->referer }}</a></td>
            <td>{{ $click->param1 }}</td>
            <td>{{ $click->param2 }}</td>
            <td>{{ $click->errors }}</td>
            <td>{{ $click->bad_domains }}</td>
        </tr>
    @endforeach
    </tbody>

</table>
            </div>
{{ $clicks->links()  }}
        </div>
    </div>
</div>
</body>
</html>
