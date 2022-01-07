<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Properties\StorePropertyRequest;
use App\Http\Requests\Properties\UpdatePropertyRequest;


class PropertyController extends Controller
{
    public function index(): view
    {
        $this->authorize('viewAny' , Property::class);
        $properties = Property::all();
        return view('dashboard.property.index' , compact('properties'));
    }
    public function store(StorePropertyRequest $request)
    {
        Property::create($request->validated());
        toastr()->success('Property has been added successfully');
        return back();
    }


    public function show(Property $property)
    {
        $this->authorize('viewAny' , Property::class);
        $property->load('values');
        return view('dashboard.property.show' , compact('property') );
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->validated());
        toastr()->success('Property been saved successfully!');
        return back();
    }

    public function destroy(Property $property)
    {

        try {

            if ( $property->subCategories()->exists() ){
                toastr()->error('can not delete this property because some sub categories related to');
                return back();
            }

            $property->delete();
            toastr()->success('Property has been deleted successfully');
            return back();

        } catch (\Throwable $th) {

            toastr()->error('something error');
            return back();

        }
    }
}
