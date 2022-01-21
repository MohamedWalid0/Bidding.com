<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CategoryAndSubCategoryComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', Cache::remember('categories', 60 * 60 * 60, function () {
            return Category::with('subCategories' , 'images')->get();
        })
        );
    }
}
