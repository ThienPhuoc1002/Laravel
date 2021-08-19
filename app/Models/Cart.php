<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
	public $totalPrice = 0;
    public $totalQuanty = 0;

	public function __construct($cart){
		if($cart){
			$this->products = $cart->products;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuanty = $cart->totalQuanty;
		}
	}

    public function AddCart($product, $id){
		$giohang = ['sluong'=> 0, 'gia' => $product->promotion_price, 'ttin' => $product];
		if($this->products){
			if(array_key_exists($id, $this->products)){
				$giohang = $this->products[$id];
			}
		}
		$giohang['sluong']++;
		$giohang['gia'] = $product->promotion_price * $giohang['sluong'];
		$this->products[$id] = $giohang;
		$this->totalQuanty++;
		$this->totalPrice += $product->promotion_price;
	}

	public function AddCart1($product, $id, $quanty){
		$giohang = ['sluong'=> 0, 'gia' => $product->promotion_price, 'ttin' => $product];
		if($this->products){
			if(array_key_exists($id, $this->products)){
				$giohang = $this->products[$id];
			}
		}
		$giohang['sluong']+=$quanty;
		$giohang['gia'] = $product->promotion_price * $giohang['sluong'];
		$this->products[$id] = $giohang;
		$this->totalQuanty+=$quanty;
		$this->totalPrice += $quanty * $product->promotion_price;
	}

	public function DeleteItemCart($id){ 
		$this->totalQuanty -=$this->products[$id]['sluong'];
		$this->totalPrice -= $this->products[$id]['gia'];
		unset($this->products[$id]);
	}

	public function UpdateItemCart($id, $quanty){ 
		$this->totalQuanty -= $this->products[$id]['sluong'];
		$this->totalPrice -= $this->products[$id]['gia'];

		$this->products[$id]['sluong'] = $quanty;
		$this->products[$id]['gia'] = $quanty * $this->products[$id]['ttin']->promotion_price;

		$this->totalQuanty += $this->products[$id]['sluong'];
		$this->totalPrice += $this->products[$id]['gia'];
	}
}
?>
	
