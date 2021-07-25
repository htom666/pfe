<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function services()
    {
        return $this->belongsToMany(Facture::class);
    }
    public function estimate_services()
    {
        return $this->belongsToMany(Estimate::class);
    }
}
