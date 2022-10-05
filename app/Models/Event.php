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

    // Transformando "items" do EventController em array para ser salvo como JSON
    protected $casts = [
        'items' => 'array'
    ];

    // informando que o campo date vindo do front e na tabela no banco é do tipo data
    protected $dates = ['date'];

    protected $fillable = [
        'image'
    ];
}
