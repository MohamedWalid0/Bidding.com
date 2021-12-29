<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Http\RedirectResponse;

class SubCategoryController extends Controller
{




    public function store(StoreSubCategoryRequest $request , Category $category ): RedirectResponse
    {
        $category->subCategories()->create($request->validated());
        toastr()->success('sub category added successfully');
        return back();
    }


    public function update(UpdateSubCategoryRequest $request,Category $category,SubCategory $subCategory)
    {
        $subCategory->update($request->validated());
        toastr()->success('sub category updated successfully');
        return back();
    }

    public function destroy(Category $category, SubCategory $subCategory): RedirectResponse
    {
        $subCategory->delete();
        toastr()->error('sub category deleted successfully');
        return back();
    }
}
