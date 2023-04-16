<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'family_user', 'family_id', 'user_id');
    }

    public function people(): HasMany {
        return $this->hasMany(Person::class, 'family_id');
    }
}
