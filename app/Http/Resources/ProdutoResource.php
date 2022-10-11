<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->pkproduto,
            'nome_do_produto' => $this->nomedoproduto,
            'preco_do_produto' => $this->precodelista,
            'categoria' => [
                'id' => $this->categoria->pkcategoria,
                'nome_da_categoria' => $this->categoria->nomedacategoria
            ]
        ];
    }
}
