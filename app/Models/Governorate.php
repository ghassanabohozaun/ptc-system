<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use App\Traits\Dashboard\Filterable;
class Governorate extends Model
{
    use SoftDeletes, HasTranslations, Filterable;

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
