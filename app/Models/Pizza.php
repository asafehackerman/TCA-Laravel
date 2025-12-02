<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use SoftDeletes;

    protected $table = 'pizza'; // aqui você indica a tabela singular

    protected $fillable = [
        'nome', 'descricao', 'preco', 'categoria', 'foto'
    ];

    // opcional: accessor para exibir preço formatado
    public function getPrecoFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
}
