<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\AbstractPaginator;

class Empresa extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'razao_social', 'documento', 'ie_rg', 'nome_contato',
        'celular', 'email', 'telefone', 'cep', 'logradouro', 'bairro',
        'cidade', 'estado', 'observacao', 'tipo'
    ];

    /**
     * Undocumented function
     *
     * @param string $tipo
     * @param integer $quantidade
     * @return AbstractPaginator
     */
    public static function todasPOrTipo(string $tipo, int $quantidade = 10): AbstractPaginator
    {
        return self::where('tipo', $tipo)->paginate($quantidade);
    }
}
