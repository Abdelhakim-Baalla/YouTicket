<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketTag extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'ticket_id',
        'tag_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
