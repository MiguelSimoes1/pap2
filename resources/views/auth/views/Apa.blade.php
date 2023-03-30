<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/apa.css') }}">
</head>

<body class="body">
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Salvaterra de Magos</a>
            <a href="{{route('login.index')}}"><button class="btn btn-outline-light" type="submit">Login</button></a>
        </div>
    </nav>
    <div id="main">
        <div class="position-absolute top-100 start-100 translate-middle"></div>
        <div class="selecao">
            <div class="container text-center">
                <div>
                    <div class="col">
                        <h1><strong>Bem vindo à biblioteca! Identifique-se!</strong></h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="d-grid gap-2">
                    <div class="container text-center">
                        <div class="row align-items-start">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary" href="{{ route('alunos.index') }}"
                                        role="button">Aluno</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary" href="{{ route('professores.index') }}"
                                        role="button">Professor</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary" href="{{ route('auxiliares.index') }}"
                                        role="button">Auxiliar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
