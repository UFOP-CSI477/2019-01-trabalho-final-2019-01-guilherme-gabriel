@extends('master')
@section('conteudo')

<h2>Controle de estoque</h2>
@auth

<h3>Nível de acesso: {{auth()->user()->status}}</h3>
<script type="text/javascript">
	if(({{auth()->user()->status}})==2){
		document.write("<a class='btn btn-primary m-2' href='/controleEstoque/remedio'>Remédios</a>");
		document.write("<a class='btn btn-primary m-2' href='/controleEstoque/compra'>Compras</a>");
		document.write("<a class='btn btn-primary m-2' href='{{route('remedios.create')}}'>Adicionar Remédio</a>");
	} else{
		document.write("<h4>Necessário acesso nível 2 para utilizar este menu</h4>");
	}
</script>
@endauth

@endsection