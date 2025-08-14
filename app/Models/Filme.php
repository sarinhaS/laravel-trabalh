<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filme extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'sinopse', 'ano', 'categorias_id', 'imagem', 'trailer', 'comentarios'];

    public function categoria() : BelongsTo{
        return $this->belongsTo(Categoria::class);
    }

    public function comentarios() : HasMany {
        return $this->hasMany(Comentario::class);
    }
}
