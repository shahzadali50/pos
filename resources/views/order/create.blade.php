@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h2 class="page-title">Oder Create</h2>
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="" method="">


                    <div class="row">
                        <div class="col-md-4 col-sm-8">
                            <div class="form-group">
                                <label for="simpleinput">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" name="c_name" class="form-control" placeholder="Customer Name" required>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-8 ">
                            <div class="form-group ">
                                <label for="simpleinput">Phone No<span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone No." required>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <div class="form-group">
                                <label>Items<span class="text-danger">*</span></label>
                                <select class="form-control items">
                                    <option selected disabled>Select Items</option>
                                    @foreach ($products as $product )
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>

                                    @endforeach


                                </select>

                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-3">
                            <div class="form-group">
                                <label for="simpleinput">code</label>
                                <input type="text" readonly name="code" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-3">
                            <div class="form-group">
                                <label for="simpleinput">Qty</label>
                                <input type="number" name="qty" id="quantityInput" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-3">
                            <div class="form-group">
                                <label for="simpleinput"> Price</label>
                                <input type="hidden" name="original_sale_rate" id="originalSaleRateInput" class="form-control">
                                <input type="number" name="sale_rate" id="saleRateInput" class="form-control" required>
                            </div>

                        </div>


                        <div class="col-lg-3 col-12" style="margin-top:30px">
                            <button type="reset" class="btn mb-2 btn-warning mr-2">Reset</button>
                            <button type="submit" class="btn mb-2 btn-info">Add</button>
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
        $('.items').select2();
    });



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
                }
                , error: function(xhr, status, error) {
                    console.error('Error fetching product details:', error);
                }
            });
        });

        // Listen to changes in the quantity input
        $('#quantityInput').on('input', function() {
            var quantity = $(this).val();
            var saleRateInput = $('#saleRateInput');
            var originalSaleRateInput = $('#originalSaleRateInput').val();

            // Calculate the new sale rate based on quantity
            var newSaleRate = originalSaleRateInput * quantity;

            // Update the sale rate input with the calculated value
            saleRateInput.val(newSaleRate);
        });
    });

</script>






@endpush
