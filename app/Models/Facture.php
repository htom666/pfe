<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder\Class_;

class Facture extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

     public function products()
     {
       return $this->belongsToMany('App\Models\Product','facture_products')->withPivot('quantity','price','status')->withTimestamps();
    }
    public function services()
    {
      return $this->belongsToMany('App\Models\Service','facture_service')->withPivot('quantity','price')->withTimestamps();
   }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function discount()
    {
      return $this->belongsTo(Discount::class);
    }

    public function delivery()
    {
      return $this->belongsTo(Delivery::class);
    }
    // public function discounts()
    // {
    //   return $this->hasMany('App\Model')
    // }
}
