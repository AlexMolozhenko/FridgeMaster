<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['title','all_blocks','remainder_blocks','timezone'];

    public function booking(){
        return $this->belongsToMany(Booking::class, 'locations_bookings');
    }
}
