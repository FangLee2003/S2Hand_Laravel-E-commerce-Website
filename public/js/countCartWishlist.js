$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function countCart() {
    $.ajax({
        method: "GET",
        url: "/count-cart-item",
        success: function (response) {
            $('.countCart').text(response.countCart);
        }
    })
}

function countWishlist() {
    $.ajax({
        method: "GET",
        url: "/count-wishlist-item",
        success: function (response) {
            $('.countWishlist').text(response.countWishlist);
        }
    })
}

countCart();
countWishlist();
