<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenParent extends Model
{
    use HasFactory;

    protected $table = 'children_parent';
    protected $fillable = ['parent_id', 'children_id', ];
}
