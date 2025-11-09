<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;
class Sponser extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasTranslations,HasApiTokens;
    protected $table = 'sponsers';
    protected $fillable = ['name', 'password', 'email', 'status'];
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
}
