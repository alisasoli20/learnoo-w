<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedModule extends Model
{
    use HasFactory;
    public function module(){
        return $this->belongsTo(Module::class);
    }
    public function student(){
        return $this->belongsTo(User::class);
    }
}
