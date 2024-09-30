<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
   
     public function offer() {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
