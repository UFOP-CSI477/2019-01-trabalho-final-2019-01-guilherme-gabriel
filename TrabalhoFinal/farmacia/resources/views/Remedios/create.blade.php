@extends('master')

@section('conteudo')

@auth
	<script type="text/javascript">
		if(({{auth()->user()->status}})==2){
			document.write('<h2 class="my-3">Adicionar Remédio</h2>');
			document.write('@if($errors->all())');
			document.write('<div class="alert alert-danger">');
			document.write('@foreach($errors->all() as $error)');
			document.write('<li>{{$error}}</li>');
			document.write('@endforeach');
			document.write('</div>');
			document.write('@endif');
			document.write('<form action="{{route("remedios.store")}}" method="post">');
			document.write('@csrf');
			document.write('<div class="form-group">');
			document.write('<label for="nome">Nome do remédio</label>');
			document.write('<input type="text" name="nome" id="nome" class="form-control">');
			document.write('</div>');
			document.write('<div class="form-group">');
			document.write('<label for="valor">Valor</label>');
			document.write('<input type="number" name="valor" id="valor" class="form-control">');
			document.write('</div>');
			document.write('<div class="form-group">');
			document.write('<label for="urlImagem">Url da imagem</label>');
			document.write('<input type="text" name="urlImagem" id="urlImagem" class="form-control">');
			document.write('</div>');
			document.write('<div class="form-group">');
			document.write('<label for="descricao">Descrição</label>');
			document.write('<input type="text" name="descricao" id="descricao" class="form-control">');
			document.write('</div>');
			document.write('<div class="form-group">');
			document.write('<label for="estoque">Estoque</label>');
			document.write('<input type="number" name="estoque" id="estoque" class="form-control">');
			document.write('</div>');
			document.write('<div class="form-group">');
			document.write('<button type="submit" class="btn btn-outline-info">Adicionar remédio</button>');
			document.write('</div>');
			document.write('</form>');
		} else{
			document.write("<h4>Necessário acesso nível 2 para utilizar este menu</h4>");
		}
	</script>
@endauth
@endsection