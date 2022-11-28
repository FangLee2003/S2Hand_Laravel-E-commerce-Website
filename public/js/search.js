$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    method: "GET",
    url: "/search-product",
    success: function (response) {
        $("#search-input").autocomplete({
            source: response
        });
    }
})

$('#search-button').off().click(function (e) {
    e.preventDefault()

    let product_name = $('#search-input').val()
    $.ajax({
        method: "POST",
        url: "/search-product",
        data: {
            "product_name": product_name,
        },
        success: function (response) {
            if (response.warning) {
                swal(response.warning, '', 'warning');
            }
        }
    })
})
