<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentosEstoque extends Model
{
    /**
     * Deifindo Nomo da Tabela
     *
     * @var string
     */
    protected $table = 'movimentos_estoque';

    /**
     * Campos permitidos em gravação de dados em massa
     *
     * @var array
     */
    protected $fillable = ['produto_id', 'quantidade', 'valor', 'tipo', 'empresa_id'];

    /**
     * Relação com Produtos
     *
     * @return void
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
