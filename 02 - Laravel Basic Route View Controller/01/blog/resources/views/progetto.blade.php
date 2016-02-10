<!DOCTYPE html>
<html>
<head>
    <title>Laravel - Progetto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
</head>
<body>
@if($user['name'] == "Gabriele")
    <h1>Ciao sei fantastico</h1>
@elseif($user['job']=="Capo")
    <h1>Buongiorno Eminenza</h1>
@else
    <h1>Ciao Come va?</h1>
@endif
<ul>
    @foreach($heroes as $hero)
        <li>{{ $hero }}</li>
    @endforeach
</ul>


<ul>
    @forelse($heroes as $hero)
        <li>{{ $hero }}</li>
    @empty
        <li>Non ci sono eroi</li>
    @endforelse

    <ul class="alert alert-error"></ul>
    <li></li>
</ul>
</body>
</html>
