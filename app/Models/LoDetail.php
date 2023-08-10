<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'loading_id', 'bunker_id', 'lo_number', 'product', 'qty'
    ];

    protected $dates = ['deleted_at'];

    public function loading(): BelongsTo
    {
        return $this->belongsTo(Loading::class);
    }

    public function bunker(): BelongsTo
    {
        return $this->belongsTo(Bunker::class);
    }
}
