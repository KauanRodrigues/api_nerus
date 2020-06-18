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
        $response = $this->produtos->select('id', 'nome', 'descricao', 'categoria', 'preco')->paginate(5);

        return response()->json($response);
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

        foreach($request->kit as $item)
        {
            $kit['fk_produto'] = $new_produto->id;
            $kit['quantidade'] = $item['quantidade'];
            $kit['descricao'] = $item['descricao'];

            $this->kits->create($kit);
        }

        DB::commit();
    }

    public function deletar(Request $request)
    {
        $this->kits->where('fk_produto', $request->id)->delete();
        $this->produtos->destroy($request->id);

        return true;
    }
}
