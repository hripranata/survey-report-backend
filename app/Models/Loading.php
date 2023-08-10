<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loading extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'lo_date', 'tongkang', 'bbm', 'start', 'stop', 'vol_lo', 'vol_al', 'surveyor'
    ];

    protected $dates = ['deleted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lo_details(): HasMany
    {
        return $this->hasMany(LoDetail::class);
    }
}
