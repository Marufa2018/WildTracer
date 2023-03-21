<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Wild Tracer') }}</title>
    <link rel = "icon" href ="../dist/wildtracer_title.png" type = "image/x-icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @yield('stylesheet')
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
            @can('logged-in')
            <div id="sidebar" class="active">
                    <div class="sidebar-wrapper active">
                        <a class="navbar-brand" href="{{ url('/dashboard') }}"><img src="../dist/Main.PNG" width="200" height="100" class="img-fluid" alt="WildTracer"></a>
                        <div class="sidebar-menu">
                            <ul class="menu">
                                <li class="sidebar-title">Menu</li>
        
                                <li class="sidebar-item active ">
                                    <a href="{{ url('/dashboard') }}" class='sidebar-link'>
                                        <i class="bi bi-grid-fill"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
        
                                <li class="sidebar-title">Forms &amp; Tables</li>
        
                                <li class="sidebar-item  ">
                                    <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
                                        <i class="bi bi-grid-1x2-fill"></i>
                                        <span>Members</span>
                                    </a>
                                </li>
        
                                <li class="sidebar-item  ">
                                    <a href="{{ route('admin.instances.index') }}" class='sidebar-link'>
                                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                        <span>Instances</span>
                                    </a>
                                </li>
        
                                {{-- <li class="sidebar-title">Download</li>
        
                                <li class="sidebar-item  ">
                                    <a href="{{ route('admin.download.index') }}" class='sidebar-link'>
                                        <i class="bi bi-cloud-arrow-down-fill"></i>
                                        <span>Data Downloader</span>
                                    </a>
                                </li> --}}
        
                                <li class="sidebar-title">Managments</li>
        
                                <li class="sidebar-item  ">
                                    <a href="{{ route('admin.locations.index') }}" class='sidebar-link'>
                                        <i class="bi bi-map-fill"></i>
                                        <span>Locations</span>
                                    </a>
                                </li>
        
                                <li class="sidebar-item  ">
                                    <a href="{{ route('admin.animals.index') }}" class='sidebar-link'>
                                        <i class="bi bi-binoculars-fill"></i>
                                        <span>Animals</span>
                                    </a>
                                </li>
        
                                <li class="sidebar-item  ">
                                    <a href="{{ route('admin.routes.index') }}" class='sidebar-link'>
                                        <i class="bi bi-arrow-down-up"></i>
                                        <span>Routes</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                    </div>
                </div>
            @endcan
                <div id="main" class='layout-navbar'>
                        @can('logged-in')
                        <header class='mb-3'>
                            <nav class="navbar navbar-expand navbar-light ">
                                <div class="container-fluid">
                                    <a href="#" class="burger-btn d-block">
                                        <i class="bi bi-justify fs-3"></i>
                                    </a>
            
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                        </ul>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="user-menu d-flex">
                                                    <div class="user-name text-end me-3">
                                                        <h6 class="mb-0 text-gray-600">Admin</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                {{-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                                        Profile</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                                        Settings</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li> --}}
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </header>
                        @endcan
                        <div id="main-content">
            
                                @include('partials.alerts')
                                @yield('content')
                        @can('logged-in')
                        <footer>
                        </footer>
                        @endcan
                        </div>
                    </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    @yield('script')

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>