
$(document).on('keyup', '.search_query', function () {

    let keyword = this.value;
    keyword = keyword.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').trim()

    if (keyword === '') {
        $('.suggest_div').css('display','none');
    }
    else{
        fetchProductsByNavbarSearch(keyword);
    }

});

function fetchProductsByNavbarSearch(keyword) {

    $.ajax({
        type: 'GET',
        url: 'search?q=' + keyword ,
        dataType: "json",
        headers: {
            'contentType': 'charset=UTF-8'
        },
        success: function (response) {

            if (response.length == 0) {
                $('.suggest_div').css('display','none');
            }
            else {
                $('.suggest_div').empty();

                $('.suggest_div').css('display','block');
                response.slice(0,5).forEach(element => {
                    $('.suggest_div').append(`

                        <p class="mb-0">  
                            <a  class="nav-link" >
                                ${element.name}
                            </a> 
                        </p>

                    `)
                })
                


            }














        }

    })


}

