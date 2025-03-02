<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'chalet_id',
        'user_id',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chalet()
    {
        return $this->belongsTo(Chalet::class);
    }
}
