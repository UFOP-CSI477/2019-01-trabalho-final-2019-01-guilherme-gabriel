<?php

namespace App\Http\Controllers;

use App\compra;
use App\remedio;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    //Função que verifica a autentificação
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Chama view index com dados do banco + ordenação e delimitação de 10 elementos por pagina
    public function index()
    {
        $compras = compra::orderBy('id', 'asc')->paginate(10);
        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Função usada para cadastro
    public function create()
    {
        $remedios = remedio::orderBy('id', 'asc')->paginate(10);
        return view('compras.create', ['remedios' => $remedios]);
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
            'idRemedio' => 'required|min:1',
            'nome' => 'required|min:3',
            'formaPagamento' => 'required|min:4',
            'endereco' => 'required|min:3',
            'numero' => 'required|min:1',
            'estado' => 'required|min:2',
            'cidade' => 'required|min:3'
        ]);
        compra::create([
            'idRemedio' => $request->idRemedio,
            'nome' => $request->nome,
            'formaPagamento' => $request->formaPagamento,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
        ]);
        return redirect(route('remedios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    //Função usada para chamar a view show com uma tupla selecionada do banco
    public function show(compra $compra)
    {
        return view('compras.show', ['compra' => $compra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    //Função usada para chamar a tela de edição passando uma tupla especifica do banco
    public function edit(compra $compra)
    {
        return view('compras.edit', compact('compra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    //Função usada para fazer updates de tuplas
    public function update(Request $request, compra $compra)
    {
        $compra->idRemedio = $request->idRemedio;
        $compra->nome = $request->nome;
        $compra->formaPagamento = $request->formaPagamento;
        $compra->endereco = $request->endereco;
        $compra->numero = $request->numero;
        $compra->estado = $request->estado;
        $compra->cidade = $request->cidade;

        $compra->save();
        session()->flash('message', 'Suas compras foram atualizados com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    //função usada para deletar tuplas do banco de dados
    public function destroy(compra $compra)
    {
        $compra->delete();
        return redirect(route('remedios.index'));
    }
}
