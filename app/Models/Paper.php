<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paper extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'title_ind',
        'title_en',
        'abstract_ind',
        'abstract_en',
        'file',
        'author_id',
        'archive_id'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('abstract', 'like', '%' . $search . '%');
        });
    }

    public function Author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function Review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function Archive(): BelongsTo
    {
        return $this->belongsTo(Archive::class);
    }

    public function Payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
