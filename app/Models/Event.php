<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 
        'descricao', 
        'cidade', 
        'data',
        'rua',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'cep', 
        'user_id',
        'horario',
        'imagem_nome',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
