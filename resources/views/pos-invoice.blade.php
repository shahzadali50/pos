<x-head />

<body>
    <section style="padding: 50px 0px">
        <div class="continer-fluid">
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
                            <p class="m-0">Phone No :{{ $order->customer_phone }}</p>

                        </div>
                        <div class="card-body">
                            <table class="table ">
                                <thead>
                                    <tr class="table-bordered">
                                        <th style="color: #051431" scope="col">#</th>
                                        <th style="color: #051431" scope="col">ITEMS</th>
                                        <th style="color: #051431" scope="col">QTY</th>
                                        <th style="color: #051431" scope="col">PRICE</th>
                                        <th style="color: #051431" scope="col">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalItem = 0;
                                    @endphp
                                    @foreach ($orderItems as $index => $item)
                                    <tr class="table-bordered">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ optional($item->product)->name }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>{{ $item->product_price }}</td>
                                        <td>{{ $item->product_price }}</td>
                                    </tr>
                                    @php
                                     $totalItem++;;
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="d-flex  align-items-center">
                                <p>Total Items:</p>
                                <p class="ml-3">{{ $totalItem }}</p>
                            </div>
                            <div class="row">
                                <div class="col-5 ml-auto">
                                    <div class="d-flex justify-content-between">
                                        <h6>DISCOUNT%</h6>
                                        {{-- <p>{{ $order->disc }}</p> --}}
                                        <p>{{ (int)$order->disc }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 ml-auto">
                                    <div class="d-flex justify-content-between">
                                        <h6>GRAND TOTAL</h6>
                                        <p>{{ $order->grand_total }}</p>
                                    </div>
                                </div>
                            </div>



                            <hr>
                            <div class="text-center">
                                <p>Invoice was created on a computer and is valid without the signature and seal.</p>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</body>

</html>
