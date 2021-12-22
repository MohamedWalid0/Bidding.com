<?php

namespace App\View\Composers;

use App\Models\Category;
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
        $view->with('categories', Category::get());
    }
}
