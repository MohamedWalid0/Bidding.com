<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyValue;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyValues\StorePropertyValueRequest;
use App\Http\Requests\PropertyValues\UpdatePropertyValueRequest;


class PropertyValueController extends Controller
{

    public function store(StorePropertyValueRequest $request , Property $property , PropertyValue $pvalue )
    {
        $property->values()->create($request->validated());
        toastr()->success('Property Value added successfully');
        return back();
    }


    public function update(UpdatePropertyValueRequest $request, Property $property , PropertyValue $property_value )
    {
        $property_value->update($request->validated());
        toastr()->success('Property value updated successfully');
        return back();
    }

    public function destroy(Property $property , PropertyValue $property_value)
    {
        try {

            if ($property_value->products()->exists()){
                toastr()->error("Can't delete this Value because some products related to it!");
                return back();
            }

            $property_value->delete();
            toastr()->success('Value deleted successfully');
            return back();

        } catch (\Throwable $th) {
            toastr()->error('something error');
            return back();
        }
    }
}
