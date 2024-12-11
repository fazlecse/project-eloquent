<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eloquent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10  mx-auto">
                <h2 class="p-3 mb-0 text-center bg-primary-subtle">Eloquent CRUD</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h4 class="p-3 mb-0 bg-danger-subtle">@yield('title')</h4>
            </div>
        </div>
        <d iv class="row">
            <div class="col-lg-10 mx-auto">
                @if (session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </d>
        <div class="row">
            <div class="col-lg-10 mx-auto mt-3">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
