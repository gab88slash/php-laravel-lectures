<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
</head>
<body>
<div class="header">
    <ul>
        @section('navbar')
            <li>
                <a href="{{route('lista.spettatore')}}">
                    Lista Gare Per Giorno
                </a>
            </li>
            <li>
                <a href="{{route('gara.form')}}">
                    Aggiungi Una Gara
                </a>
            </li>
            <li>
                <a href="{{route('lista.admin')}}">
                    Lista tutte le gare
                </a>
            </li>
        @show
    </ul>

</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>
