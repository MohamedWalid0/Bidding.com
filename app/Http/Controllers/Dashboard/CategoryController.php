<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function index(): view
    {
        return view('dashboard.category.index');
    }



    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        Cache::forget('categories');
        toastr()->success('Data has been saved successfully!');
        return back();
    }


    public function show(Category $category)
    {
        $category->load('subCategories');
        return view('dashboard.subCategory.index' , compact('category') );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        Cache::forget('categories');
        toastr()->success('Data has been saved successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Cache::forget('categories');
        toastr()->error('Data has been deleted successfully!');
        return back();
    }
}
