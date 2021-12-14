
const clone = $('.causes_div').contents().clone();

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
        url: 'search/SubCategory/' + ids ,
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
                                        id="wishlistIconContainer" data-product-icon-id="{{$product -> id}}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                        href="#" data-product-id="{{$product -> id}}">
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
                                    Current Bid :
                                    <span class="text-primary">
                                        ${element.last_bid.cost ?? 0}$
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
