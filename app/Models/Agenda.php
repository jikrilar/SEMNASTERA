<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agenda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'date',
        'status',
        'poster',
    ];

    public function Speaker(): HasMany
    {
        return $this->hasMany(Speaker::class);
    }

    public function Cost(): HasMany
    {
        return $this->hasMany(Cost::class);
    }
}
