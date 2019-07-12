@extends('master')

@section('conteudo')

@auth
	<script type="text/javascript">
		if(({{auth()->user()->status}})==2){
			document.write('<div class="card">');
			document.write('<div class="card-header">');
			document.write('<h2>ID Remédio: {{$compra->idRemedio}}</h2>');
			document.write('</div>');
			document.write('<div class="card-body">');
			document.write('<label for="comp">Nome do comprador:</label>');
			document.write('<p id="comp">{{$compra->nome}}</p>');
			document.write('<label for="pag">Forma de pagamento:</label>');
			document.write('<p id="pag">{{$compra->formaPagamento}}</p>');
			document.write('<label for="end">Endereço:</label>');
			document.write('<p id="end">{{$compra->endereco}}</p>');
			document.write('<label for="num">Numero:</label>');
			document.write('<p id="num">{{$compra->numero}}</p>');
			document.write('<label for="est">Estado:</label>');
			document.write('<p id="est">{{$compra->estado}}</p>');
			document.write('<label for="cit">Cidade:</label>');
			document.write('<p id="cit">{{$compra->cidade}}</p>');
			document.write('</div>');
			document.write('</div>');
			document.write('');
		} else{
			document.write("<h4>Necessário acesso nível 2 para utilizar este menu</h4>");
		}
	</script>
@endauth
	
@stop