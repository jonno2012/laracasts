<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dibble extends Model
{
    use HasFactory;

    public function nick()
    {
        return $this->belongsTo(Nick::class);
    }

    public function scopeNick($query, $filters)
    {
        $query->when($filters['nick'] ?? false, fn($query, $nickId) =>
            $query->whereHas('nick')->where('id', '=', $nickId)->with('nick')
        );
    }

    /**
     * Accessor
     *
     * @param $callSign
     * @return string
     */
    public function getCallSignAttribute($callSign)
    {
        return $callSign . ' is a dibble cunt';
    }
}
