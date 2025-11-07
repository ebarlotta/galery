<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImage extends Model
{
use HasFactory;

    protected $fillable = [
        'filename',
        'original_name',
        'file_path',
        'is_active',
        'uploaded_by'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
