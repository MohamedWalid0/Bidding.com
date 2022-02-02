
$(document).on('keyup', '.search_query', function () {

    let keyword = this.value;
    keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim()

    if (keyword === '') {
        $('.results').css('display','none');
    }
    else{
        fetchProductsByNavbarSearch(keyword);
    }

});

function fetchProductsByNavbarSearch(keyword) {


    $.ajax({
        type: 'GET',
        url: '/searchByKeyword?q=' + keyword ,



        dataType: "json",
        headers: {
            'contentType': 'charset=UTF-8'
        },
        success: function (response) {

            if (response.length == 0) {
                $('.results').css('display','none');
            }
            else {
                $('.results').empty();

                $('.results').css('display','block');
                response.slice(0,5).forEach(element => {
                    $('.results').append(`


                        <li><a href="/products/${element.id}">${element.name}<br /><span></span></a></li>

                    `)
                })



            }














        }

    })


}

