<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
