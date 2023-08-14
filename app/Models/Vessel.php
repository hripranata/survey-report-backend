<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vessel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vessel_name', 'vessel_type'
    ];

    public function tongkangs(): HasMany
    {
        return $this->hasMany(Bunker::class, 'tongkang_id');
    }
    public function kris(): HasMany
    {
        return $this->hasMany(Bunker::class, 'kri_id');
    }

    public function loadings(): HasMany
    {
        return $this->hasMany(Loading::class, 'tongkang_id');
    }
}
