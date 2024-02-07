<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cost extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'category',
        'nominal',
        'earlybird_nominal',
    ];

    public function Author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
