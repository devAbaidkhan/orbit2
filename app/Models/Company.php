<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */

    public function document()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
