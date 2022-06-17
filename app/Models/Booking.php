<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','blocks','days','dateTimeFrom','dateTimeBy','temperature','storageCost','accessСode',];

//    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function location(){
        return $this->belongsTomany(Location::class);
    }

}
