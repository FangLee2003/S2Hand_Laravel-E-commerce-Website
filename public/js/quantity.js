function incrementValue() {
    var value = parseInt(document.getElementById('quantity-input').value, 10);
    value = isNaN(value) ? 0 : value;

    if (value < document.getElementById('quantity-input').attr("max")) {
        value++;
        document.getElementById('quantity-input').value = value;
    }
}

function decrementValue() {
    var value = parseInt(document.getElementById('quantity-input').value, 10);
    value = isNaN(value) ? 0 : value;

    if (value > 1) {
        value--;
        document.getElementById('number').value = value;
    }
}
