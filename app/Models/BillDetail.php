<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_details';

    public function product()
    {
        return $this->belongsTo('App\Models\Product','id_product');
    }

}
?>
	
