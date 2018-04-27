

$(document).on('click', '#submit_btn', function(){
    alert('papi');
    var name = $('#name').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var account_balance = $('#account_balance').val();
    var quantity = $('#quantity').val();
    var chicken_type = $('#chicken_type').val();
    var total_price= $('#total_price').val();
    var received_cash = $('#received_cash').val();
    var return_cash = $('#return_cash').val();
    var extra_cash= $('#extra_cash').val();
    alert(phone);
    alert("mader");
      $.ajax({
      url: 'insert_customer.php',
      type: 'POST',
      data: {
        'save': 1,
        'name': name,
        'phone': phone,
        'address' : address,
        'account_balance' : account_balance,
        'quantity' : quantity,
        'chicken_type' : chicken_type,
        'total_price' : total_price,
        'received_cash' : received_cash,
        'return_cash' : return_cash,
        'extra_cash' : extra_cash,
         
      },
      success: function(response){
          
        alert('success');
//        $('#name').val('');
//        $('#comment').val('');
//        $('#display_area').append(response);
      }
    });
  });
  // delete from database
