window.$crisp = [];
window.CRISP_WEBSITE_ID = "eb520ee9-b0f5-4ddf-be58-578ef5d25fff";
(function () {
    d = document;
    s = d.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = 1;
    d.getElementsByTagName("head")[0].appendChild(s);
})();

// Sweetalert 
const flashData = $('.flash-data').data('flashdata');
if (flashData == 'Insufficient Stock') {
    Swal.fire({
        type: 'info',
        title: 'Oops...',
        text: flashData + ' !'

    });
}

// $(document).ready(function(){
//     $('.updatecart').click(function(e){
//         var c_cart_id = $('input[name="c_cart_id"]').val();
//         var barang_id = $('input[name="barang_id"]').map(function (){return $(this).val();}).get()
//         var qty        = $('input[name="qty"]').map(function (){return $(this).val();}).get()
//         var barang_harjul = $('input[name="barang_harjul"]').map(function (){return $(this).val();}).get()
//         // var c_detail_id = $('input[name="c_detail_id"]').val();



//         e.preventDefault();
//         $.ajax({
//             url : "<?php echo base_url();?>toko/cart/updatecart",
//             method : "POST",
//             data : {c_cart_id: c_cart_id ,barang_id: barang_id, qty: qty, barang_harjul:barang_harjul},
//             success: function(data){
//                 // $('#detail_cart').html(data);
//                 // console.log(data);
//                 console.log(data);
//                 // if(data.message == 'Yes'){
//                 //     alert('Yes');
//                 // }else{
//                 //     alert('noo');
//                 // }
//             }
//         });
//         window.location.reload();
//     });
// });