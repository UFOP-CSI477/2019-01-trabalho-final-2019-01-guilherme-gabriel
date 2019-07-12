<?php

namespace App\Http\Controllers;

use App\remedio;
use Illuminate\Http\Request;

class RemedioController extends Controller
{
    //Função que verifica a autentificação
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show', 'filtrar', 'searchRemedio']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Chama view index com dados do banco + ordenação e delimitação de 10 elementos por pagina
    public function index()
    {
        $remedios = remedio::orderBy('id', 'asc')->paginate(10);
        return view('remedios.index', ['remedios' => $remedios]);
    }

    //Chama view telaEstoque com dados do banco + ordenação e delimitação de 10 elementos por pagina
    public function telaEstoque()
    {
        $remedios = remedio::orderBy('id', 'asc')->paginate(10);
        return view('remedios.exibirTabela', ['remedios' => $remedios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Função usada para cadastro
    public function create()
    {
        return view('remedios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Função usada verificar se os dados de cadastro foram preenchidos, e os salvar na tabela
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:2',
            'valor' => 'required|min:1',
            'urlImagem' => 'required|min:5',
            'descricao' => 'required|min:10',
            'estoque' => 'required|min:1'
        ]);
        remedio::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'urlImagem' => $request->urlImagem,
            'descricao' => $request->descricao,
            'estoque' => $request->estoque,
        ]);
        return redirect(route('remedios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\remedio  $remedio
     * @return \Illuminate\Http\Response
     */
    //Função usada para chamar a view show com uma tupla selecionada do banco
    public function show(remedio $remedio)
    {
        return view('remedios.show', ['remedio' => $remedio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\remedio  $remedio
     * @return \Illuminate\Http\Response
     */
    //Função usada para chamar a tela de edição passando uma tupla especifica do banco
    public function edit(remedio $remedio)
    {
        return view('remedios.edit', compact('remedio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\remedio  $remedio
     * @return \Illuminate\Http\Response
     */
    //Função usada para fazer updates de tuplas
    public function update(Request $request, remedio $remedio)
    {
        $remedio->nome = $request->nome;
        $remedio->valor = $request->valor;
        $remedio->urlImagem = $request->urlImagem;
        $remedio->descricao = $request->descricao;
        $remedio->estoque = $request->estoque;

        $remedio->save();
        session()->flash('message', 'Seus remedios foram atualizados com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\remedio  $remedio
     * @return \Illuminate\Http\Response
     */
    //função usada para deletar tuplas do banco de dados
    public function destroy(remedio $remedio)
    {
        $remedio->delete();
        return redirect(route('remedios.index'));
    }

    //Essa função chama a tela com dados fultrados
    public function filtrar()
     {
        $remedios = remedio::orderBy('nome', 'asc')->paginate(10);
        return view('Remedios.filtrar', ['remedios' => $remedios]);
    }

    /*Referencia de https://www.youtube.com/watch?v=uAqoAzhxwjU*/
    //função usada para buscar uma tupla especifica no DB
    public function searchRemedio(Request $request, remedio $remedio){

        $dataForm = $request->all();
        
        

        $remedios = $remedio->search($dataForm);


        return view('Remedios.filtrar', compact('remedios'));
        //dd($request->all());
    }

    //Essa função faz um update no numero de estoque quando o usuario começa a fazer uma compra 
    public function updateEstoque($id) {
    $page = remedio::find($id);
    $page->where('id', $id)->update(['estoque' => $page->estoque-1]);
    //return view('Compras.create');
    return redirect(route('compras.create'));
}
}
