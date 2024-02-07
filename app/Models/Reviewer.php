<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reviewer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'mobile_number',
        'picture',
        'gender',
        'user_id',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
