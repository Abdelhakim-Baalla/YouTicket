<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Workflow extends Model
{
    use HasFactory, Loggable;

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
