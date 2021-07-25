<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
      return $this->belongsToMany('App\Models\Product','estimate_product')->withPivot('quantity','price')->withTimestamps();
   }
   public function services()
   {
     return $this->belongsToMany('App\Models\Service','estimate_service')->withPivot('quantity','price')->withTimestamps();
  }
   public function client()
   {
       return $this->belongsTo(Client::class);
   }
}
