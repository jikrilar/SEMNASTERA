<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'status',
        'comment',
        'reviewer_id',
        'paper_id',
    ];

    public function Reviewer():BelongsTo
    {
        return $this->belongsTo(Reviewer::class);
    }

    public function Paper():BelongsTo
    {
        return $this->belongsTo(Paper::class);
    }
}
