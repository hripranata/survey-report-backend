<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','tongkang_id', 'kri_id', 'bunker_location', 'bbm', 'start', 'stop', 'vol_lo', 'vol_ar', 'surveyor'
    ];

    protected $dates = ['deleted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tongkang(): BelongsTo
    {
        return $this->belongsTo(Vessel::class, 'tongkang_id');
    }
    public function kri(): BelongsTo
    {
        return $this->belongsTo(Vessel::class, 'kri_id');
    }

    public function lo_details(): HasMany
    {
        return $this->hasMany(LoDetail::class);
    }


}
