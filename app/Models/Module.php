<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['name','institute_name','subject','teacher_id','start_date','end_date','pdf'];
    public function applied_modules(){
        return $this->hasMany(AppliedModule::class);
    }
}
