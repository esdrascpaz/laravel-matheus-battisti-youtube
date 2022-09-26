<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// A classe Event (no singular), representa a tabela Events (no plural),
// e estende os métodos da classe Model, do Eloquent, para as operações
// de bancos de dados
class Event extends Model
{

    use HasFactory;

    protected $fillable = [
        'image'
    ];
}
