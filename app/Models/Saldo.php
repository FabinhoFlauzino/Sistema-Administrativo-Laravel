<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    /**
     * Nome da tabela
     *
     * @var string
     */
    protected $table = 'saldo';

    public function movimento()
    {
        return $this->morphTo();
    }

    /**
     * Define dados de alocação em massa
     *
     * @var array
     */
    protected $fillable = ['valor', 'empresa_id'];

    public static function ultimoDaEmpresa(int $empresaId)
    {
        return self::where('empresa_id', $empresaId)
                    ->latest()
                    ->first();
    }

    public static function buscaPorIntervalo(int $empresa, string $inicio, string $fim)
    {
        return self::with('movimento')
                    ->whereBetween('created_at', [$inicio, $fim])
                    ->where('empresa_id', $empresa)
                    ->get();
    }
}
