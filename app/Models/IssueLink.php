<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends BaseModel
{
    protected $guarded = ['id'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function scopeUnissued($query)
    {
        return $query->where('issue_id', '0');
    }

    public static function byCid($cid, $issue_id = 0)
    {
        if ($issue_id == 0)  {
            return static::where('category_id', $cid)
                            ->unissued()
                            ->ordered()
                            ->recent()
                            ->get();
        } else {
            return static::where('category_id', $cid)
                            ->where('issue_id', $issue_id)
                            ->ordered()
                            ->recent()
                            ->get();
        }
    }
}
