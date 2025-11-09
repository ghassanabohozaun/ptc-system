<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildFile extends Model
{
    use SoftDeletes;

    protected $table = 'child_files';
    protected $fillable = ['picture_of_the_orphan_child', 'orphan_child_birth_certificate', 'father_death_certificate', 'guardian_personal_id_photo', 'child_id'];
    // public $timestamps = false;

    // relations
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
