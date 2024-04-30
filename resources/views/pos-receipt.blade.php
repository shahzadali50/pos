<x-head />

<body>
    <div class="continer">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-header ">
                        <div class="text-center">
                            <img src="{{asset('assets/img/logo/pos_logo.jpg')}}" style="width: 70px;height: 70px;">
                        </div>
                        <h4 class="text-center">POS</h4>
                        <p class="text-center">MEN-WOMEN-KIDS-HOME</p>
                        <h6>
                            Contact Information
                        </h6>
                        <p class="m-0">Name : {{ $order->customer_name }}</p>
                        <p class="m-0">Address : TBZ Street No # 01 Sahiwal</p>
                        <p class="m-0">Email :ZELLBURY@gmail.com</p>
                        <p class="m-0">Phone :{{ $order->customer_phone }}</p>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Product</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $item)
                                <tr>

                                    <td>{{ optional($item->product)->name }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>{{ $item->product_price }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <h6>Disc</h6>
                            <p>{{ $order->disc }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Grand Total</h6>
                            <p>{{ $order->grand_total }}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>

</body>

</html>
