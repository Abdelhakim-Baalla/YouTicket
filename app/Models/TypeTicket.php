<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'icone',
        'actif',
    ];

    public function workflows()
    {
        return $this->hasMany(Workflow::class);
    }

    public function champPersonnalises()
    {
        return $this->hasMany(ChampPersonnalise::class);
    }
}
