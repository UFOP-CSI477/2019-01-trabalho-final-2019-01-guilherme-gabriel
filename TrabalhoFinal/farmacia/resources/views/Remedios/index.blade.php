@extends('master')
@section('conteudo')

<h2>Remédios</h2>

	<div class="row">
        @foreach ($remedios as $remedio)
       	<div class="col-sm-4 mb-2">
            <div class="card">
                <img class="card-img-top img-thumbnail" src="{{$remedio->urlImagem}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$remedio->nome}}</h5>
                    <p class="card-text">{{$remedio->descricao}}</p>
                    <a href="{{route('remedios.show', $remedio->id)}}" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
        <?php 
            $cont = 0;
            $cont++;
            if($cont==3){
                echo "<br/>";
                $cont = 0;
            }
        ?>   
        @endforeach      
    </div>


<div class="mt-4">
	{{$remedios->links()}}
</div>

@endsection