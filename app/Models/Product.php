<?php

namespace App\Models;

use App\Models\Facture;
use App\Models\Estimate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Facture::class);
    }
    public function estimate_products()
    {
        return $this->belongsToMany(Estimate::class);
    }

}
