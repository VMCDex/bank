<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'short_description',
        'full_description',
        'image_path',
        'is_active'
    ];
}

