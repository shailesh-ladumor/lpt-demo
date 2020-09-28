<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Post
 * @package App\Models
 * @version April 12, 2020, 5:21 am UTC
 *
 * @property string name
 * @property string image_url
 */
class Post extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'image_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
