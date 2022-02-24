<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $table = 'sites';
    protected $fillable = ['company_id'];


    public function document()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
