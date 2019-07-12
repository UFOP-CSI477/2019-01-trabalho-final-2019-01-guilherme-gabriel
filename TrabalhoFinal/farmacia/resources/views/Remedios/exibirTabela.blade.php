@extends('master')
@section('conteudo')
	@auth
	<script type="text/javascript">
		if(({{auth()->user()->status}})==2){
			document.write("<h1>Controle de remédios</h1>");
			document.write("@foreach($remedios as $remedio)");
			document.write("<div class='card'>");
			document.write("<div class='card-body'>");
			document.write("<h2>");
			document.write("<a href='{{route('remedios.show', $remedio->id)}}'>{{$remedio->nome}}</a>");
			document.write("<a href='{{route('remedios.edit', $remedio->id)}}' class='btn btn-info'>Edit</a>");
			document.write("<form onsubmit='return confirm('Você tem certeza que deseja delatar esse remédio?')' class='d-inline-block' method='post' action='{{route('remedios.destroy', $remedio->id)}}'>");
			document.write('@csrf');
			document.write('@method("delete")');
			document.write("<button type='submit' class='btn btn-danger'>Delete</button>");
			document.write("</form>");
			document.write("</h2>");
			document.write("</div>");
			document.write("</div>");
			document.write("@endforeach");
			document.write("<div class='mt-4'>");
			document.write("{{$remedios->links()}}");
			document.write("</div>");
		} else{
			document.write("<h4>Necessário acesso nível 2 para utilizar este menu</h4>");
		}
	</script>
	@endauth
	
	
	
		
			
				
					
				
				
				
					
					
					
				
			
		
	
	
	
		
	
@endsection