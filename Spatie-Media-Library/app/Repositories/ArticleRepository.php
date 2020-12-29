<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Http\Request;

/**
 * Class ArticleRepository
 * @package App\Repositories
 * @version December 23, 2020, 3:10 am UTC
*/

class ArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
        return Article::class;
    }

    public function createArticle(Request $request){
        $file = $request->file('image_url');
        $input = $request->all();
        $article = $this->create($input);

        $article->addMedia($file)->toMediaCollection();
    }
}
