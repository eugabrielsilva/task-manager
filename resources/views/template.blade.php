<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{ $title ?? 'Início' }} - Project Manager</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    </head>

    <body class="bg-dark" data-bs-theme="dark">
        <header class="bg-dark border-bottom">
            <a href="{{ route('projects.index') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" class="logo">
            </a>
            <img src="{{ asset('assets/images/avatar.png') }}" class="avatar">
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            Desenvolvido por <a href="https://gabrielsilva.dev.br" target="_blank">Gabriel Silva</a>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/js/script.min.js') }}"></script>
    </body>

</html>
