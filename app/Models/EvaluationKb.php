<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class EvaluationKb extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'base_connaissance_id',
        'utilisateur_id',
        'note',
        'commentaire',
    ];

    public function baseConnaissance()
    {
        return $this->belongsTo(BaseConnaissance::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
