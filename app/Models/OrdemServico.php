<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdemServico extends Model
{
    use HasFactory;

    protected $table = 'ordens_servico';

    protected $fillable = [
        'cliente_id',
        'data_entrada',
        'data_saida',
        'status',
        'descricao_servico',
        'valor_total',
        'observacoes',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
