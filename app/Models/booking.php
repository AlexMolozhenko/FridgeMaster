<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','location_id','blocks','days','dateTimeFrom','dateTimeBy','temperature','storageCost','accessСode'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

}
