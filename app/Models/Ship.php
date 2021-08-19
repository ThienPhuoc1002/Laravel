<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

 	protected $table = 'phiship';

    public function city()
    {
        return $this->belongsTo('App\Models\City','matp');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Province','maqh');
    }
    public function wards()
    {
        return $this->belongsTo('App\Models\Wards','xaid');
    }
}