<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Archive extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'volume',
        'publish_year',
        'agenda_id'
    ];

    public function Paper(): HasMany
    {
        return $this->hasMany(Paper::class);
    }
}
