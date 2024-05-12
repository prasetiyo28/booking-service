<?php

namespace App\Models\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooking extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'experience',
        'country',
        'email',
        'phone_number',
        'surf_type_id',
        'booking_date',
        'file_verification'
    ];
    protected $keyType = 'string';


    public static function booted() {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    use HasFactory;
}
