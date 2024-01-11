@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h2 class="page-title">Oder Create</h2>
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="{{ route('store.order') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 col-sm-8">
                            <div class="form-group">
                                <label for="simpleinput">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" required>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-8 ">
                            <div class="form-group ">
                                <label for="simpleinput">Phone No<span class="text-danger">*</span></label>
                                <input type="number" name="customer_phone" class="form-control" placeholder="Phone No." required>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <div class="form-group">
                                <label>Items<span class="text-danger">*</span></label>
                                <select class="form-control items items_select">
                                    <option selected disabled>Select Items</option>
                                    @foreach ($products as $product )
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <div class="form-group">
                                <label for="simpleinput">code</label>
                                <input type="text" name="code" class="form-control">
                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-1">
                            <div class="form-group">
                                <label for="simpleinput">Qty</label>
                                <input type="number" name="qty" id="quantityInput" class="form-control">
                            </div>

                        </div>
                        <div class="col-lg-1 col-sm-3">
                            <div class="form-group">
                                <label for="simpleinput">Price</label>
                                <input type="hidden" name="original_sale_rate" id="originalSaleRateInput" class="form-control">
                                <input type="number" name="sale_rate" id="saleRateInput" class="form-control">
                            </div>

                        </div>
                        <div class="col-lg-1 col-sm-3">
                            <div class="form-group">
                                <label for="simpleinput"> Total</label>
                                <input type="number" readonly name="total_price_b" id="total_price_b" class="form-control" required>
                            </div>

                        </div>

                        <div class="col-lg-3 col-12" style="margin-top:30px">
                            <button type="reset" class="btn mb-2 btn-warning mr-2">Reset</button>
                            <button type="button" class="btn mb-2 btn-info btn_Add_items">Add</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <td>Product name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <td>Total</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody id="itemsTable">

                                </tbody>
                            </table>
                            {{-- <button type="submit" class="btn mb-2 btn-info ">Order Generate</button> --}}


                        </div>
                        <div class="col-sm-3">
                            <table class="table">
                                <tr>
                                    <th>Sub Total</th>
                                    <td id="sub_total">00.00</td>
                                    <input hidden id="sub_totalInput" type="number" name="sub_total" value="0" class="form-control" />
                                </tr>
                                <tr>
                                    <th>Disc%</th>
                                    <td><input type="text" id="discount" value="0"></td>
                                    <input hidden id="discInput" type="number" name="disc" value="0" class="form-control" />

                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <td id="grand_total">00.00</td>
                                    <input hidden id="grand_totalInput" type="number" name="grand_total" value="0" class="form-control" />

                                </tr>
                            </table>
                            <button type="submit" class="btn mb-2 btn-info ">Order Generate</button>


                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.items_select').select2();
    });
    // click .btn_Add_items then show value in table
    $('.btn_Add_items').click(function() {
    let prod_id = $('.items_select :selected').val();
    let prod_name = $('.items_select :selected').text();
    let prod_qty = $('#quantityInput').val();
    let prod_price = $('#saleRateInput').val();

    if (prod_id && prod_name && prod_qty && prod_price) {
        // Check if product with the same ID already exists
        let existingRow = $(`#add_items_${prod_id}`);
        
        if (existingRow.length > 0) {
            // Update quantity and total price
            let existingQty = parseFloat(existingRow.find('td:nth-child(2)').text());
            let existingPrice = parseFloat(existingRow.find('td:nth-child(3)').text());
            
            existingRow.find('td:nth-child(2)').text(existingQty + parseFloat(prod_qty));
            existingRow.find('td:nth-child(4)').text((existingQty + parseFloat(prod_qty)) * existingPrice);

            // Update input fields
            existingRow.find('input[name="product_id[]"]').val(prod_id);
            existingRow.find('input[name="product_qty[]"]').val(existingQty + parseFloat(prod_qty));
            existingRow.find('input[name="product_price[]"]').val(existingPrice + parseFloat(prod_price));
        } else {
            // Add a new row
            $('#itemsTable').append(`
                <tr id="add_items_${prod_id}">
                    <td>${prod_name}</td>
                    <td>${prod_qty}</td>
                    <td>${prod_price}</td>
                    <td>${prod_qty * prod_price}</td>
                    <td>
                        <button type="button" onclick="removeIt(${prod_id})" class="btn btn-light btn_delete">
                            <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                        </button>
                    </td>
                    <td><input readonly type="number" name="product_id[]" value="${prod_id}" class="form-control" /></td>
                    <td><input readonly type="number" name="product_qty[]" value="${prod_qty}" class="form-control" /></td>
                    <td><input type="number" name="product_price[]" value="${prod_price}" class="form-control product_price"/></td>
                </tr>
            `);
        }

        // Clear input fields
        $('.items_select').val('');
        $('#quantityInput').val('');
        $('#saleRateInput').val('');
    } else {
        alert('Please fill in all required fields.');
    }
});






    function removeIt(id) {
        $('#add_items_' + id).remove();
        let subTotal = 0;
        var total_Price = $('.product_price');
        $('#sub_total').text(subTotal);
        $('#grand_total ').text(subTotal);
        $('#sub_totalInput').val(subTotal);
        $('#grand_totalInput').val(subTotal);
        // console.log(total_Price);
        $.each(total_Price, function(index, element) {
            subTotal += parseFloat(element.value);
            $('#sub_total').text(subTotal);
            $('#grand_total ').text(subTotal);
            $('#sub_totalInput').val(subTotal);
            $('#grand_totalInput').val(subTotal);
        });
    }

</script>
<script>
    $(document).ready(function() {
        $('.items').change(function() {
            var productId = $(this).val();
            // Make Ajax request
            $.ajax({
                url: '/get-product-details/' + productId
                , type: 'GET'
                , success: function(data) {
                    // Update the code and sale_rate fields
                    $('input[name="code"]').val(data.code);
                    // Reset the sale_rate input to the original value from the server
                    $('input[name="original_sale_rate"]').val(data.sale_rate);
                    $('input[name="sale_rate"]').val(data.sale_rate);
                    // Reset the quantity input to 1
                    $('#quantityInput').val(1);
                    $('#total_price_b').val(data.sale_rate);
                }
                , error: function(xhr, status, error) {
                    console.error('Error fetching product details:', error);
                }
            });
        });
        // Listen to changes in the code input
        $('input[name="code"]').on('input', function() {
            // Fetch items and sale rate when a value is entered into the code input
            var enteredCode = $(this).val();
            // Make Ajax request to fetch item details based on the entered code
            $.ajax({
                url: '/get-product-details-by-code/' + enteredCode
                , type: 'GET'
                , success: function(data) {
                    // $('.items').val(data.id).change();
                    $('.items').val(data.id).trigger('change');
                    $('input[name="original_sale_rate"]').val(data.sale_rate);
                    $('input[name="sale_rate"]').val(data.sale_rate);
                    // Reset the quantity input to 1
                    $('#quantityInput').val(1);
                    $('#total_price_b').val(data.sale_rate);
                }
                , error: function(xhr, status, error) {
                    console.error('Error fetching product details by code:', error);
                }
            });
        });
        // Listen to changes in the quantity input
        $('#quantityInput,#saleRateInput').on('input', function() {
            var quantity = $('#quantityInput').val();
            var saleRateInput = $('#saleRateInput').val();
            let total_price_b = $('#total_price_b');
            var originalSaleRateInput = $('#originalSaleRateInput').val();
            // Calculate the new sale rate based on quantity
            var newSaleRate = saleRateInput * quantity;
            // Update the sale rate input with the calculated value
            total_price_b.val(newSaleRate);
        });
    });
    // show value in subTotal🤍
    $('.btn_Add_items').on('click', function() {
        let subTotal = 0;
        var total_Price = $('.product_price');
        // console.log(total_Price);
        $.each(total_Price, function(index, element) {
            subTotal += parseFloat(element.value);
            $('#sub_total').text(subTotal);
            $('#grand_total ').text(subTotal);
            $('#sub_totalInput').val(subTotal);
            $('#grand_totalInput').val(subTotal);
        });
    });
    // calculate discount 🤍
    $('#discount').on('input', function() {
        // Get the entered discount value
        var discountValue = parseFloat($(this).val());
        $('#discInput').val(discountValue);
        // Check if the entered discount is a valid number
        if (!isNaN(discountValue)) {
            // Get the current sub_total value
            var subTotal = parseFloat($('#sub_total').text());
            // Calculate the discounted total
            var discountedSubTotal = subTotal - (subTotal * (discountValue / 100));
            // Update the total with the discounted value
            $('#grand_total').text(discountedSubTotal.toFixed(1));
            $('#grand_totalInput').val(discountedSubTotal.toFixed(1));
        }
    });

</script>

@endpush
