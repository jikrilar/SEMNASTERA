<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attend extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'attendance_id',
        'author_id',
    ];

    public function Attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }

    public function Author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
