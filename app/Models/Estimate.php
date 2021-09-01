<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estimate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

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
