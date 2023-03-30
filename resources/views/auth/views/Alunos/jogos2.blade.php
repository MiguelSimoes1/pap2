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
            <a href="{{route('admin.index')}}"><button class="btn btn-outline-light" type="submit">Login</button></a>
        </div>
    </nav>
    <div id="main">
        <div class="position-absolute top-100 start-100 translate-middle"></div>
        <div class="selecao">
            <div class="container text-center">
                <div>
                    <div class="col">
                        <h1><strong>Preencha os campos</strong></h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div>
                    <div class="alert alert-danger" role="alert">
                        Nº de proceso não existe
                    </div>
                    <form method="POST" action="{{ route('aljogos.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="num_processo" class="form-label">Numero de processo</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" name="numProcesso">
                        </div>
                        <div class="mb-3">
                            <label for="num_processo" class="form-label">Jogos</label>
                            <select class="form-select" aria-label="Default select example" name="jogo">
                                <option value="Avanço">Avanço</option>
                                <option value="Damas">Damas</option>
                                <option value="G & C">G & C</option>
                                <option value="Hex">Hex</option>
                                <option value="Produto">Produto</option>
                                <option value="Rastros">Rastros</option>
                                <option value="Sesqui">Sesqui</option>
                                <option value="SuperTMatik - Cidadania">SuperTMatik - Cidadania</option>
                                <option value="SuperTMatik - Cortpo Humano">SuperTMatik - Cortpo Humano</option>~
                                <option value="SuperTMatik - Educação Alimentar">SuperTMatik - Educação Alimentar</option>
                                <option value="SuperTMatik - Matematica">SuperTMatik - Matematica</option>
                                <option value="SuperTMatik - Operações Basicas de Matematica">SuperTMatik - Operações Basicas de Matematica</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Registar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
