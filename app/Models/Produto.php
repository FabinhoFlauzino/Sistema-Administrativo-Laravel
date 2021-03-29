<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    /**
     * Define dados para serealização
     *
     * @var array
     */
    protected $visible = ['id', 'text'];

    /**
     * Anexa acessores a serealização
     *
     * @var array
     */
    protected $appends = ['text'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produtos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'descricao'];

    /**
     * Busca Produto por Nome
     *
     * @param string $nome
     * @return void
     */
    public static function buscaPorNome(string $nome)
    {
        return self::where('nome', 'LIKE', "%{$nome}%")->get();
    }

    /**
     * Criandso serealização de dados
     *
     * @return void
     */
    public function getTextAttribute()
    {
        return $this->attributes['nome'];
    }

}
