<?php

namespace App\MediaLibrary;

use App\Models\Article;
use App\Models\Post;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

/**
 * Class CustomPathGenerator
 * @package App\MediaLibrary
 */
class CustomPathGenerator implements PathGenerator
{
    /**
     * @param Media $media
     *
     * @return string
     */
    public function getPath(Media $media): string
    {
        switch ($media->model_type) {
            case Post::class:
                return Post::PATH.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;
                break;
            case Article::class:
                return Article::PATH.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;
                break;
            default:
                return $media->id.DIRECTORY_SEPARATOR;
        }
    }

    /**
     * @param Media $media
     *
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'thumbnails/';
    }

    /**
     * @param Media $media
     *
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'rs-images/';
    }
}
