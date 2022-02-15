<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->hasOne(JobType::class,'id','job_type');
    }

    public function site()
    {
        return $this->hasOne(Site::class,'id','site_id');
    }
}
