<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    protected $table = 'settings';
    protected $fillable = ['site_name', 'address', 'description', 'keywords', 'phone','mobile', 'whatsapp', 'email', 'email_support', 'facebook', 'twitter', 'instegram', 'youtube', 'logo', 'favicon', 'promation_video_url'];
    public $timestamps = false;
    public array $translatable = ['site_name', 'address', 'description', 'keywords'];
}
