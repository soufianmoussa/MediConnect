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
</head>
 
<body>
 
    <div class="flex flex-row">
        <div class="flex flex-col w-64 h-screen overflow-y-auto bg-gray-900 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
            <div class="sidebar text-center bg-gray-900">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <h1 class="font-bold text-gray-200 text-[15px] ml-3">Pharmacy</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
                    <i class="bi bi-search text-sm"></i>
                    <input type="text" placeholder="Search" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none" />
                </div>
                <a href="#">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
                    </div>
                </a>
                <a href="{{route('Pharmacy/categories')}}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="fas fa-clinic-medical"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Categories</span>
                    </div>
                </a>
                <a href="{{route('pharmacies.products')}}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Product</span>
                    </div>
                </a>
                <a href="#">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="fas fa-user-alt"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">your Profile</span>
                    </div>
                </a>
                <a href="/">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="fas fa-eye"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Website</span>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="my-4 bg-gray-600 h-[1px]"></div>
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <button type="submit" class="flex items-center outline-none">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="flex flex-col w-full h-screen px-4 py-8 mt-10">
            <div>@yield('main')</div>
        </div>
    </div>
</body>
 
</html>