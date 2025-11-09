<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasTranslations,HasApiTokens;
    protected $table = 'admins';

    // fillable
    protected $fillable = ['name', 'email', 'password', 'role_id', 'status'];

    public array $translatable = ['name'];

    // hidden
    protected $hidden = ['password', 'remember_token'];

    // Get the attributes that should be cast.
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // relations
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // accessories
    // public function getStatusAttribute($status)
    // {
    //     return $status == 1 ? 'on' : '';
    // }

    // has ability permission
    public function hasAbility($permissions)
    {
        $role = $this->role;
        if (!$role) {
            return false;
        }
        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } elseif (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }
}
