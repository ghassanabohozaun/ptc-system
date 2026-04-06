<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasTranslations, HasApiTokens;
    protected $table = 'admins';

    // fillable
    protected $fillable = ['name', 'email', 'password', 'role_id', 'status', 'photo'];

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

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'admin_id');
    }


    public function getCreatedAtAttribute($value)
    {
        if (request()->wantsJson()) {
            return $value;
        }
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }

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

    // Message Relationships
    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver');
    }

    public function unreadMessagesCount()
    {
        return $this->receivedMessages()
                    ->where('is_read', false)
                    ->where('receiver_deleted', false)
                    ->count();
    }

    public function getInitialsAttribute()
    {
        $name = $this->getTranslation('name', app()->getLocale()) ?: $this->name;
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return mb_strtoupper(mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1));
        }
        return mb_strtoupper(mb_substr($name, 0, 1));
    }

    public function adminPhoto()
    {
        if ($this->photo && file_exists(public_path('uploads/admins/' . $this->photo))) {
            return asset('uploads/admins/' . $this->photo);
        }
        return null; // Return null to indicate no photo
    }

    public function getAvatarColor()
    {
        $colors = ['#5A8DEE', '#FDAC41', '#FF5B5C', '#39DA8A', '#00CFDD', '#7117EA', '#272727'];
        $charIndex = abs(crc32($this->name)) % count($colors);
        return $colors[$charIndex];
    }
}
