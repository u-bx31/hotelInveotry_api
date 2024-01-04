<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasUuids,HasFactory;

    protected $fillable = [
        'image',
        'price',
        'rating',
        'availability',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
