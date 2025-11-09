<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SponsershipStatus extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'sponsership_statuses';
    protected $fillable = ['name', 'status'];

    public $timestamps = true;

    public array $translatable = ['name'];

    // scopes
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeInactive($query)
    {
        return $query->whereStatus(0);
    }


    // relation
    public function children()
    {
        return $this->hasMany(child::class, 'sponsership_status_id');
    }

    // accessories

    // public function getStatusAttribute($status)
    // {
    //     return $status == 1 ? 'on' : '';
    // }
}
