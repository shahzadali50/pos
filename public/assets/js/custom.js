$( document ).ready(function() {

  $("#formData").on('submit',function(e) {
  	//console.log('click');
        e.preventDefault();
        var form = $('#formData');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType:'json',
            beforeSend:function() {
                 $('#formData_btn').prop("disabled",true);
                 },
            success:function (response) {
               if (response.sts=="success") {
                  $('#formData').each(function(){
                    this.reset();
                });
                  $("#tableData").load(location.href+" #tableData > *");
                  $('.modal').modal('hide');
              }    $('#formData_btn').prop("disabled",false); 
              		console.log(response.sts);
     				sweeetalert(response.msg,response.sts,1500);
            }
        });//ajax call
    });//main
  $("#formData1").on('submit',function(e) {
  
        e.preventDefault();
        var form = $('#formData1');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType:'json',
            beforeSend:function() {
                 $('#formData1_btn').prop("disabled",true);
                 },
               success:function (response) {
            		console.log(response);
              if (response.sts=="success") {
                  $('#formData1').each(function(){
                    this.reset();
                });
                  //$("#tableData").load(location.href+" #tableData"); 
                  $('.modal').modal('hide');
              }    $('#formData1_btn').prop("disabled",false); 
              		console.log(response.sts);
                   $("#tableData1").load(location.href+" #tableData1 > *");
                 
     				sweeetalert(response.msg,response.sts,1500);
            }
        });//ajax call
    });//main
  $("#sale_order_fm").on('submit',function(e) {
  
        e.preventDefault();
        var form = $('#sale_order_fm');        
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType:'json',
            beforeSend:function() {
                 $('#sale_order_print').prop("disabled",true);
                 $('#sale_order_btn').prop("disabled",true);
                 },
               success:function (response) {
            		console.log('click');
              if (response.sts=="success") {
                  $('#sale_order_fm').each(function(){
                    this.reset();
                });
                  $('#purchase_product_tb').html('');
                  $('#product_grand_total_amount').html('');
                  $('#product_total_amount').html('');
                 
                 // 	window.location.assign('print_order.php?order_id='+response.order_id);
                  
                  //$("#tableData").load(location.href+" #tableData"); 
                        Swal.fire({
  title: response.msg,
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: `Print`,
  denyButtonText: `Add New`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
   window.location.assign('print_order.php?id='+response.order_id+'&type='+response.type);
    
  } else if (result.isDenied) {
   location.reload();
    
  }
})
              }
            if (response.sts=="error") {
              sweeetalert(response.msg,response.sts,1500);
            }   
              $('#sale_order_btn').prop("disabled",false); 
     			//
    
            }
        });//ajax call
    });//main
   $("#credit_order_client_name").on('change',function() {
   	var value= $('#credit_order_client_name :selected').data('id');
   	var contact= $('#credit_order_client_name :selected').data('contact');
 	 $('#customer_account').val(value);
 	 $('#client_contact').val(contact);
   });
   
    $("#add_product_fm").on('submit',function(e) {
  
        e.preventDefault();
         var form = $(this);
        var fd = new FormData(this);
        var files = $('#product_image')[0].files[0];
  
         $.ajax({
          url:form.attr('action'),
          type:form.attr('method'),
          data:fd,
          dataType:"json",
          contentType: false,
          processData: false,
           beforeSend:function() {
                 $('#add_product_btn').prop("disabled",true);
                 },
           success:function (response) {
            		console.log('click');
              if (response.sts=="success") {
                  $('#add_product_fm').each(function(){
                    this.reset();
                });
                 
              }  $('#add_product_btn').prop("disabled",false); 
               var product_add_from= $('#product_add_from').val();
               if (product_add_from=="modal") {
                 $("#get_product_name").load(location.href+" #get_product_name > *");
                 $('#add_product_modal').modal('hide');
              }
              
              		console.log(response.sts);
     				sweeetalert(response.msg,response.sts,1500);
            }
        });//ajax call
    });//main
  
  $("#voucher_general_fm").on('submit',function(e) {
        e.preventDefault();
        var form = $('#voucher_general_fm');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType:'json',
            beforeSend:function() {
                 $('#voucher_general_btn').prop("disabled",true);
                 },
            success:function (response) {
              if (response.sts=="success") {
                  $('#voucher_general_fm').each(function(){
                    this.reset();
                });
                  $("#tableData").load(location.href+" #tableData"); 
              }    $('#voucher_general_btn').prop("disabled",false); 
     				sweeetalert(response.msg,response.sts,1500);
                   Swal.fire({
                        title: response.msg,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: `Print`,
                        denyButtonText: `Add New`,
                      }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                         window.location.assign('print_voucher.php?voucher_id='+response.voucher_id);
                          
                        } else if (result.isDenied) {
                         location.reload();
                          
                        }
                      })
            }
        });//ajax call
    });//main
    $("#voucher_expense_fm").on('submit',function(e) {
        e.preventDefault();
        var form = $('#voucher_expense_fm');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType:'json',
            beforeSend:function() {
                 $('#voucher_expense_btn').prop("disabled",true);
                 },
            success:function (response) {
              if (response.sts=="success") {
                  $('#voucher_expense_fm').each(function(){
                    this.reset();
                });
                  $("#tableData").load(location.href+" #tableData"); 
              }    $('#voucher_expense_btn').prop("disabled",false); 
            sweeetalert(response.msg,response.sts,1500);
                   Swal.fire({
                        title: response.msg,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: `Print`,
                        denyButtonText: `Add New`,
                      }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                         window.location.assign('print_voucher.php?voucher_id='+response.voucher_id);
                          
                        } else if (result.isDenied) {
                         location.reload();
                          
                        }
                      })
            }
        });//ajax call
    });//main
      $("#voucher_single_fm").on('submit',function(e) {
        e.preventDefault();
        var form = $('#voucher_single_fm');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType:'json',
            beforeSend:function() {
                 $('#voucher_single_btn').prop("disabled",true);
                 },
            success:function (response) {
              if (response.sts=="success") {
                  $('#voucher_single_fm').each(function(){
                    this.reset();
                });
                  $("#tableData").load(location.href+" #tableData"); 
              }    $('#voucher_single_btn').prop("disabled",false); 
            sweeetalert(response.msg,response.sts,1500);
                   Swal.fire({
                        title: response.msg,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: `Print`,
                        denyButtonText: `Add New`,
                      }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                         window.location.assign('print_voucher.php?voucher_id='+response.voucher_id);
                          
                        } else if (result.isDenied) {
                         location.reload();
                          
                        }
                      })
            }
        });//ajax call
    });//main
 $("#get_product_code").on('keyup',function() {
        var code=  $('#get_product_code').val();
         var credit_sale_type=  $('#credit_sale_type').val();
          var payment_type=  $('#payment_type').val();
     //   var podid=  $('#get_product_name :selected').val();
        
         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {get_products_list:code,type:"code"},
            dataType:"text",
            success:function (msg) {
              var res=msg.trim();
               $("#get_product_name").empty().html(res);
                
            }
        });//ajax call }
         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {getPrice:code,type:"code",credit_sale_type:credit_sale_type,payment_type:payment_type},
            dataType:"json",
            success:function (response) {
                
               $("#get_product_price").val(response.price);
               $("#instockQty").html("instock :"+response.qty);
                
            }
        });//ajax call }
    });

 

});/*--------------end of-------------------------------------------------------*/
function getCustomer_name(value) {
  $.ajax({
      url: 'php_action/custom_action.php',
      type: 'post',
      data: {getCustomer_name: value},
      dataType: 'json',
      success:function(response) {
       
        $("#sale_order_client_name").empty().val(response.client_name);
        $("#client_city").empty().val(response.client_city);
        $("#client_address").empty().val(response.client_address);
        $("#client_contact").empty().val(response.client_contact);
        $("#client_contact2").empty().val(response.client_contact2);
      }
    });
}
function getRemaingAmount() {
   var paid_ammount=  $('#paid_ammount').val();
  var product_grand_total_amount=  $('#product_grand_total_amount').html();
   var product_grand_total_amount=  $('#product_grand_total_amount').html();
  var total=parseInt(product_grand_total_amount)-parseInt(paid_ammount);
  $('#remaining_ammount').val(total);
  
}
       
   
  function loadProducts(id) {
		$.ajax({
			url: 'php_action/custom_action.php',
			type: 'post',
		 	data: {getProductPills: id},
			dataType: 'text',
			success:function(response) {
				var data=response.trim();
				$("#products_list").empty().html(data);
			}
		});
}

    $("#get_product_name").on('change',function() {
        //var code=  $('#get_product_code').val();
            var code=  $('#get_product_name :selected').val();
        var payment_type=  $('#payment_type').val();
        var credit_sale_type=  $('#credit_sale_type').val();
       
         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {get_products_list:code,type:"product"},
            dataType:"text",
            success:function (msg) {
              var res=msg.trim();
               $("#get_product_code").val(res);
                
            } 

        });//ajax call }
         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {getPrice:code,type:"product",credit_sale_type:credit_sale_type,payment_type:payment_type},
            dataType:"json",
            success:function (response) {
            
               $("#get_product_price").val(response.price);
               $("#instockQty").html("instock :"+response.qty);
                
            }
        });//ajax call }

    });
      $("#product_code").on('change',function() {
        //var code=  $('#get_product_code').val();
       var code=  $('#product_code').val();
       if (/^[A-Za-z0-9]+$/.test(code)) {
           $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {get_products_code:code},
            dataType:"json",
            success:function (response) {
                if (response.sts=="error") {
                  $('#add_product_btn').prop('disabled',true);
                  $('#product_code').val('');
                       Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title:response.msg,
                        showConfirmButton: true,
   
                      });
                }else{
                   $('#add_product_btn').prop('disabled',false);
                }

                
            } 

        });
       }else{
            Swal.fire({
    position: 'center',
    icon: 'error',
    title:'Please Enter Only Alphabets and Number Without Space and Characters',
    showConfirmButton: true,
   
  });
       }
       

    });
$("#full_payment_check").on('click',function() {
    var checked = $('#full_payment_check').is(':checked');
     var grand = $('#product_grand_total_amount').html();
    
            if (checked) {
               $('#paid_ammount').val(grand);
            } else {
               $('#paid_ammount').val(0);
            }
                $('#paid_ammount').trigger('keyup');

});
  //function addProductPurchase() {
$("#addProductPurchase").on('click',function() {
  	var total_price=0;

    var name=  $('#get_product_name :selected').text();
    var price=  $('#get_product_price').val();
    var id=  $('#get_product_name :selected').val();
    var code=  $('#get_product_code').val();
    var product_quantity=  $('#get_product_quantity').val();
    var pro_type=$('#add_pro_type').val();
	if (id!='' && product_quantity!='') {
    $("#get_product_name").prop('selectedIndex', 0);
    $('#add_pro_type').val('add');
    $('#get_product_code').val('');
    $('#get_product_code').trigger('keyup');
    $('#get_product_quantity').val('1');
	if($('#product_idN_'+id).length){
		var jsonObj = [];
		$(".product_ids").each(function(index){
			var quantity = $(this).data('quantity');
			var val = $(this).val();
			if (val==id) {
					if (pro_type=="add") {
					var Currentquantity=parseInt(quantity)+parseInt(product_quantity);
				}else{
					var Currentquantity=parseInt(product_quantity);
				}
				 total_price=parseFloat(price)*parseFloat(Currentquantity);

					$("#product_idN_"+id).replaceWith('<tr id="product_idN_'+id+'">\
			          <input type="hidden" data-price="'+price+'" data-quantity="'+Currentquantity+'" id="product_ids_'+id+'" class="product_ids" name="product_ids[]" value="'+id+'">\
			          <input type="hidden" id="product_quantites_'+id+'" name="product_quantites[]" value="'+product_quantity+'">\
			          <input type="hidden" id="product_rate_'+id+'" name="product_rates[]" value="'+price+'">\
			          <input type="hidden" id="product_totalrate_'+id+'" name="product_totalrates[]" value="'+total_price+'">\
			          <td>'+code+'</td>\
			          <td>'+name+' </td>\
			          <td>'+price+'</td>\
			          <td>'+Currentquantity+'</td>\
			          <td>'+total_price+'</td>\
			          <td>\
			            <button type="button" onclick="removeByid(`#product_idN_'+id+'`)" class="fa fa-trash text-danger" ></button>\
			            <button type="button" onclick="editByid('+id+',`'+code+'`,`'+price+'`,`'+product_quantity+'`)" class="fa fa-edit text-success"  ></button>\
			            </td>\
			          </tr>');
					}
					getOrderTotal();
					});
				}else{
					total_price=parseFloat(price)*parseFloat(product_quantity);
      
					$("#purchase_product_tb").append('<tr id="product_idN_'+id+'">\
			          <input type="hidden" data-price="'+price+'"  data-quantity="'+product_quantity+'" id="product_ids_'+id+'" class="product_ids" name="product_ids[]" value="'+id+'">\
			          <input type="hidden" id="product_quantites_'+id+'" name="product_quantites[]" value="'+product_quantity+'">\
			          <input type="hidden" id="product_rate_'+id+'" name="product_rates[]" value="'+price+'">\
			          <input type="hidden" id="product_totalrate_'+id+'" name="product_totalrates[]" value="'+total_price+'">\
			          <td>'+code+'</td>\
			          <td>'+name+' </td>\
			           <td>'+price+'</td>\
			           <td>'+product_quantity+'</td>\
			          <td>'+total_price+'</td>\
			          <td>\
			            <button type="button" onclick="removeByid(`#product_idN_'+id+'`)" class="fa fa-trash text-danger" href="#" ></button>\
			            <button type="button" onclick="editByid('+id+',`'+code+'`,`'+price+'`,`'+product_quantity+'`)" class="fa fa-edit text-success"  ></button>\
			            </td>\
			          </tr>');
					
					 getOrderTotal();
				}
	}			

});
function removeByid(id){

  $(id).remove();
  getOrderTotal();
}
function getTotalPerProduct(id) {
     let rates=$('#product_rates_'+id).val();
    $('#product_ids_'+id).data('price',rates);
      getOrderTotal(id);
}
function getOrderTotal(id) {
	let total_bill=grand_total=0;
  
	$(".product_ids").each(function(index){
		let quantity = $(this).data('quantity');
        let rates=0;
       // if (id==0) {
              rates= $(this).data('price');
        // }else{

		//     rates=$('#product_rates_'+id).val();
       // }
         let oneProduct=parseInt(rates)*parseInt(quantity);
          $('#product_rates_total_'+id).text(oneProduct);
		total_bill+=oneProduct;

	});
	var discount=$("#ordered_discount").val();
    let product_delivery_charges=$("#product_delivery_charges").val();
	console.log(product_delivery_charges);
	grand_total=parseInt(product_delivery_charges)+total_bill-total_bill*(parseInt(discount)/100);
	$("#product_total_amount").html(total_bill);
	$("#product_grand_total_amount").html(grand_total);
   var payment_type= $("#payment_type").val();
  
  
  $("#paid_ammount").val(grand_total);
  $("#paid_ammount").attr('max',grand_total);

  
  

  getRemaingAmount();
}
function editByid(id,code,price,qty){
    $('.searchableSelect').val(id); 
  
    
    
var effect = function() {
  return $('.searchableSelect').select2().trigger('change');
};
 
  $.when(effect()).done(function() {
    setTimeout(function(){
        $('#get_product_price').val(price);
     }, 500);
    
  });
$('#get_product_code').val(code);
$('#get_product_quantity').val(qty);
$('#add_pro_type').val('update');

}

function getBalance(val,id) {

  setTimeout(function(){ 
      if (id=="customer_account_exp") {
     var value=$('#customer_account').val();
  }else{
    var value=val;
  }
         $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {getBalance:value},
            dataType:"text",
            success:function (msg) {
              var res=msg.trim();
               $("#"+id).html(res);
                
            } 

        });//ajax call }
 }, 1000);
}
// ---------------------------order gui---------------------------------------

// var input = document.getElementById("barcode_product");
 $("#barcode_product").on('keyup',function(event) {
// input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    var value=input.value;
   event.preventDefault();
   addbarcode_product(value,'plus');
   console.log(value);
   input.value='';
  }
});function addbarcode_product(code,action_value) {
	
//$("#ordered_products").append(dbarcode_productata);
		

		$.ajax({
			url: 'php_action/custom_action.php',
			type: 'post',
			data: {getProductDetailsBycode: code},
			dataType: 'json',
			success:function(res) {
			console.log(action_value);
			
			if($('#product_idN_'+res.product_id).length){
					    
					
			
				var jsonObj = [];
				$(".product_ids").each(function(index){

					var quantity = $(this).data('quantity');
					 var val = $(this).val();
				
					if (val==res.product_id) {
					
							//$("#product_idN_"+id).remove();
							
							if (action_value=="plus") {
								var Currentquantity=1+parseInt(quantity);
							}
							if (action_value=="minus") {
									
								var Currentquantity=parseInt(quantity)-1;
							}

													

						$("#product_idN_"+res.product_id).replaceWith('<tr id="product_idN_'+res.product_id+'">\
					<input type="hidden" data-price="'+res.current_rate+'" data-quantity="'+Currentquantity+'" id="product_ids_'+res.product_id+'" class="product_ids" name="product_ids[]" value="'+res.product_id+'">\
					<input type="hidden" id="product_quantites_'+res.product_id+'" name="product_quantites[]" value="'+Currentquantity+'">\
					<input type="hidden" id="product_rates_'+res.product_id+'" name="product_rates[]" value="'+res.current_rate+'">\
					<td>'+res.product_code+'  </td>\
          <td>'+res.product_name+' (<span class="text-success">'+res.brand_name+'</span>) </td>\
					<td>'+res.current_rate+' </td>\
					<td>'+Currentquantity+' </td>\
					<td>'+(res.current_rate*Currentquantity)+' </td>\
					<td> <button type="button" onclick="addbarcode_product(`'+res.product_code+'`,`plus`)" class="fa fa-plus text-success" href="#" ></button>\
						<button type="button" onclick="addbarcode_product(`'+res.product_code+'`,`minus`)" class="fa fa-minus text-warning" href="#" ></button>\
						<button type="button" onclick="removeByid(`#product_idN_'+res.product_id+'`)" class="fa fa-trash text-danger" href="#" ></button>\
						</td>\
					</tr>');

					}getOrderTotal();
					 
					});
				}else{
					
					$("#purchase_product_tb").append('<tr id="product_idN_'+res.product_id+'">\
			          <input type="hidden" data-price="'+res.current_rate+'"  data-quantity="1" id="product_ids_'+res.product_id+'" class="product_ids" name="product_ids[]" value="'+res.product_id+'">\
			          <input type="hidden" id="product_quantites_'+res.product_id+'" name="product_quantites[]" value="1">\
			          <input type="hidden" id="product_rate_'+res.product_id+'" name="product_rates[]" value="'+res.current_rate+'">\
			          <input type="hidden" id="product_totalrate_'+res.product_id+'" name="product_totalrates[]" value="'+res.current_rate+'">\
			          <td>'+res.product_code+'  </td>\
                <td>'+res.product_name+' (<span class="text-success">'+res.brand_name+'</span>)</td>\
			           <td>'+res.current_rate+'</td>\
			           <td>1</td>\
			          <td>'+res.current_rate+'</td>\
			          <td>\
			            <button type="button" onclick="addbarcode_product(`'+res.product_code+'`,`plus`)" class="fa fa-plus text-success" href="#" ></button>\
						<button type="button" onclick="addbarcode_product(`'+res.product_code+'`,`minus`)" class="fa fa-minus text-warning" href="#" ></button>\
						<button type="button" onclick="removeByid(`#product_idN_'+res.product_id+'`)" class="fa fa-trash text-danger" href="#" ></button>\
						</td>\
			          </tr>');
					
					 getOrderTotal();
				}
						//console.log(jsonObj);
			}


		});
}


// ---------------------------order gui---------------------------------------
function addProductOrder(id,max=100,action_value) {
  
//$("#ordered_products").append(data);
    

    $.ajax({
      url: 'php_action/custom_action.php',
      type: 'post',
      data: {getProductDetails: id},
      dataType: 'json',
      success:function(res) {
      console.log(action_value);
      
      if($('#product_idN_'+id).length){
              
          
      
        var jsonObj = [];
        $(".product_ids").each(function(index){

          var quantity = $(this).data('quantity');
           var val = $(this).val();
        
          if (val==id) {
          
              //$("#product_idN_"+id).remove();
              
              if (action_value=="plus") {
                var Currentquantity=1+parseInt(quantity);
              }
              if (action_value=="minus") {
                  
                var Currentquantity=parseInt(quantity)-1;
              }

                          

            $("#product_idN_"+id).replaceWith('<tr id="product_idN_'+id+'">\
          <input type="hidden" data-price="'+res.current_rate+'" data-quantity="'+Currentquantity+'" id="product_ids_'+id+'" class="product_ids" name="product_ids[]" value="'+res.product_id+'">\
          <input type="hidden" id="product_quantites_'+id+'" name="product_quantites[]" value="'+Currentquantity+'">\
          <td>'+res.product_name+' (<span class="text-success">'+res.brand_name+'</span>) </td>\
          <td><input type="number" onchange="getTotalPerProduct('+id+')" id="product_rates_'+id+'" name="product_rates[]" value="'+res.current_rate+'"></td>\
          <td>'+Currentquantity+' </td>\
          <td id="product_rates_total_'+id+'">'+(res.current_rate*Currentquantity)+' </td>\
          <td> <button type="button" onclick="addProductOrder('+id+','+res.quantity+',`plus`)" class="fa fa-plus text-success" href="#" ></button>\
            <button type="button" onclick="addProductOrder('+id+','+res.quantity+',`minus`)" class="fa fa-minus text-warning" href="#" ></button>\
            <button type="button" onclick="removeByid(`#product_idN_'+id+'`)" class="fa fa-trash text-danger" href="#" ></button>\
            </td>\
          </tr>');

          }
          getOrderTotal(id);
           //  setTimeout(function() {
           //    
           // },1500);
           
          });
        }else{
          
          $("#purchase_product_tb").append('<tr id="product_idN_'+id+'">\
                <input type="hidden" data-price="'+res.current_rate+'"  data-quantity="1" id="product_ids_'+id+'" class="product_ids" name="product_ids[]" value="'+id+'">\
                <input type="hidden" id="product_quantites_'+id+'" name="product_quantites[]" value="1">\
                <input type="hidden" id="product_rate_'+id+'" name="product_rates[]" value="'+res.current_rate+'">\
                <input type="hidden" id="product_totalrate_'+id+'" name="product_totalrates[]" value="'+res.current_rate+'">\
                <td>'+res.product_name+' (<span class="text-success">'+res.brand_name+'</span>)</td>\
          <td><input type="number" onchange="getTotalPerProduct('+id+')" id="product_rates_'+id+'" name="product_rates[]" value="'+res.current_rate+'"></td>\
                 <td>1</td>\
                <td  id="product_rates_total_'+id+'">'+res.current_rate+'</td>\
                <td>\
                  <button type="button" onclick="addProductOrder('+id+','+res.quantity+',`plus`)" class="fa fa-plus text-success" href="#" ></button>\
            <button type="button" onclick="addProductOrder('+id+','+res.quantity+',`minus`)" class="fa fa-minus text-warning" href="#" ></button>\
            <button type="button" onclick="removeByid(`#product_idN_'+id+'`)" class="fa fa-trash text-danger" href="#" ></button>\
            </td>\
                </tr>');
          getOrderTotal(id);
           // setTimeout(function() {
           //    getOrderTotal(id);
           // },1500);
        }
            //console.log(jsonObj);
      }


    });
}
function readonlyIt(value,read_it_id) {
  if (value=='') {
$('#'+read_it_id).prop("readonly",false);
  }else{
$('#'+read_it_id).prop("readonly",true);
  }
 
}

  function playSound() {
  var audio = document.getElementById("myAudio");
        audio.play();
    }
setTimeout(function() {
       
},2000);

var fullPath = window.location.href; // Get the full URL
var pageNameWithParams = fullPath.substring(fullPath.lastIndexOf('/') + 1); 

if (pageNameWithParams=="view_orders.php?order-type=pending") {
   setInterval(checkForNewOrders, 5000);
}

function checkForNewOrders() {
    $.ajax({
            type: 'POST',
            url: 'php_action/custom_action.php',
            data: {checkForNewOrders:'noting'},
            dataType:"json",
            success:function (response) {
             if (response.sts=="success") {
                $("#view_orders_tb").load(location.href+" #view_orders_tb > *");
                sweeetalert("New Order Has been Placed",response.sts,1000);
             }
                
            } 

        });//ajax call }.
}