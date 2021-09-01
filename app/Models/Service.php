<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    public function services()
    {
        return $this->belongsToMany(Facture::class);
    }
    public function estimate_services()
    {
        return $this->belongsToMany(Estimate::class);
    }
}
