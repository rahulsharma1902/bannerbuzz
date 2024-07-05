@extends('front_layout.master')
@section('content')
<!-- userdashbord -->
<section class="user_dashboard_sec">
    <div class="container">
        <div class="user_dashboard_content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="lft_side">
                        <div class="lft_menubox">
                            <div class="myAccountBtn">Account Dashboard</div>
                            <ul class="hide">
                                <li>
                                    <a class="linkButton dashboard {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-gauge"></i>
                                        </span>
                                        <span class="menu_text">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkButton myProfile {{ request()->routeIs('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <span class="menu_text">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkButton addressBook false {{ request()->routeIs('user.address') ? 'active' : '' }}" href="{{ route('user.address') }}">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-address-book"></i>
                                        </span>
                                        <span class="menu_text">Address Book</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkButton orders false {{ request()->routeIs('user.orders') ? 'active' : '' }}" href="{{ route('user.orders') }}">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </span>
                                        <span class="menu_text">Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkButton orders false {{ request()->routeIs('user.cards') ? 'active' : '' }}" href="{{ route('user.cards') }}">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-credit-card"></i>
                                        </span>
                                        <span class="menu_text">My Saved Card</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a class="linkButton creaditAmount false" href="#">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-wallet"></i>
                                        </span>
                                        <span class="menu_text">Wallet</span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a class="linkButton creaditAmount false" href="#">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-credit-card"></i>
                                        </span>
                                        <span class="menu_text">Credits</span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a class="linkButton quotations false" href="#">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-message"></i>
                                        </span>
                                        <span class="menu_text">Quotes</span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a class="linkButton orderticket false" href="#">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-ticket"></i>
                                        </span>
                                        <span class="menu_text">Tickets</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a class="linkButton savedDesign false" href="{{ route('saved.designs') }}">
                                        <span class="menuIcons">
                                            <i class="fa-solid fa-pen-nib"></i>
                                        </span>
                                        <span class="menu_text">Designs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @yield('usercontent')

            </div>
        </div>
    </div>
</section>

<!-- end userdashbord -->

@endsection