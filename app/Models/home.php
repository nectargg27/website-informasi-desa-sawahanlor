<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class home extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'img'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('img') && ($model->getOriginal('img') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('img'));
            }
        });
    }
}
