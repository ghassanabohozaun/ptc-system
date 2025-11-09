<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ChildGuardian extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'child_guardians';
    protected $fillable = ['guardian_full_name', 'guardian_personal_id', 'guardian_birthday', 'why_not_the_mother_is_guardian', 'guardian_relationship_with_the_child', 'child_id'];
    //public $timestamps = false;

    public array $translatable = ['guardian_full_name'];

    // function
    public function childWhyNotTheMotherIsGuardian()
    {
        if ($this->why_not_the_mother_is_guardian == 'divorced') {
            return __('children.divorced');
        } elseif ($this->why_not_the_mother_is_guardian == 'abandoned') {
            return __('children.abandoned');
        } elseif ($this->why_not_the_mother_is_guardian == 'sick') {
            return __('children.sick');
        } else {
            return __('children.etc');
        }
    }

    public function childGuardianRelationshipWithTheChild()
    {
        if ($this->guardian_relationship_with_the_child == 'mother') {
            return __('children.mother');
        } elseif ($this->guardian_relationship_with_the_child == 'uncle') {
            return __('children.uncle');
        } elseif ($this->guardian_relationship_with_the_child == 'aunt') {
            return __('children.aunt');
        } elseif ($this->guardian_relationship_with_the_child == 'grandfather') {
            return __('children.grandfather');
        } elseif ($this->guardian_relationship_with_the_child == 'grandmother') {
            return __('children.grandmother');
        } elseif ($this->guardian_relationship_with_the_child == 'brother') {
            return __('children.brother');
        } elseif ($this->guardian_relationship_with_the_child == 'sister') {
            return __('children.sister');
        } elseif ($this->guardian_relationship_with_the_child == 'uncle2') {
            return __('children.uncle2');
        } elseif ($this->guardian_relationship_with_the_child == 'aunt2') {
            return __('children.aunt2');
        } else {
            return __('children.etc');
        }
    }

    // relations
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
