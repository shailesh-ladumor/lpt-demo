<?php

namespace App\Queries;

use App\Models\Category;

class CategoryDatatable
{
    public function get()
    {
        return Category::query();
    }
}
