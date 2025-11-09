<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ChildFather extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'child_fathers';
    protected $fillable = ['father_full_name', 'father_personal_id', 'father_date_of_death', 'father_respon_of_death', 'child_id'];
    //public $timestamps = false;

    public array $translatable = ['father_full_name'];

    // function
    public function childFatherResponOfDeath()
    {
        if ($this->father_respon_of_death == 'martyr') {
            return __('children.martyr');
        } else {
            return __('children.illness');
        }
    }
    // relations
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
