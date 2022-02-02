<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table = 'contact_people';
    use HasFactory;

    public function contactable()
    {
        return $this->morphTo();
    }
}
