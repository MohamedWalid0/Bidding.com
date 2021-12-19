<?php

namespace App\Http\Controllers\Front;

use App\Exceptions\ProductException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\PropertiesSubCategory;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    protected $categories;
    protected $subCategories;
    protected $cities;
    protected $subCategoriesPropertiesIds;
    protected $subCategoriesProperties;
    protected $propertyValues;

    public function __construct()
    {
        $this->categories = Category::orderBy('name')->get();
        $this->subCategories = SubCategory::orderBy('name')->get();
        $this->cities = City::orderBy('name')->get();
    }

    public function index ($id) {
        $product = Product::findOrFail($id);
            // $product = Product::with(
            //     ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($id);
        // dd($product->comments->random()->id);
        $currentBid = $product->last_bid->bid->cost;
        $data['startBid'] = ((int) str_replace(',', '', $currentBid) )+1;

        $data['currentBid'] = $currentBid;
        $data['product'] = $product;
        return view('front.product.viewProduct')->with($data);
    }

    public function create()
    {

        $data = [
            'categories' => $this->categories,
            'subCategories' => $this->subCategories,
            'cities' => $this->cities
        ];

        return view('front.product.create', with($data));

    }

    public function getSubCategories($categoryId)
    {

        $this->subCategories = SubCategory::where('category_id', $categoryId)->orderBy('name')->get();
        return response()->json($this->subCategories);

    }


    public function getSubCategoryPropertiesIds($subCategoryId)
    {

        $this->subCategoriesPropertiesIds = PropertiesSubCategory::where('sub_category_id', $subCategoryId)->pluck('property_id')->toArray();
        $propertiesNames = $this->getPropertiesNames($this->subCategoriesPropertiesIds);

        $arr = [];

        foreach ($propertiesNames as $propertyName => $propertyId) {

            $arr[$propertyId] = $this->getPropertyValues($propertyId);

        }
        // return response()->json( $propertiesNames  );

        return response()->json(['propertiesNames' => $propertiesNames, 'propertyValues' => $arr]);

    }

    public function getPropertiesNames($propertiesIds)
    {

        return $this->subCategoriesProperties = Property::whereIn('id', $propertiesIds)->pluck('id', 'name')->toArray();

    }

    public function getPropertyValues($propertyId)
    {

        return $this->propertyValues = PropertyValue::where('property_id', $propertyId)->pluck('id', 'value')->toArray();

    }


    public function store(ProductRequest $request)
    {



        try {

            DB::beginTransaction();

            $product = Product::create([
                'user_id' => Auth::user()->id,
                'name' => $request->productName,
                'sub_category_id' => $request->subCategoryId,
                'location' => $request->cityId,
                'description' => $request->description,
                'start_price' => $request->startPrice,
                'deadline' => $request->deadline,
                'status' => "active",
            ]);

            foreach ($request->propertyValueId as $propertyValueId) {
                ProductProperty::create([
                    'product_id' => $product->id,
                    'property_value_id' => $propertyValueId,
                ]);
            }


            foreach ($request->images as $image) {
                $type = $image->getClientOriginalExtension();
                $newFileName = uniqid('', true) . '.' . $type;
                Image::create([
                    'imageable_id' => $product->id,
                    'imageable_type' => 'App\Models\Product',
                    'image_path' => $newFileName
                ]);
                Storage::disk('products')->put("/img/" , $image);
            }
            DB::commit();

            return view('front.product.viewProduct');

        } catch (ProductException $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage(), 'Error');
            return back();
        }


    }
}
