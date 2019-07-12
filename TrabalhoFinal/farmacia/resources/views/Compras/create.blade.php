@extends('master')

@section('conteudo')
<h2 class="my-3">Fazer compra</h2>
@if($errors->all())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</div>
@endif
<form action="{{route('compras.store')}}" method="post">
	@csrf

	<div class="form-group">
		<label for="idRemedio">Nome do produto comprado:</label>
		<select class="form-control" name="idRemedio">
			<!--Recupera elemento Cliente do banco de dados-->
			@foreach ($remedios as $remedio)
			<option value="{{$remedio->id}}">{{$remedio->nome}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="nome">Nome do usuario:</label>
		<input type="text" name="nome" id="nome" class="form-control">
	</div>

	<div class="form-group">
		<label for="formaPagamento">Forma de pagamento:</label>
		<select class="form-control" name="formaPagamento">
			<option value="Cartão de credito">Cartão de credito</option>
			<option value="Boleto">Boleto</option>
		</select>
	</div>
	<div class="form-group">
		<label for="endereco">Endereço:</label>
		<input type="text" name="endereco" id="endereco" class="form-control">
	</div>
	<div class="form-group">
		<label for="numero">Número:</label>
		<input type="number" name="numero" id="numero" class="form-control">
	</div>
	<div class="form-group">
		<label for="estado">Estado:</label>
		<select class="form-control" id="estado" name="estado">
			
		    <option value="AC">Acre</option>
		    <option value="AL">Alagoas</option>
		    <option value="AP">Amapá</option>
		    <option value="AM">Amazonas</option>
		    <option value="BA">Bahia</option>
		    <option value="CE">Ceará</option>
		    <option value="DF">Distrito Federal</option>
		    <option value="ES">Espírito Santo</option>
		    <option value="GO">Goiás</option>
		    <option value="MA">Maranhão</option>
		    <option value="MT">Mato Grosso</option>
		    <option value="MS">Mato Grosso do Sul</option>
		    <option value="MG">Minas Gerais</option>
		    <option value="PA">Pará</option>
		    <option value="PB">Paraíba</option>
		    <option value="PR">Paraná</option>
		    <option value="PE">Pernambuco</option>
		    <option value="PI">Piauí</option>
		    <option value="RJ">Rio de Janeiro</option>
		    <option value="RN">Rio Grande do Norte</option>
		    <option value="RS">Rio Grande do Sul</option>
		    <option value="RO">Rondônia</option>
		    <option value="RR">Roraima</option>
		    <option value="SC">Santa Catarina</option>
		    <option value="SP">São Paulo</option>
		    <option value="SE">Sergipe</option>
		    <option value="TO">Tocantins</option>
		    <option value="ES">Estrangeiro</option>
		</select>
	</div>

	<div class="form-group">
		<label for="cidade">Cidade:</label>
		<input type="text" name="cidade" id="cidade" class="form-control">
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-outline-info">Adicionar remédio</button>
	</div>
</form>

@endsection