<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrderings extends Model
{
    use HasFactory;
    public function ordering()
    {
        return $this->belongsTo(Ordering::class);
    }
    public function product() 
    {
        return  $this->belongsTo(Product::class);
    }
}
