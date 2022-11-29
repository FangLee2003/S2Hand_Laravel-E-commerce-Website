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
