<?php

namespace App\Models;

class Revision extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
