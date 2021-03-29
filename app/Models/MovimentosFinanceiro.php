<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentosFinanceiro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movimentos_financeiros';

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
    protected $fillable = ['descricao', 'valor', 'tipo', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo('App\Models\empresa');
    }

    public static function buscaPorIntervalo(string $inicio, string $fim, $quantidade = 20)
    {
        return self::whereBetween('created_at', [$inicio, $fim])
                    ->with(['empresa' => function($query){
                        $query->withTrashed();
                    }])
                    ->paginate($quantidade);
    }

    public function saldo()
    {
        return $this->morphOne(Saldo::class, 'movimento');
    }

    public static function porIdComEmpresaExcluida($id)
    {
        return self::with(['empresa' => function($query){
            $query->withTrashed();
        }])
        ->findOrFail($id);
    }
}
