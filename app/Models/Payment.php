<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'transfer_slip',
        'status',
        'invoice_code',
        'paper_id'
    ];

    public function Paper(): BelongsTo
    {
        return $this->belongsTo(Paper::class);
    }
}
