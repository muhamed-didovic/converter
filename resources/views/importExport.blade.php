<html lang="en">
<head>
    <title>Import - Export Laravel 5</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Import - Export in Excel and CSV Laravel 5</a>
        </div>
    </div>
</nav>
<div class="container">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/import') }}"
          enctype="multipart/form-data"
          style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;"
    >
        @csrf
        <input type="file" name="import_file"/>
        <input type="hidden" name="type" id="type">
        {{--<button class="btn btn-primary">Import File</button>--}}

        {{--<a href="{{ URL::to('download/xls') }}">--}}
            <button class="btn btn-success" onclick="document.getElementById('type').value = 'xls'">Convert to Excel xls</button>
        {{--</a>--}}
        {{--<a href="{{ URL::to('download/xlsx') }}">--}}
            <button class="btn btn-success" onclick="document.getElementById('type').value = 'xlsx'">Convert to Excel xlsx</button>
        {{--</a>--}}
        {{--<a href="{{ URL::to('download/csv') }}">--}}
            <button class="btn btn-success" onclick="document.getElementById('type').value = 'csv'">Convert to CSV</button>
        {{--</a>--}}
    </form>
</div>
</body>
</html>