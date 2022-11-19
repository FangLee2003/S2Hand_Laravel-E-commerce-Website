$('.addToCartBtn').off().click(function (e) {
    e.preventDefault()

    let product_id = $('.product_id').val()
    let product_quantity = $('.quantity-input').val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/add-cart-item",
        data: {
            "product_id": product_id,
            "product_quantity": product_quantity
        },
        success: function (response) {
            if (response.success) {
                swal(response.success, '', 'success');
            } else {
                swal(response.warning, '', 'warning');
            }
        }
    })
})
$('.delete-item').off().click(function (e) {
    e.preventDefault()

    let product_id = $(this).closest('.cart-item').find('.product_id').val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/delete-cart-item",
        data: {
            "product_id": product_id
        },
        success: function (response) {
            if (response.success) {
                window.location.reload();
                swal(response.success, '', 'success');
            } else {
                swal(response.warning, '', 'warning');
            }
        }
    })
})
$('.inc-btn').off().click(function (e) { // .off() to avoid duplicate events
    e.preventDefault()

    let product_id = $(this).closest('.cart-item').find('.product_id').val()

    let input = $(this).closest('.quantity').find('.quantity-input');

    let value = parseInt(input.val(), 10)
    value = isNaN(value) ? '1' : value

    let max = parseInt(input.attr("max"))
    max = isNaN(max) ? '1' : max

    if (value < max) {
        value++
        input.val(value);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/update-cart-item",
        data: {
            "product_id": product_id,
            "product_quantity": value
        },
        success: function (response) {
            if (response.success) {
                console.log(response.success, '', 'success');
            } else {
                swal(response.warning, '', 'warning');
            }
        }
    })
})
$('.dec-btn').off().click(function (e) {
    e.preventDefault()

    let product_id = $(this).closest('.cart-item').find('.product_id').val()

    let input = $(this).closest('.quantity').find('.quantity-input');

    let value = parseInt(input.val(), 10)
    value = isNaN(value) ? '1' : value

    if (value > 1) {
        value--
        input.val(value);
        console.log(value)
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/update-cart-item",
        data: {
            "product_id": product_id,
            "product_quantity": value
        },
        success: function (response) {
            if (response.success) {
                console.log(response.success, '', 'success');
            } else {
                swal(response.warning, '', 'warning');
            }
        }
    })
})

$('.change-quantity').click(function (e) {
    let item = $('.cart-item');
    console.log(item)
    let cartTotal = 0;

    item.each(function () {
        let quantity = parseInt($(this).find('.quantity-input').val(), 10)
        let price = parseInt($(this).find('.item-price').text(), 10);

        let itemTotal = quantity * price;

        $(this).find('.item-total').text(itemTotal);

        cartTotal += itemTotal;
    });

    $('.cart-total').text(cartTotal);
})
