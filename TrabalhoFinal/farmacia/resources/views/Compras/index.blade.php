@extends('master')
@section('conteudo')

@auth
    <script type="text/javascript">
        if(({{auth()->user()->status}})==2){
            document.write('<h1>Controle de Compras</h1>');
            document.write('<table class="table">');
            document.write('<thead class="thead-dark">');
            document.write('<tr>');
            document.write('<th scope="col">Id</th>');
            document.write('<th scope="col">ID do remédio</th>');
            document.write('<th scope="col">Nome do usuário</th>');
            document.write('<th scope="col">Forma de pagamento</th>');
            document.write('<th scope="col">Endereço</th>');
            document.write('<th scope="col">Numero</th>');
            document.write('<th scope="col">Estado</th>');
            document.write('<th scope="col">Cidade</th>');
            document.write('<th scope="col">Operações</th>');
            document.write('</tr>');
            document.write('</thead>');
            document.write('<tbody>');
            document.write('@foreach($compras as $compra)');
            document.write('<tr scope="row">');
            document.write('<td>{{$compra->id}}</td>');
            document.write('<td>');
            document.write('<a href="{{route('compras.show', $compra->id)}}">{{$compra->idRemedio}}</a>');
            document.write('</td>');
            document.write('<td>{{$compra->nome}}</td>');
            document.write('<td>{{$compra->formaPagamento}}</td>');
            document.write('<td>{{$compra->endereco}}</td>');
            document.write('<td>{{$compra->numero}}</td>');
            document.write('<td>{{$compra->estado}}</td>');
            document.write('<td>{{$compra->cidade}}</td> ');
            document.write('<td>');
            document.write('<form onsubmit="return confirm("Você tem certeza que deseja delatar essa compra?")" class="d-inline-block" method="post" action="{{route('compras.destroy', $compra->id)}}">');
            document.write('@csrf');
            document.write('@method('delete')');
            document.write('<button type="submit" class="btn btn-danger">Delete</button>');
            document.write('</form>');
            document.write('</td> ');
            document.write('</tr>');
            document.write('@endforeach');
            document.write('</tbody>');
            document.write('</table>');
            document.write('</div>');
            document.write('<div class="mt-4">');
            document.write('{{$compras->links()}}');
            document.write('</div>');
        } else{
            document.write("<h4>Necessário acesso nível 2 para utilizar este menu</h4>");
        }
    </script>
@endauth
@endsection