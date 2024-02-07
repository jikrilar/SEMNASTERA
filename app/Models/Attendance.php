<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'meet_link',
        'attendance_start',
        'attendance_end',
        'agenda_id'
    ];

    public function Agenda(): BelongsTo
    {
        return $this->belongsTo(Agenda::class);
    }
}
