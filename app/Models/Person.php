<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['family_id', 'gender', 'name', 'nick_name', 'birth_day', 'birth_place', 'death_day', 'death_place', 'bio', ];

    protected $casts = [
        'birth_day' => 'date',
        'death_day' => 'date',
    ];

    public function family(): BelongsTo {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function parents(): BelongsToMany {
        return $this->belongsToMany(Person::class, 'children_parent', 'children_id', 'parent_id')->withPivot(['parent_id', 'children_id']);
    }

    public function children(): BelongsToMany {
        return $this->belongsToMany(Person::class, 'children_parent', 'parent_id', 'children_id');
    }

    public function getSiblingsAttribute() {
        $parents = $this->belongsToMany(Person::class, 'children_parent', 'children_id', 'parent_id')
            ->wherePivot('children_id', $this->id)->pluck('id')->toArray();
        $children = DB::table('children_parent')
            ->distinct()
            ->where('children_id', '<>', $this->id)
            ->whereIn('parent_id', $parents)
            ->pluck('children_id')
            ->toArray();

        return Person::with('parents')->with('children')->whereIn('id', $children)->get();
    }

    public function getMarriagesAttribute() {
        $marriagesOne = $this->belongsToMany(Person::class, 'marriages', 'person_one_id', 'person_two_id')
            ->wherePivot('person_one_id', $this->id)->pluck('id')->toArray();
        $marriagesTwo = $this->belongsToMany(Person::class, 'marriages', 'person_two_id', 'person_one_id')
            ->wherePivot('person_two_id', $this->id)->pluck('id')->toArray();

        return Person::with('parents')->with('children')
            ->whereIn('id', $marriagesOne)
            ->orWhereIn('id', $marriagesTwo)
            ->get();
    }
}
