<?php

namespace App\Filters;

use tiagomichaelsousa\LaravelFilters\QueryFilters;

class JobCategory extends QueryFilters
{
    /**
     * Search all.
     *
     * @param  string  $query
     * @return Builder
     */
    public function search($value = '')
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }


    public function category($category)
    {
    return $this->builder->whereHas('name', function ($query) use ($category) {
        $query->where('category_id', $category);
    });
}
}
