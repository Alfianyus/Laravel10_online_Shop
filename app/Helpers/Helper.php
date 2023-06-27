<?php

namespace App\Helpers;

use App\Models\Category;

class Helper
{
    function getCategories()
    {
        return Category::orderBy('name', 'ASC')
            ->with('sub_category')
            ->orderByDesc('id')
            ->where('status', 1)
            ->where('showHome', 'Yes')
            ->get();
    }
}
