<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use SoftDeletes, HasTranslations, \App\Traits\Dashboard\Filterable;
    protected $table = 'cities';
    protected $fillable = ['name', 'governorate_id'];
    public $timestamps = false;
    public array $translatable = ['name'];

    // relation
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'city_id');
    }
}
