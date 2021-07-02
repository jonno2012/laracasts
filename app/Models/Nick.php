<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{
    use HasFactory;

    public function dibbles()
    {
        return $this->hasMany(Dibble::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
