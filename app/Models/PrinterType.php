<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrinterType extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // public function subCategories(){
    //     return $this->hasMany(SubCategory::class);
    // }

    // public function products(){
    //     return $this->hasMany(Product::class)->where('status',1)->orderBy("priority", "DESC");
    // }

    // public function activeSubCategories(){
    //     return $this->hasMany(SubCategory::class)->where('status',1)->select(['id','name','slug','category_id']);
    // }
    
    // public function pcBuilders()
    // {
    //     return $this->hasMany(PcBuilder::class, 'category_id');
    // }
}
