<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'monedes';

    protected $fillable = [
        'symbol',
        'name',
        'symbol_native',
        'decimal_digits',
        'rounding',
        'code',
        'name_plural',
        'type',
    ];

    // Relació amb la taula 'paisos'
    public function paisos()
    {
        return $this->belongsToMany(
            Pais::class,  // Model relacionat
            'monedes_paisos', // Nom de la taula intermitja
            'id_moneda',  // Clau estrangera del model actual
            'codi_pais'   // Clau estrangera del model relacionat
        );
    }
}
