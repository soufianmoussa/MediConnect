<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <script src="https://kit.fontawesome.com/7f46041081.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        /* Custom styles */
        .sidebar {
            height: 100vh;
            overflow-y: auto;
            background-color: #374151;
        }
        .sidebar-brand {
            font-size: 1.5rem;
            color: #fff;
        }
        .sidebar-item {
            padding: 1rem;
            transition: background-color 0.3s;
        }
        .sidebar-item:hover {
            background-color: #4B5563;
        }
        .sidebar-item i {
            margin-right: 0.5rem;
            color: #fff;
        }
        .sidebar-item span {
            font-size: 0.875rem;
            font-weight: bold;
            color: #fff;
        }
        .main-content {
            padding: 2rem;
        }
    </style>
</head>
<body>
    @stack('scripts')
    <div class="flex flex-row">
        <!-- Sidebar -->
        <div class="flex flex-col w-64 h-screen overflow-y-auto sidebar rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
            <div class="sidebar-brand text-center my-4">
                <h1 class="font-bold">Pharmacy</h1>
            </div>
            <div class="my-2 bg-gray-600 h-0.5"></div>
            <!-- Sidebar Items -->
            <a href="{{ route('owner/home') }}" class="sidebar-item">
                <div class="flex items-center">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Home</span>
                </div>
            </a>
            <a href="{{ route('Pharmacy/categories') }}" class="sidebar-item">
                <div class="flex items-center">
                    <i class="fas fa-clinic-medical"></i>
                    <span>Categories</span>
                </div>
            </a>
            <a href="{{ route('pharmacies.products') }}" class="sidebar-item">
                <div class="flex items-center">
                    <i class="fas fa-prescription-bottle-alt"></i>
                    <span>Product</span>
                </div>
            </a>
            <a href="{{route('pharmacies.profile')}}" class="sidebar-item">
                <div class="flex items-center">
                    <i class="fas fa-user-alt"></i>
                    <span>Your Profile</span>
                </div>
            </a>
            <a href="/" class="sidebar-item">
                <div class="flex items-center">
                    <i class="fas fa-eye"></i>
                    <span>Website</span>
                </div>
            </a>
            <!-- Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="my-4 bg-gray-600 h-0.5"></div>
                <button type="submit" class="sidebar-item">
                    <div class="flex items-center">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Logout</span>
                    </div>
                </button>
            </form>
        </div>
        <!-- Main Content -->
        <div class="flex flex-col w-full h-screen main-content">
            <!-- Add Welcome Message Here -->
        
            <!-- Main Content Area -->
            <div>@yield('main')</div>
        </div>
    </div>
</body>
@yield('scripts')
</html>
