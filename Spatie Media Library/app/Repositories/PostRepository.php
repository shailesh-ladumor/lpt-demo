<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version April 12, 2020, 5:21 am UTC
*/

class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image_url'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Post::class;
    }

    public function createPost(Request $request){
        $file = $request->file('image_url');
        $input = $request->all();
        $post = $this->create($input);

        $post->addMedia($file)->toMediaCollection();
    }
}
