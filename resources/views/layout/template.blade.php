<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevShop - @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Open+Sans&family=Outfit:wght@100;200;300;400;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container-fluid p-0 w-100 min-vh-100 text-center">
        @section('header')
            <header class="container-fluid p-0">
                <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold fs-4" href="/">DevShop</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/produtos">Produtos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/categorias">Categorias</a>
                                </li>
                            </ul>
                        </div>
                        <form action="{{ route('produtos.pesquisar') }}" method="get" class="d-flex" role="search"
                            id="form_busca_produto">
                            <input class="form-control me-2" type="search" placeholder="Buscar produto" aria-label="Search"
                                id="busca" name="busca">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </form>
                    </div>
                </nav>
                <div class="w-100 text-start bg-body-secondary p-2">
                    @guest
                        <span class="mx-5"><a href="{{ route('login') }}">Fazer login</a> ou <a
                                href="{{ route('register') }}">cadastrar-se</a></span>
                    @endguest
                    @auth
                        <span class="mx-5">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Olá, <span class="fw-bold">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu float-end">
                                <li><a class="dropdown-item" href="/profile">Meu perfil</a></li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="Sair">
                                </form>
                            </ul>
                        </span>
                    @endauth
                </div>
            </header>
        @show

        @yield('conteudo')
    </div>

    @section('footer')
        <footer class="container-fluid w-100 p-3 bg-secondary-subtle text-center">
            <p>DevShop - Moacir David 2023</p>
        </footer>
    @show
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/df87a55f2a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
</body>

</html>
