<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kri extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kri_name'
    ];

    public function bunkers(): HasMany
    {
        return $this->hasMany(Bunker::class);
    }
}
