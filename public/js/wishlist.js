$('.updateWishlistBtn').off().click(function (e) {
    e.preventDefault()

    let product_id = $('.product_id').val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/update-wishlist-item",
        data: {
            "product_id": product_id
        },
        success: function (response) {
            if (response.success) {
                countWishlist();
                $('.updateWishlistBtn').load(window.location.href + " .wishlist-text");
                swal(response.success, '', 'success');
            } else {
                swal(response.warning, '', 'warning');
            }
        }
    })
})
