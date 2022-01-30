<?php

namespace App\Http\Controllers\Front;

use App\Exceptions\ProductException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Services\ImageResizeService;
use App\Models\Category;
use App\Models\City;
use App\Models\Image;
use App\Models\Like;
use App\Models\Product;
use App\Models\PropertiesSubCategory;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

    public function index($id)
    {
        $product = Product::with('propertiesValues.property', 'user_bids', 'comments')->withoutGlobalScopes()->findOrFail($id);
        // $product = Product::with(
        //     ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($id);
        // $product->likes()->attach(auth()->id() , ['value' => '-1'] );
        if ($product->last_bid)
            $currentBid = $product->last_bid->bid->cost;
        else $currentBid = $product->start_price;
        $data['startBid'] = ((int)str_replace(',', '', $currentBid)) + 1;

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
            $product = Product::create(
                $request->safe([
                    'name', 'sub_category_id',
                    'location', 'description',
                    'start_price', 'user_id',
                    'status', 'deadline'
                ]) + ['user_id' => auth()->id()]);

            $product->propertiesValues()->attach($request->property_value_id);

            $productImages = collect($request->images)->map(function ($image) use ($product) {
                $newImageName = $image->hashName();
                Storage::disk('products')->put('/' . $product->id, $image);
                (new ImageResizeService)->ImageResize('products', $newImageName, 566, 566, $product->id);
                return [
                    'imageable_id' => $product->id,
                    'imageable_type' => 'App\Models\Product',
                    'image_path' => $image->hashName(),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            })->toArray();
            Image::insert($productImages);
            DB::commit();

            return redirect(route('products.index', $product->id));

        } catch (ProductException $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage(), 'Error');
            return back();
        }


    }


    public function generate(Product $product)
    {

        try {
            $qrcode = QrCode::size(200)->generate(config('app.url') . "/products/" . $product->id);
            return view('front.product.viewQrCode', compact('qrcode', 'product'));

        } catch (\Throwable $th) {

            toastr()->error($th->getMessage(), 'Error');
            return back();

        }

    }


}
