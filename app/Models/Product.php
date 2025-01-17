<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    public function getPriceAttribute($value)
    {
        $discount = $value * ($this->discount / 100); // korting in euro's
        $final_price = $value - $discount; // korting van prijs afhalen
        return number_format($final_price, 2); // Zorg altijd voor 2 decimalen
    }
}
