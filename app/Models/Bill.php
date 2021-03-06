<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }
}
?>
	
