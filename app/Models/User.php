<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{   
    protected $guarded=[];
    use HasFactory;
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function ownerProfile()
    {
        return $this->hasOne(Owner_Profile::class);
    }
    public function chalets()
    {
        return $this->hasMany(Chalet::class, 'owner_id');
    }
}
