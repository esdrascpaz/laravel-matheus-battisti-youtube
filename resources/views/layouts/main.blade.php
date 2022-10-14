<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" contentBody="width=device-width, initial-scale=1">

        <title>
            {{-- Nome deste elemento por qual ele poderá ser chamado em outras páginas --}}
            @yield('title')
        </title>

        {{-- Fontes do Google --}}

        {{-- CSS do bootstrap --}}
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
            crossorigin="anonymous"
        >

        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
            crossorigin="anonymous">
        </script>

        {{-- CSS da aplicação/local --}}
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

        <link 
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" 
            rel="stylesheet"
        >
    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="colapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand"></a>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar evento</a>
                        </li>
                        {{-- Diretiva blade onde o que está em "auth" é exibido para usuários autenticados --}}
                        @auth
                            <li class="nav-item">
                                <form action="logout" method="post">
                                    @csrf
                                    <a 
                                        href="/logout"
                                        class="nav-link"
                                        {{-- Evita o evento padrão do <a>, que seria ir para um link --}}
                                        onclick="
                                            event.preventDefault();
                                            // Vai buscar o formulário mais próximo e submeter
                                            this.closest('form').submit();"
                                    >Sair</a>
                                </form>
                            </li>

                        @endauth
                        {{-- Diretiva blade onde o que está em "guest", é exibido para convidados não autenticados --}}
                        @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                    <p class="msg"> {{ session('msg') }} </p>
                    @endif
                    {{-- Nome deste elemento por 
                    qual ele poderá ser 
                    chamado em outras páginas --}}
                    @yield('contentBody')        
                </div>
            </div>
        </main>
        <footer>
            <p>Esdras C Paz &copy; 2020</p>
        </footer>
    </body>
</html>
