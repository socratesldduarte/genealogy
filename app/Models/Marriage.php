<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
    use HasFactory;

    protected $table = 'marriages';
    protected $fillable = ['person_one_id', 'person_two_id', ];
}
