<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordering extends Model
{
    use HasFactory;
    public function detailordering()
    {
        return $this->hasMany(DetailOrderings::class);
    }
   
}
