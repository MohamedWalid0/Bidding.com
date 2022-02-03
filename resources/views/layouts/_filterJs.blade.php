<script>

    const clone = $('.causes_div').contents().clone();


    // filter by subcategory name
    $(document).on('change', '.subCategory_checkbox', function () {

        let subCategoriesIds = [];
        let counter = 0;

        $('.subCategory_checkbox').each(function () {

            let l = $(this).attr('id').length ;
            // console.log(l.length)
            if ($(this).is(":checked")) {

                subCategoriesIds.push($(this).attr('id').slice(4,l));
                counter++;
            }

        });


        // cheak if keyword
        let keyword = $('#searchInput').val() ;
        keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim() ;
        // console.log(keyword)


        // cheak for price range
        let startPrice = $( "#amount_start" ).val() ;
        let endPrice = $( "#amount_end" ).val() ;




        fetchProductsBySearch(keyword , subCategoriesIds ,  startPrice , endPrice) ;


    });
    // end filter by subcategory name




    // filter by category name
    $(document).on('click', '.category_checkbox', function () {

        let subCategoriesIds = [];

        let counter = 0;

        let categoryId = $(this).attr('id') ;

        $('input[category-id=' + categoryId + ']').prop('checked', this.checked) ;

        $('.subCategory_checkbox').each(function () {

            let l = $(this).attr('id').length ;
            if ($(this).is(":checked")) {

                subCategoriesIds.push($(this).attr('id').slice(4,l));
                counter++;
            }

        });


        let keyword = $('#searchInput').val() ;
        keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim() ;

        // cheak for price range
        let startPrice = $( "#amount_start" ).val() ;
        let endPrice = $( "#amount_end" ).val() ;




        fetchProductsBySearch(keyword , subCategoriesIds ,  startPrice , endPrice) ;

    });
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

            // chaeck if subcategory checked
            let subCategoriesIds = [];
            let counter = 0;

            $('.subCategory_checkbox').each(function () {

                let l = $(this).attr('id').length ;
                // console.log(l.length)
                if ($(this).is(":checked")) {

                    subCategoriesIds.push($(this).attr('id').slice(4,l));
                    counter++;
                }

            });

            // cheak if keyword
            let keyword = $('#searchInput').val() ;
            keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim() ;


            fetchProductsBySearch(keyword , subCategoriesIds ,  startPrice , endPrice) ;



        });

    } );
    // end filter by price



    // search by keyword

    $(document).on('keyup', '#searchInput', function () {

        let keyword = this.value;
        keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim() ;


        // chaeck if subcategory checked
        let subCategoriesIds = [];
        let counter = 0;

        $('.subCategory_checkbox').each(function () {

            let l = $(this).attr('id').length ;
            // console.log(l.length)
            if ($(this).is(":checked")) {

                subCategoriesIds.push($(this).attr('id').slice(4,l));
                counter++;
            }

        });


        // cheack if price range
        let startPrice = $( "#amount_start" ).val() ;
        let endPrice = $( "#amount_end" ).val() ;

        fetchProductsBySearch(keyword , subCategoriesIds ,  startPrice , endPrice) ;


    });
    
    // end search by keyword

    function fetchProductsBySearch(keyword , subCategoriesIds = [] , minPrice = 0 , maxPrice = 10000) {


        if( keyword === '' ){
            keyword = null ;
        }

        if( Object.keys(subCategoriesIds).length == 0 ){
            subCategoriesIds = null ;
        }

        $.ajax({
            type: 'GET',
            url: 'search?keyword=' + keyword + '&subCategoriesIds=' + subCategoriesIds  + '&minPrice=' + minPrice + '&maxPrice=' + maxPrice,
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
                                                ${element.sub_category_id}
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









function productBidTimer(){
    let cards = document.querySelectorAll('.productBidTimer');
    cards.forEach(card => {
        let countDownDate = new Date(card.dataset.date).getTime();
        const intrvl = setInterval(function () {
            let now = new Date().getTime();
            let timeleft = countDownDate - now;

            let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

            if (days < 0 || hours < 0 || minutes < 0 || seconds < 0) {
                clearInterval(intrvl);
                days = 0;
                hours = 0;
                minutes = 0;
                seconds = 0;
            }
            card.querySelector(".days").innerHTML = days
            card.querySelector(".hours").innerHTML = hours
            card.querySelector(".mins").innerHTML = minutes
            card.querySelector(".secs").innerHTML = seconds


        }, 1000)

    })
}

function stopPaginateRouting(){
    $('.pagination a').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log(url)
    });
}
$(function(){
    stopPaginateRouting()
})



</script>
