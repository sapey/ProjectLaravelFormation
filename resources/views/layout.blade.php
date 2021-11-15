<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mon projet avec Laravel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('formationList')}}">FOrmations</a>
                </li>

                @if(\Illuminate\Support\Facades\Auth::check())
                        <a class="nav-link" href="{{route('formationList')}}">Bonjour {{\Illuminate\Support\Facades\Auth::user()->firstname}}</a>
                        <li class="nav-item">
                            <form method='post' action="{{route('logout')}}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Déconnexion</button>
                            </form>
                        </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Connexion</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>



    @yield('content')


</body>
</html>
