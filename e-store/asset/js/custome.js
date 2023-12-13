// $(document).ready(function () {
//     $(document).on('click','.btnUpdateCart', function () {

//         var productID = $(this).closest('.product-quantity').find('.product_id').val();
//         var Qty = $('.input-qty').val();
//         // toastr.success('Have Fun')


//         $.ajax({
//             type: "post",
//             url: "middleware/cart-code.php",
//             data: {
//                 "Qty": Qty,
//                 "productID": productID,
//                 "scope" : "update"
//             },
//             dataType: "dataType",
//             success: function (response) {
//                 if(response == 'success'){
//                     toastr.success('Have Fun')
//                 }
//             }
//         });
        
//     });
// });