<?php

namespace App\DataTables;

use App\Models\Post;

/**
 * Class PostDataTable
 */
class PostDataTable
{
    /**
     * @return Post
     */
    public function get()
    {
        /** @var Post $query */
        $query = Post::query()->select('posts.*');

        return $query;
    }
}
