<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function index(): view
    {
        $this->authorize('view-any' , Category::class);
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
        $this->authorize('viewAny' , Category::class);
        $category->load('subCategories');
        return view('dashboard.subCategory.index' , compact('category') );
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->safe(['name']));
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
        $this->authorize('delete' , $category);
        try {

            if ( $category->subCategories()->exists() ){
                toastr()->error('can not delete this category because some sub categories related to !');
                return back();
            }

            $category->delete();
            Cache::forget('categories');
            toastr()->success('Data has been deleted successfully!');
            return back();

        } catch (\Throwable $th) {

            toastr()->error('something error');
            return back();

        }





    }
}
