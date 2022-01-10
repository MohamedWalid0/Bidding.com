$(document).on('click', '.toggleProductinWishlist', function (e) {

    e.preventDefault();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let productId = $(this).attr('data-product-id');

    $.ajax({
        type: 'GET',
        url: "/wishlist/" + $(this).attr('data-product-id'),
        data: {
            'productId': $(this).attr('data-product-id'),
        },
        success: function (data) {
            $("div[data-product-icon-id=" + productId + "]").toggleClass("wishlistNotActive wishlistActive");
            $("a[data-product-id=" + productId + "]").toggleClass("wishlistIconNotActive wishlistIconActive");
            if ((data.wished) && (data.status)) {
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        },
        error: function (jqXHR) {
            toastr.warning(jqXHR.responseJSON.message);
        }

    });
});
