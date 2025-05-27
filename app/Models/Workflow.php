<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'type_ticket_id',
        'actif',
    ];

    public function typeTicket()
    {
        return $this->belongsTo(TypeTicket::class);
    }

    public function transitions()
    {
        return $this->hasMany(Transition::class);
    }
}
