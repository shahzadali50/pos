<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
    <div class="container-fluid">
        <a class="navbar-brand mx-lg-1 mr-0" href="{{ route('dashboard') }}">
            <img src="{{asset('assets/img/logo/pos_logo.jpg')}}" alt="not-show" class="img-fluid" style="width: 50px">
        </a>
        <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
            <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <ul class="navbar-nav mr-auto">
                {{-- home --}}
                <li class=" list-items mr-1">
                    <a href="{{ route('dashboard') }}" id="" class=" nav-link">
                        <span class="ml-lg-2"><i class='bx bxs-home-circle mr-1' ></i>Home </span>
                    </a>
                </li>
                {{-- Categories --}}

                <li class="nav-item dropdown list-items mr-1">
                    <a href="#" id="dashboardDropdown" class="dropdown-toggle nav-link" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ml-lg-2"> <i class='bx bxs-category-alt mr-1' ></i>Categories</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <a class="nav-link pl-lg-2" href="{{ route('category')}}"><span class="ml-1">Add
                                Category</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('category.list')}}"><span class="ml-1">Category
                                List</span></a>

                    </div>
                </li>
                {{-- Brands --}}

                <li class="nav-item dropdown list-items mr-1">
                    <a href="#" id="dashboardDropdown" class="dropdown-toggle nav-link" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ml-lg-2"> <i class='bx bxs-bookmark-star mr-1' ></i> Brands</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <a class="nav-link pl-lg-2" href="{{ route('brand') }}"><span class="ml-1">Add Brand</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('brand.list') }}"><span class="ml-1">Brand
                                List</span></a>

                    </div>
                </li>
                {{-- Products --}}

                <li class="nav-item dropdown list-items mr-1">
                    <a href="#" id="dashboardDropdown" class="dropdown-toggle nav-link" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ml-lg-2"><i class='bx bxs-purchase-tag-alt' ></i> Products</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <a class="nav-link pl-lg-2" href="{{ route('product.add') }}"><span class="ml-1">Add
                                Product</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('product.list') }}"><span class="ml-1">Product
                                List</span></a>

                    </div>
                </li>
                {{-- Orders --}}

                <li class="nav-item dropdown list-items mr-1">
                    <a href="#" id="dashboardDropdown" class="dropdown-toggle nav-link" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ml-lg-2"> <i class='bx bxs-cart' ></i> Orders</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <a class="nav-link pl-lg-2" href="{{ route('order.create') }}"><span
                                class="ml-1">Create</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('order.list') }}"><span
                                class="ml-1">Orders</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('order.items') }}"><span class="ml-1">Order
                                Items</span></a>

                    </div>
                </li>
                {{-- Sale --}}
                <li class="nav-item dropdown list-items mr-1">
                    <a href="#" id="dashboardDropdown" class="dropdown-toggle nav-link" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ml-lg-2"><i class="h6 fe fe-32 fe-shopping-bag"></i> Sale</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <a class="nav-link pl-lg-2" href="{{ route('total.sale') }}"><span class="ml-1">Total
                                Sales</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('month.sale') }}"><span class="ml-1">Monthly
                                Sales</span></a>
                        <a class="nav-link pl-lg-2" href="{{ route('weekly.sale') }}"><span class="ml-1">Weekly
                                Sales</span></a>

                    </div>
                </li>
                {{-- Get Order --}}

                <li class=" list-items mr-1">
                    <a href="{{ route('order.create') }}" id="" class=" nav-link">
                        <span class="ml-lg-2"><i class='bx bxs-keyboard' ></i> Get Order </span>
                    </a>
                </li>

            </ul>
        </div>
        {{-- <form class="form-inline ml-md-auto d-none d-lg-flex searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted " type="search" placeholder="Type something..." aria-label="Search">
      </form> --}}
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="./#" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            {{-- <li class="nav-item">
          <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
            <i class="fe fe-grid fe-16"></i>
          </a>
        </li> --}}
            {{-- <li class="nav-item nav-notif">
          <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
            <i class="fe fe-bell fe-16"></i>
            <span class="dot dot-md bg-success"></span>
          </a>
        </li> --}}
            <li class="nav-item dropdown ml-lg-0">
                <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar avatar-sm mt-2">
                        <img src="{{ asset('assets/img/logo/user.png') }}" alt="not-show"
                            class="avatar-img rounded-circle">

                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                   
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
