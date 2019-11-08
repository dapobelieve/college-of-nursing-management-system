<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Abstracts blog posts/news
 */
class Posts extends Model
{
    // Set the model to use soft deletes
    use SoftDeletes;

    // Set the table to fetch records from
    protected $table = 'news';

    // Columns to be mutated to dates
    protected $dates = ['deleted_at'];

    /**
     * Get the user that created the post
     */
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }
}
