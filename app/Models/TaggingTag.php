<?php namespace App\Models;

use App\Utilities\Tagging;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Baum\Node;

/**
 * Copyright (C) 2014 Robert Conner
 */
// class Tag extends Eloquent
class TaggingTag extends Node
{
    protected $table;
    public $timestamps = false;
    protected $softDelete = false;
    public $fillable = ['name'];
    protected $taggingUtility;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        $this->table = config('taggable.tags_table_name');

        parent::__construct($attributes);

        if (function_exists('config') && $connection = config('taggable.connection')) {
            $this->connection = $connection;
        }

        $this->taggingUtility = app(Tagging::class);
    }

    public function isUserUpdateSlug($options)
    {
        // If slug in dirty, it mean user manual setting `$tag->slug = 'foo'`
        if (in_array('slug', array_keys($this->getDirty()))) {
            return true;
        }

        // If slug in $options array, it mean user use `$tag->save(['slug' => 'foo'])` to update slug
        if (in_array('slug', array_keys($options))) {
            return true;
        }
        return false;
    }

    /**
     * (non-PHPdoc)
     * @see \Illuminate\Database\Eloquent\Model::save()
     */
    public function save(array $options = array())
    {
        $validator = app('validator')->make(
            array('name' => $this->name),
            array('name' => 'required|min:1')
        );

        if ($validator->passes()) {
            if (!$this->isUserUpdateSlug($options)) {
                // If user has been set slug，it do not need set slug by automatically
                $this->slug = $this->taggingUtility->normalizeAndUniqueSlug($this->name);
            }

            // $this->name = $this->taggingUtility->normalizeTagName($this->name);
            return parent::save($options);
        } else {
            throw new \Exception('Tag Name is required');
        }
    }

    /**
     * Get suggested tags
     */
    public function scopeSuggested($query)
    {
        return $query->where('suggest', true);
    }

    /**
     * Set the name of the tag : $tag->name = 'myname';
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->taggingUtility->normalizeTagName($value);
    }

    /**
     * Look at the tags table and delete any tags that are no londer in use by any taggable database rows.
     * Does not delete tags where 'suggest'value is true
     *
     * @return int
     */
    public static function deleteUnused()
    {
        return (new static)->newQuery()
                ->where('count', '=', 0)
                ->where('suggest', false)
                ->delete();
    }


    // Get one Tag item by tag name
    public function scopeByTagName($query, $tag_name)
    {
        // mormalize string
        $tag_name = app(Tagging::class)->normalizeTagName(trim($tag_name));
        return $query->where('name', $tag_name);
    }

    public function scopeByTagSlug($query, $tag_slug)
    {
        return $query->where('slug', $tag_slug);
    }

    // Get Tag collection by tag name array
    public function scopeByTagNames($query, $tag_names)
    {
        $normalize_tag_names = [];
        foreach ($tag_names as $tag_name) {
            // mormalize string
            $normalize_tag_names[] = app(Tagging::class)->normalizeTagName(trim($tag_name));
        }
        return $query->whereIn('name', $normalize_tag_names);
    }

    // Get Tag collection by tag id array
    public function scopeByTagIds($query, $tag_ids)
    {
        return $query->whereIn('id', $tag_ids);
    }

    // Get tag ids tag name array
    public function scopeIdsByNames($query, $tagNames)
    {
        return $query->whereIn('name', $tagNames)->lists('id');
    }
}
