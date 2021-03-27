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

    protected $visible = ['id', 'text'];

    protected $appends = ['text'];

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

    /**
     * Filtrando Select2
     *
     * @param string $nome
     * @param string $tipo
     * @return void
     */
    public static function buscaPorNomeTipo(string $nome, string $tipo)
    {
        return self::where('nome', 'LIKE', "%{$nome}%")
                    ->where('tipo', $tipo)
                    ->get();
    }

    public function getTextAttribute()
    {
        return sprintf(
            '%s (%s)',
            $this->attributes['nome'],
            $this->attributes['razao_social'],
        );
    }
}
