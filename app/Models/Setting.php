<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'logo', 'favicon', 'phone', 'address', 'facebook', 'twitter', 'instagram', 'tiktok'];
    protected $table = 'settings';
}
