<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasUuids,HasFactory;

    protected $fillable = [
        'type',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
