<!DOCTYPE html>
<html>
<head>
    <title>GGFarma - Página Principal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <div id="area-cabecalho">
            <div id="area-logo">
                <h1>GG<span class="branco">Farma</span></h1>
            </div>
            <div id="area-menu">
                <a href="/">Home</a>
                @auth
                <a href="/controleEstoque">Controle de estoque</a>
                <form class="d-inline-block" action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-secondary">{{auth()->user()->name}} - Logout</button>
                </form>
                @else
                    <a href="{{route('login')}}" class="btn btn-secondary">Login</a>
                @endauth
                    <form style="float: right;" action="{{ route('/home/buscar') }}" method="POST">
                        {!! csrf_field() !!}
                        <label for="nome">Buscar:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome do remedio">
                        <input type="submit" id="buttonBuscar" value="Buscar" name="buscar">
                    </form>
            </div>
        </div>

        <div id="area-principal">
            <div id="area-postagens">
                <!-- Conteudo principal-->
                <div class="postagem">
                    @yield('conteudo')
                </div>
                      
                      
            </div>
                
        </div><!-- Fechamento do conteudo-->


            </div>

            <div id="rodape">
                Todos os direitos reservados
            </div>
        </div>
</body>
</html>