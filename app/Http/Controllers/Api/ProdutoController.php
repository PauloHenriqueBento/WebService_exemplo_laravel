<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Http\Resources\ProdutoResource;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        //http://127.0.0.1:8000/api/produtos?filtro=nome_da_categoria:Electric Bikes
        $query = Produto::with('categoria');

        $filterParameter = $request -> input ("filtro");

        if($filterParameter == null)
        {
            $produtos = $query->get();

            $response = response()->json([
                'status' => 200,
                'mensagem' => 'Listar de produtos retornada',
                'produtos' => ProdutoResource::collection($produtos)
            ], 200);
        } else {
            [$filterCriteria, $filterValue] = explode(":", $filterParameter);

            if($filterCriteria == 'nome_da_categoria') {
                $produtos = $query->join("categorias", "pkcategoria", "=", "fkcategoria")
                    ->where("nomedacategoria", "=", $filterValue)->get();

                $response = response()->json([
                    'status' => 200,
                    'mensagem' => 'Lista de produtos retornada - Filtrada',
                    'produtos' => ProdutoResource::collection($produtos)
                ], 200);
            } else {
                $response = response()->json([
                    'status' => 406,
                    'mensagem' => 'Filtro não aceito',
                    'produtos' => []
                ], 406);
            }
        }

        return $response;
    }
}
