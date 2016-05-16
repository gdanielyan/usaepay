$(document).ready(function(){
    var $checkbox = $("#same_addr");
    var $ship_addr= $("#ship_addr");
    var $ship_city= $("#ship_city");
    var $ship_state= $("#ship_state");
    var $ship_zip= $("#ship_zip");

    $checkbox.change( function(){

        var bill_addr= $("#bill_addr").val();
        var bill_city= $("#bill_city").val();
        var bill_state= $("#bill_state").val();
        var bill_zip= $("#bill_zip").val();
        
        if ($(this).is(':checked')) {
            console.log(bill_addr);
            $ship_addr.val(bill_addr);
            $ship_city.val(bill_city);
            $ship_state.val(bill_state);
            $ship_zip.val(bill_zip);
        } else {
            $ship_addr.val('');
            $ship_city.val('');
            $ship_state.val('');
            $ship_zip.val('');
        }
    });
});

$(document).ready(function(){
    var $amt   = $("#p_mount");
    $amt.val(20.59);
    var $size  = $("#size");
    var $price = $("#price");
    var $tax   = $("#tax");
    var $total = $("#total");
    var newPrice, newTax, newTotal, shipping = 5.99;
    $size.change(function(){
        $val   = $size.val();
        if($val=="12x24"){
            newPrice = 12.99;
        }else if($val=="18x36"){
            newPrice = 14.99;
        }else if($val=="24x48"){
            newPrice = 16.99;
        }
        newTax = (shipping+newPrice) * .085;
        newTotal = newPrice + newTax + shipping;
        $price.html('$' + newPrice.toFixed(2));
        $tax.html('$' + newTax.toFixed(2));
        $total.html('$' + newTotal.toFixed(2));
        $amt.val(newTotal.toFixed(2));
    });
});