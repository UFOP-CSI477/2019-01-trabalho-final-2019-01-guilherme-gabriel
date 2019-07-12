@extends('master')

@section('conteudo')
<h2 class="my-3">Atualização de Remedios</h2>
@if($errors->all())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</div>
@endif

@if (session()->has('message'))
	<div class="alert alert-success">
		{{session()->get('message')}}
	</div>
@endif

<form action="{{route('remedios.update', $remedio->id)}}" method="post">
	@csrf
	@method('put')
	
	<div class="form-group">
		<label for="nome">Nome do remédio</label>
		<input type="text" name="nome" id="nome" class="form-control">
	</div>
	<div class="form-group">
		<label for="valor">Valor</label>
		<input type="number" name="valor" id="valor" class="form-control">
	</div>
	<div class="form-group">
		<label for="urlImagem">Url da imagem</label>
		<input type="text" name="urlImagem" id="urlImagem" class="form-control">
	</div>
	<div class="form-group">
		<label for="descricao">Descrição</label>
		<input type="text" name="descricao" id="descricao" class="form-control">
	</div>

	<div class="form-group">
		<label for="estoque">Estoque</label>
		<input type="number" name="estoque" id="estoque" class="form-control">
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-outline-info">Atualizar</button>
	</div>
</form>

@endsection