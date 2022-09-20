
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="header header-light dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="#" onclick="openSearch()">
                                <i class="lni lni-search-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#login">
                                <i class="lni lni-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="openWishlist()">
                                <i class="lni lni-heart"></i><span class="dn-counter">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="openCart()">
                                <i class="lni lni-shopping-basket"></i><span class="dn-counter">1</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li><a href="{{route('productList')}}">Home</a>
                    </li>
                    <li><a href="{{route('productList')}}">Shop</a>
                    </li>

{{--                    <li><a href="{{route('historyOrder',[$objUser->id])}}">Order</a>--}}
{{--                    </li>--}}

                    {{-- <li><a href="javascript:void(0);">Pages</a>
                    </li> --}}

                    <li><a href="{{route('listCart')}}">Cart</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">

                    <li>
                        <a href="#" onclick="openWishlist()">
                            <i class="lni lni-heart"></i><span class="dn-counter bg-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCart()">
                            <i class="lni lni-shopping-basket"></i>
                            <span id="countCart" class="dn-counter bg-success">{{!empty($cart)?count($cart):0}}</span>
                        </a>
                    </li>
                    <li>
                       @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="dropdown" id="dropdown">
                                <button id="button" style="color: red" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$objUser->name}}</button>
                                <ul class="dropdown-menu"  aria-label="submenu">
{{--                                    <li><a href="#">{{$objUser->email}}</a></li>--}}
                                    <li> <a href="{{route('logOut')}}" class="dropdown-item">Sign out</a></li>
                                    <li> <a href="{{route('historyOrder',[$objUser->id])}}" class="dropdown-item">Lịch sử đặt hàng </a></li>
                                    <li>
                                        <a href="{{route('danhmuc.index')}}" class="dropdown-item">Admin</a>
                                    </li>
                                </ul>
                            </div>

                           @else
                        <li>
                            <a href="{{route('getLogin')}}">
                                <i class="lni lni-user"></i>Sign In
                            </a>
                        </li>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
