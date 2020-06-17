<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Kits;
use App\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    protected $produtos;
    protected $kits;

    function __construct(Produtos $produtos, Kits $kits)
    {
        $this->produtos = $produtos;
        $this->kits = $kits;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->produtos->select('nome', 'descricao', 'categoria', 'preco')->get();

        return response()->json(['result' => $response]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $produto['nome'] = trim($request->nome);
        $produto['descricao'] = trim($request->descricao);
        $produto['preco'] = $request->preco;
        $produto['colecao'] = $request->colecao;

        $new_produto = $this->produtos->create($request->all());

        $kit['fk_produto'] = $new_produto->id;
        $kit['quantidade'] = $request->quantidade;
        $kit['descricao'] = trim($request->descricao_kit);

        $this->kits->create($kit);

        DB::commit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
