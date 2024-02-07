<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;



    protected $fillable = [
        'id',
        'mobile_number',
        'institution',
        'gender',
        'picture',
        'user_id',
        'cost_id',
    ];

    public function Paper(): BelongsTo
    {
        return $this->belongsTo(Paper::class);
    }

    public function Payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Cost(): BelongsTo
    {
        return $this->belongsTo(Cost::class);
    }

    public function Attend(): HasMany
    {
        return $this->hasMany(Attend::class);
    }
}
