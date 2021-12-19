
const clone = $('.causes_div').contents().clone();


// filter by sub category name
$(document).on('click', '.subCategory_checkbox', function () {

    let ids = [];
    let counter = 0;

    $('.subCategory_checkbox').each(function () {

        let l = $(this).attr('id').length ;
        // console.log(l.length)
        if ($(this).is(":checked")) {

            ids.push($(this).attr('id').slice(4,l));
            counter++;
        }

    });
    $('._t-item').text('(' + ids.length + ' items)');


    if (counter == 0) {

        $('.causes_div').empty();
        $('.causes_div').append(clone);

    }
    else{
        $('.causes_div').empty();

        fetchCauseAgainstSubCategory(ids);
    }

});

function fetchCauseAgainstSubCategory(ids) {

    $('.causes_div').empty();

    $.ajax({
        type: 'GET',
        data: {"ids":ids},
        url: 'filter/SubCategory/' + ids ,
        headers: {
            'contentType': 'charset=UTF-8'
        },


        success: function (response) {

            if (response.length == 0) {
                $('.causes_div').append('No Data Found');
            } else {
                response.forEach(element => {
                    $('.causes_div').append(`




                    <div class="col-md-4 col-sm-12 p-2">

                        <div class="productsWrapper mt-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    <img src=" img/home/mobile.jpg"
                                        onmouseover="this.src=' img/home/electronic.jpg' "
                                        onmouseout="this.src=' img/home/mobile.jpg ' "

                                        class="w-100" alt="">
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-gavel"></i>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="${element.id}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                        href="#" data-product-id="${element.id}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-search"></i>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5> ${element.name}</h5>
                                <p class="text-muted">
                                    Start Price :
                                    <span class="text-primary">
                                        ${element.start_price} $
                                    </span>
                                </p>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary">
                                        $
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>









                    `);
                });
            }
        }
    });
}
// end filter by sub category name




// filter by category name
$(document).on('click', '.category_checkbox', function () {

    let ids = [];

    let counter = 0;

    $('.category_checkbox').each(function () {

        if ($(this).is(":checked")) {

            ids.push($(this).attr('id'));
            counter++;
        }

    });

    $('._t-item').text('(' + ids.length + ' items)');


    if (counter == 0) {

        $('.causes_div').empty();
        $('.causes_div').append(clone);

    }
    else{
        $('.causes_div').empty();

        fetchCauseAgainstCategory(ids);
    }

});

function fetchCauseAgainstCategory(ids) {

    $('.causes_div').empty();

    $.ajax({
        type: 'GET',
        data: {"ids":ids},
        url: 'filter/category/' + ids ,
        headers: {
            'contentType': 'charset=UTF-8'
        },


        success: function (response) {

            if (response.length == 0) {
                $('.causes_div').append('No Data Found');
            } else {
                response.forEach(element => {
                    $('.causes_div').append(`




                    <div class="col-md-4 col-sm-12 p-2">

                        <div class="productsWrapper mt-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    <img src=" img/home/mobile.jpg"
                                        onmouseover="this.src=' img/home/electronic.jpg' "
                                        onmouseout="this.src=' img/home/mobile.jpg ' "

                                        class="w-100" alt="">
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-gavel"></i>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="${element.id}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                        href="#" data-product-id="${element.id}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-search"></i>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5> ${element.name}</h5>
                                <p class="text-muted">
                                    Start Price :
                                    <span class="text-primary">
                                         ${element.start_price} $
                                    </span>
                                </p>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary">
                                        $
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>









                    `);
                });
            }
        }
    });
}
// end filter by category name




//  filter by price
$( function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 10000,
        values: [ 0, 10000 ],
        slide: function( event, ui ) {
            $( "#amount_start" ).val(  ui.values[ 0 ]  );
            $( "#amount_end" ).val(  ui.values[ 1 ]  );
        }
    });

    $(document).on('mouseup', '#slider-range', function () {

        let startPrice = $( "#amount_start" ).val() ;
        let endPrice = $( "#amount_end" ).val() ;

        if (startPrice==0 && endPrice ==10000){
            $('.causes_div').empty();
            $('.causes_div').append(clone);
        }

        else{
            fetchProductsByPrice();
        }

    });

} );

function fetchProductsByPrice() {

    let startPrice = $( "#amount_start" ).val() ;
    let endPrice = $( "#amount_end" ).val() ;




    $.ajax({
        type: 'GET',
        url: 'filter/' + startPrice + '/' + endPrice ,
        dataType: "json",
        headers: {
            'contentType': 'charset=UTF-8'
        },
        success: function (response) {

            if (response.data.length == 0) {

                $('.causes_div').empty();
                $('.causes_div').append('No Data Found');

            }
            else {
                $('.causes_div').empty();

                response.data.forEach(element => {
                    $('.causes_div').append(`


                        <div class="col-md-4 col-sm-12 p-2">

                        <div class="productsWrapper mt-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    <img src=" img/home/mobile.jpg"
                                        onmouseover="this.src=' img/home/electronic.jpg' "
                                        onmouseout="this.src=' img/home/mobile.jpg ' "

                                        class="w-100" alt="">
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-gavel"></i>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="${element.id}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                        href="#" data-product-id="${element.id}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-search"></i>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5> ${element.name}</h5>
                                <p class="text-muted">
                                    Start Price :
                                    <span class="text-primary">
                                        ${element.start_price} $
                                    </span>
                                </p>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary">
                                        $
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>








                    `)

                });
            }


        }

    });





}
// end filter by price



// search by keyword

$(document).on('keyup', '#searchInput', function () {

    let keyword = this.value;
    keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim()
    fetchProductsBySearch(keyword);

});

function fetchProductsBySearch(keyword) {

    $.ajax({
        type: 'GET',
        url: 'search?q=' + keyword ,
        dataType: "json",
        headers: {
            'contentType': 'charset=UTF-8'
        },
        success: function (response) {

            if (response.length == 0) {

                $('.causes_div').empty();
                $('.causes_div').append('No Data Found');

            }
            else {
                $('.causes_div').empty();

                response.forEach(element => {
                    $('.causes_div').append(`


                        <div class="col-md-4 col-sm-12 p-2">

                        <div class="productsWrapper mt-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    <img src=" img/home/mobile.jpg"
                                        onmouseover="this.src=' img/home/electronic.jpg' "
                                        onmouseout="this.src=' img/home/mobile.jpg ' "

                                        class="w-100" alt="">
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-gavel"></i>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="${element.id}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                        href="#" data-product-id="${element.id}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-search"></i>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="text-primary my-0 pt-1" ></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5> ${element.name}</h5>
                                <p class="text-muted">
                                    Start Price :
                                    <span class="text-primary">
                                        ${element.start_price} $
                                    </span>
                                </p>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary">
                                        $
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>








                    `)



                })


            }














        }

    })


}

// end search by keyword







