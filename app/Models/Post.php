<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Abstracts blog posts/news
 */
class Post extends Model
{
    // Set the model to use soft deletes
    use SoftDeletes;

    // Set the table to fetch records from
    protected $table = 'news';

    protected $guarded = [];

    // Columns to be mutated to dates
    protected $dates = ['deleted_at'];

    /**
     * Get the user that created the post
     */
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
