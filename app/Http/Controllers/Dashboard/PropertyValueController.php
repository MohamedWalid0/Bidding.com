<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyValueRequest;
use App\Models\Property;
use App\Models\PropertyValue;

class PropertyValueController extends Controller
{

    public function store(StorePropertyValueRequest $request , Property $property , PropertyValue $pvalue )
    {
        $property->values()->create($request->validated());
        toastr()->success('Property Value added successfully');
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
}
