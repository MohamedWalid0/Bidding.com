@extends('layouts.layout')

@section('title')
    Add Product
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/product/add-product.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{asset('css/product/image-uploader.min.css')}}">
@endsection






@section('content')
    <div class="container">

        <h3>
            <i class="add-product--head">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                Add Product
            </i>

        </h3>
        @if($errors)
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif

        <div class="add-product--underline"></div>
        <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="add-product--label" for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" aria-describedby="emailHelp" name="productName">

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="add-product--label" for="inputState">Category</label>
                                <select id="category" class="form-control" name="categoryId">
                                <option selected disabled>Choose...</option>

                                    @foreach ($categories as $category )
                                        <option  value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="add-product--label" for="inputState">City</label>
                                <select id="city" class="form-control" name="cityId">

                                    <option selected disabled>Choose...</option>

                                    @foreach ($cities as $city )
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="add-product--label" for="inputState">Sub Category</label>
                            <select id="subCategory" class="form-control" name="subCategoryId">

                                <option selected disabled>Choose...</option>

                                @foreach ($subCategories as $subCategory )
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="add-product--label"  for="exampleInputPassword1">Description</label>
                            <textarea  cols="20" rows="8" class="form-control" name="description" id="exampleInputPassword1">
                            </textarea>
                        </div>


                    </div>
                <div class="col-md-6">
                    <div class="form-group">

                        <label class="add-product--label"  for="exampleInputPassword1">Product Images</label>
                        <div class="input-images"  ></div>
                    </div>

                    <div class="form-row properties">


                    </div>

                    <div class="form-group">
                        <label class="add-product--label" for="productName">Starter Price</label>
                        <input type="number" class="form-control" id="productName" aria-describedby="emailHelp" name="startPrice">
                    </div>
                    <div class="form-group">
                        <label class="add-product--label" for="productName">Deadline</label>
                        <input type="date" class="form-control" id="productName" aria-describedby="emailHelp" name="deadline">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary add-product-btn--customize">Add Product</button>
                    </div>

                </div>
        </form>



    </div>

@endsection









@section('scripts')

<script type=text/javascript >

    $('#category').change(function(){
        var categoryId = $(this).val();
        if(categoryId){
            $.ajax({
            type:"GET",
            url: "getSubCategories/" + categoryId,

            success:function(res){
                if(res){
                    $("#subCategory").empty();
                    $("#subCategory").append('<option>Select subCategory</option>');
                    $.each(res,function(_,value){
                        $("#subCategory").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });

                }else{
                    $("#subCategory").empty();
                }
            }
            });
        }else{
            $("#category").empty();
            $("#subCategory").empty();
        }
    });



    $('#subCategory').on('change',function(){
        var subCategoryId = $(this).val();
        if(subCategoryId){
            $.ajax({
                type:"GET",
                url: "getSubCategoryPropertiesIds/" + subCategoryId,

                success:function(res){
                    if(res){

                        $(".properties").empty();
                        $.each(res.propertiesNames,function(key,value){

                            $(".properties").append(
                                `<div class="form-group col-md-3">
                                    <label class="add-product--label" for="inputState">${key}</label>

                                    <select id="inputState" name="propertyValueId[]" class="form-control" property-id-dropdown=${value}>

                                    </select>
                                </div>`
                            );

                        });


                        $("select[property-id-dropdown]").empty();
                        $.each(res.propertyValues,function(key,value){


                            for (i = 0; i < Object.keys(value).length; i++){

                                $("[property-id-dropdown="+key+"]").append(`

                                    <option value= "${Object.values(value)[i]}" > ${Object.keys(value)[i]} </option>

                                `);

                            }



                        });





                    }else{
                        $(".properties").empty();
                    }
                }
            });
        }else{
            // $("#subCategory").empty();
        }
    });

</script>



<script type="text/javascript" src="{{asset('js/product/image-uploader.min.js')}}"></script>
<script src="{{asset('js/product/app.js')}}"></script>







@endsection

</body>
</html>
