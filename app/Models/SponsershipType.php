<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SponsershipType extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'sponsership_types';
    protected $fillable = ['name', 'status'];

    public $timestamps = true;

    public array $translatable = ['name'];

    // relations
    public function children()
    {
        return $this->hasMany(Child::class, 'sponsership_type_id');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeInactive($query)
    {
        return $query->whereStatus(0);
    }

    // accessories

    // public function getStatusAttribute($status)
    // {
    //     return $status == 1 ? 'on' : '';
    // }
}
