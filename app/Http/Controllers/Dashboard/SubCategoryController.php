<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use App\Models\Property;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AssignPropertyRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{


    public function show (Category $category,SubCategory $subCategory) {
        $properties = Property::all();
        return view('dashboard.subCategory.show' , compact('subCategory' , 'properties' , 'category') );
    }
    // assign property to subcategory
    public function assign (AssignPropertyRequest $request , Category $category ,  SubCategory $subCategory){

        // sync to db
        $subCategory->properties()->syncWithoutDetaching([
            $request->validated()
        ]);

        toastr()->success('Property added successfully');
        return back();
    }

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

        try {

            if ($subCategory->products()->exists()){
                toastr()->error('can not delete this sub category because some products related to !');
                return back();
            }

            $subCategory->delete();
            toastr()->success('sub category deleted successfully');
            return back();

        } catch (\Throwable $th) {

            toastr()->error('something error');
            return back();

        }
    }

    public function unassign(Category $category, SubCategory $subCategory ,  Property $property): RedirectResponse
    {
        try {
            $subCategory->properties()->detach($property->id);
            toastr()->success("Property deleted from $subCategory->name  successfully");
            return back();
        } catch (\Throwable $th) {
            toastr()->error('something error');
            return back();
        }
    }



}
