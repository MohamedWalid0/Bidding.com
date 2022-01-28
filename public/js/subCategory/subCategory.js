
// search by keyword
const clone = $('.causes_div').contents().clone();

$(document).on('keyup', '#searchInput', function () {

    let keyword = this.value;
    let subCategoryId = $('#subCategoryId').attr('value');

    keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim()

    if (keyword === '') {
        $('.causes_div').empty();
        $('.causes_div').append(clone);

    }
    else{
        fetchProductsBySearch(subCategoryId ,keyword);
    }

});

function fetchProductsBySearch(subCategoryId , keyword) {

    $.ajax({
        type: 'GET',
        url: '/subCategoriesSearch' ,
        data:{
            'keyword' : keyword ,
            'subCategory' : subCategoryId
        },
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

<a href="/products/${element.id}">
                        <div class="col-md-3 col-sm-12 p-2">

                        <div class="productsWrapper mt-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">

                                    <img src=" /img/home/mobile.jpg"
                                        onmouseover="this.src=' /img/home/electronic.jpg' "
                                        onmouseout="this.src=' /img/home/mobile.jpg ' "

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
                            <a href="/products/${element.id}">
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
                         </a>
                        </div>

                    </div>

<a/>






                    `)



                })


            }














        }

    })


}

// end search by keyword

