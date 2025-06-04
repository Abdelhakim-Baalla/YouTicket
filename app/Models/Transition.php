<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Transition extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'workflow_id',
        'etat_source_id',
        'etat_destination_id',
        'nom',
        'condition',
        'action',
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function etatSource()
    {
        return $this->belongsTo(Etat::class, 'etat_source_id');
    }

    public function etatDestination()
    {
        return $this->belongsTo(Etat::class, 'etat_destination_id');
    }
}
