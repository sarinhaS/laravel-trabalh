<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['autor', 'conteudo', 'filme_id'];

    public function filme() : BelongsTo {
        return $this->belongsTo(Filme::class);
    }
}
