<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'type',
        'price',
    ];

    protected $keyType = 'string';

    public static function booted() {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    use HasFactory;
}
