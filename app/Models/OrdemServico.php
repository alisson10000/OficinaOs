<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrdemServico extends Model
{

    use HasFactory;

    protected $table = 'ordens_servico'; // Nome da tabela no banco de dados

    protected $fillable = [
        'cliente',
        'veiculo',
        'status',
        'data_criacao',
        'descricao'
    ];
}
