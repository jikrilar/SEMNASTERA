<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Date extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'description',
        'date',
        'agenda_id'
    ];

    public function Agenda(): BelongsTo
    {
        return $this->belongsTo(Agenda::class);
    }
}
