<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'name',
        'symbol_native',
        'decimal_digits',
        'rounding',
        'code',
        'name_plural',
        'type',
        'countries',
        'value',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'countries' => 'array',
        'value' => 'float',
    ];
}
