<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    use HasFactory;
}
