<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon  -->
    <!-- <link rel="shortcut icon" href="./images/favicon.png"> -->
    <!-- Page Title  -->
    <title>Cre*ive || Admin Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin-theme/assets/css/dashlite.css?ver=3.1.2') }}">
    <link rel="stylesheet" href="{{ asset('admin-theme/coustam.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin-theme/assets/css/theme.css?ver=3.1.2') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- slick slider cdn -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/42.0.0/classic/ckeditor.js"></script>


</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                            data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="{{ url('/admin-dashboard') }}" class="logo-link nk-sidebar-logo">
                            <h4 class="text-light">Bannerbuzz</h4>
                             {{-- <img class="logo-light logo-img" src="{{ asset('/front/img/site-logo.png') }}" srcset="{{ asset('/front/img/site-logo.png') }}" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('/front/img/site-logo.png') }}" srcset="{{ asset('/front/img/site-logo.png') }}" alt="logo-dark">  --}}
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt"> <a
                                            href="{{ url('admin-dashboard') }}">Dashboard</a></h6>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Background</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/background-category') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Background
                                                    Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/background-add') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Background
                                                    Add</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/background-view') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Background
                                                    View</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Shape</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/shape-category') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Shape
                                                    Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/shape-add') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Shape Add</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/shape-view') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Shape View</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Clip Art</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/clipart-category') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Clipart
                                                    Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/clipart-add') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Clipart Add</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/clipart-view') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Clipart
                                                    View</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Template</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/template-category') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Template
                                                    Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/template-add') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Create
                                                    Template</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/template-view') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Template
                                                    View</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Product Category & Type </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/product-category-list') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Product
                                                    Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/product-category') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Add Category
                                                </span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/product-type') }}"
                                                class="nk-menu-link"><span class="nk-menu-text"> Product Type
                                                </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Products </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/products') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">All
                                                    Products</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/add-product') }}"
                                                class="nk-menu-link"><span class="nk-menu-text"> Add
                                                    Product</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Accessories </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/product-accessories') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Product
                                                    Accessories</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/add-accessories') }}"
                                                class="nk-menu-link"><span class="nk-menu-text"> Add
                                                    Accessories</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/accessories-type') }}"
                                                class="nk-menu-link"><span class="nk-menu-text"> Accessories Type
                                                </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Blogs </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/blog-category') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Blog
                                                    categories</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/blogs') }}"
                                                class="nk-menu-link"><span class="nk-menu-text"> Blogs list
                                                    </span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('admin-dashboard/add-blog') }}"
                                                class="nk-menu-link"><span class="nk-menu-text"> Add Blog
                                                </span></a>
                                        </li>
                                    </ul>
                                </li>


                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon"
                                    data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">

                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <!-- <div class="nk-news-list">
                                    <a class="nk-news-item" href="#">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                    </a>
                                </div> -->
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">
                                                        {{ Auth::user()->name ?? '' }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name ?? '' }}</span>
                                                        <span class="sub-text">{{ Auth::user()->email ?? '' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <!-- <li><a href="#"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li> -->
                                                    <li><a href="{{ url('admin-dashboard/setting') ?? '' }}"><em
                                                                class="icon ni ni-setting-alt"></em><span>Account
                                                                Setting</span></a></li>
                                                    <!-- <li><a href="{{ url('admin-dashboard/contact-us') ?? '' }}"><em class="icon ni ni-bell"></em><span>ContactUs Notifications</span></a></li> -->
                                                    <li><a class="dark-switch" href="#"><em
                                                                class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ url('logout') }}"><em
                                                                class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon"
                                            data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em
                                                    class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <div class="nk-content ">
                    @yield('content')
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2023 Pro-Graphx. </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('admin-theme/assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin-theme/assets/js/scripts.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin-theme/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin-theme/assets/js/example-toastr.js?ver=3.1.2') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- remove confermation pop up -->
    <script>
        $('body').delegate('.removeConfermation', 'click', function(e) {
            event.preventDefault();
            url = $(this).attr('data-url');
            Swal.fire({
                title: "Are you sure?",
                text: "You lost your all related data if you remove this",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
            // console.log(url);
        });
    </script>
    @if (Session::get('error'))
        <script>
            toastr.clear();
            NioApp.Toast('{{ Session::get('error') }}', 'error', {
                position: 'top-right'
            });
        </script>
    @endif
    @if (Session::get('success'))
        <script>
            toastr.clear();
            NioApp.Toast('{{ Session::get('success') }}', 'info', {
                position: 'top-right'
            });
        </script>
    @endif
    <!-- script make theme dark mode dinamic: -->
    <script>
        $(document).ready(function() {
            var theme = localStorage.getItem('siteTheme');
            if (theme && theme === 'dark') {
                $('body').addClass('nk-body bg-lighter npc-general has-sidebar no-touch nk-nio-theme dark-mode');
            }
            $('.dark-switch').on('click', function() {
                if ($(this).hasClass('active')) {
                    localStorage.setItem('siteTheme', 'light');
                } else {
                    localStorage.setItem('siteTheme', 'dark');
                }
            });
        });
    </script>
    <!-- script make theme dark mode dinamic end: -->

    <!--ckeditor script -->
    <script>
        var editorElements = document.querySelectorAll('.description');

        editorElements.forEach(function(element) {
            ClassicEditor
                .create(element)
                .catch(error => {
                    console.error(error);
                });
        });
        var vareditorElements = document.querySelectorAll('.variation_description');

        vareditorElements.forEach(function(element) {
            ClassicEditor
                .create(element)
                .catch(error => {
                    console.error(error);
                });
        });

        function initializeEditors(container) {
            var var_editorElements = container.querySelectorAll('.variation_description');

            var_editorElements.forEach(function(element) {
                ClassicEditor
                    .create(element)
                    .then(editor => {
                        editor.setData('');
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        }
    </script>
</body>

</html>
