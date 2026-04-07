<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use App\Traits\Dashboard\Filterable;
class Role extends Model
{
    use SoftDeletes, HasTranslations , HasFactory, Filterable;

    protected $table = 'roles';
    protected $fillable = ['role', 'permissions'];
    public array $translatable = ['role'];

    // accessories
    public function getPermissionsAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }

    // relations
    public function admins(){
        return $this->hasMany(Admin::class , 'role_id');
    }
}
