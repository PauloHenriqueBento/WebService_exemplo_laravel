<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nomedoproduto', 'anodomodelo', 'precodelista'];

    protected $primaryKey = 'pkproduto';

    protected $table = 'produtos';

    public $incrementing = true;

    public $timestamp = false;

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'fkcategoria', 'pkcategoria');
    }
}
