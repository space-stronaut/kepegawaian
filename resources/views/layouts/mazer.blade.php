<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css' ) }}">
    
<link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css' ) }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css' ) }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css' ) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css' ) }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg' ) }}" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="/"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item {{ Request::is('home') ? 'active' : '' }}">
                <a href="/home" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Request::is('cabang') ? 'active' : '' }}">
                <a href="/cabang" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Cabang Management</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Request::is('category') ? 'active' : '' }}">
                <a href="/category" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>SubCategory Management</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Request::is('product') ? 'active' : '' }}">
                <a href="/product" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Product Management</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Request::is('task') ? 'active' : '' }}">
                <a href="/task" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Task Management</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Request::is('dapur') ? 'active' : '' }}">
                <a href="/dapur" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Kinerja Dapur Management</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Request::is('pramusaji') ? 'active' : '' }}">
                <a href="/pramusaji" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Kinerja Pramusaji Management</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link bg-danger text-whtie" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="bi bi-grid-fill text-white"></i>
                    <span class="text-white">{{ __('Logout') }}</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                </form>
            </li>
            
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <h3>@yield('heading')</h3>
</div>
<div class="page-content">
    <section class="row">
        @yield('content')
    </section>
</div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js' ) }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js' ) }}"></script>
    
<script src="{{ asset('assets/js/pages/dashboard.js' ) }}"></script>

    <script src="{{ asset('assets/js/mazer.js' ) }}"></script>
    @stack('script')
</body>

</html>
