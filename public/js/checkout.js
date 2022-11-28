function checkout() {
    let name = $('#name').val()
    let email = $('#email').val()
    let phone = $('#phone').val()
    let city = $('#city').val()
    let country = $('#country').val()
    let postcode = $('#postcode').val()
    let address1 = $('#address1').val()
    let address2 = $('#address2').val()
    let total_price = $('#total_price').val()
    let payment_method = 'Paypal'
    let notes = $('#notes').val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/checkout",
        data: {
            'name': name,
            'email': email,
            'phone': phone,
            'city': city,
            'country': country,
            'postcode': postcode,
            'address1': address1,
            'address2': address2,
            'notes': notes,
            'total_price': total_price,
            'payment_method': payment_method
        },
        success: function (response) {
            if (response.success) {
                swal(response.success, '', 'success');
            } else {
                swal(response.warning, '', 'warning');
            }
        }
    })
}
