@extends('master')

@section('conteudo')
<script>
function checaEstoque() {
  if ({{$remedio->estoque}} <= 0) {
    alert("Produto fora de estoque");
    return false;
  }
}
</script>

<div class="card">
	<div class="card-header">
		<h2>{{$remedio->nome}}</h2>
	</div>
	<div class="card-body">
		<img class="card-img-top" src="{{$remedio->urlImagem}}" alt="Card image cap">
		<br/>
		<label for="desc">Descrição:</label>
		<p id="desc">
			{{$remedio->descricao}}
		</p>
		<label for="valor">Valor:</label>
		<p id="valor">
			{{$remedio->valor}}
		</p>
		<label for="estoq">Estoque:</label>
		<p id="estoq">
			{{$remedio->estoque}}
		</p>
	</div>
	<a onclick="return checaEstoque();" href="/retirarEstoque/{{$remedio->id}}" class="btn btn-secondary">Comprar</a>
</div>

@stop