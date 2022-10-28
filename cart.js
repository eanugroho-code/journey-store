$(document).ready(function (){
 $('.increment-btn').click(function(e) {
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 1000)
    {
        value++;
        $('.input-qty').val(value);
        $(this).closest('.product_data').find('.input-qty').val(value);
    }
 });
});