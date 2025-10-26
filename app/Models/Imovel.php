<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'endereco',
        'descricao',
        'preco',
        'quartos',
        'banheiros',
        'area',
        'endereco',
        'tipo',
        'categoria',
        'imagem_principal',
        'galeria_imagens',
    ];

    /**
     * Garanta que este bloco exista!
     * Ele diz ao Laravel para converter o JSON do banco
     * em um array (e vice-versa).
     */
    protected $casts = [
        'galeria_imagens' => 'array',
    ];
}