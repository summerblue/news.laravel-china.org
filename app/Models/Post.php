<?php

namespace App\Models;

class Post extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setBodyOriginalAttribute($value)
    {
        $this->attributes['body'] = markdown($value);
        $this->attributes['body_original'] = $value;
    }

    public function setCoverAttribute($file_name)
    {
        if (starts_with($file_name, 'http')) {
            $parser_url = explode('/', $file_name);
            $file_name = end($parser_url);
        }

        $this->attributes['cover'] = 'uploads/covers/'.$file_name;
    }

    public function getCoverAttribute($file_name)
    {
        if (starts_with($file_name, 'http')) {
            return $file_name;
        }

        return cdn($file_name);
    }
}
