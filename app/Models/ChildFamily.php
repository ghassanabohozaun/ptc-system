<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildFamily extends Model
{
    use SoftDeletes;
    protected $table = 'child_families';
    protected $fillable = ['number_of_people_including_mother', 'male_number', 'female_number', 'child_id'];
    // public $timestamps = false;

    // relation
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
