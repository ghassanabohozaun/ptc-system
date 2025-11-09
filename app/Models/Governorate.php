<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'governorates';
    protected $fillable = ['name', 'status'];
    public $timestamps = false;
    public array $translatable = ['name'];

    // relation
    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }

    // accsessores
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}
