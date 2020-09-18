<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function Job(){
        return $this->hasMany(Job::class); // or  ('App\Models\Job') both are same
    }
    use HasFactory;
}
