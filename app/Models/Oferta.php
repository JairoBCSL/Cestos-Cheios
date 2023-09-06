<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;
    protected $table = 'ofertas';
    protected $fillable = [
        'id',
        'membro_id',
        'valor_entregue',
        'troco',
        'valor_final',
        'obreiro_id',
        'data_oferta'
    ];

    public function membro(){
        return $this->belongsTo('App\Models\Membro');
    }

    public function obreiro(){
        return $this->belongsTo('App\Models\User');
    }

    public function rules(){
        return[
            'membro_id' => 'required|exists:membros,id',
            'valor_entregue' => 'required|numeric',
            'troco' => 'required|numeric',
            'valor_final' => 'required|numeric',
            'obreiro_id' => 'required|exists:users,id',
            'data_oferta' => 'required|date',
        ];
    }

    public function feedback(){
        return[
            'required' => 'O campo :attribute é obrigatório',
            'exists' => 'O registro não existe',
            'date' => 'Formato de data inválido',
            'numeric' => 'O valor do campo precisa ser numérico',
            'integer' => 'O valor do campo precisa ser inteiro',
        ];
    }
}
