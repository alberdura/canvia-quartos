<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paisos';

    protected $fillable = [
        'codi',  // Exemples de camps que puguis tenir
        'nom',
    ];

    // Relació amb la taula 'monedes'
    public function monedes()
    {
        return $this->belongsToMany(
            Currency::class, 
            'monedes_paisos', 
            'codi_pais', 
            'id_moneda'
        );
    }
}