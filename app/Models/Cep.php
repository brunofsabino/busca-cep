<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cep extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'localidade',
        'uf',
        'ddd',
    ];
}
