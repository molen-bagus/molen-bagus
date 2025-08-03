<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Molen Bagus')</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-bagus.jpg') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            50: '#fef7ed', 100: '#fdedd3', 200: '#fbd7a5', 300: '#f8bc6d', 400: '#f59e0b',
                            500: '#d97706', 600: '#c2410c', 700: '#9a3412', 800: '#7c2d12', 900: '#451a03',
                        }
                    }
                }
            }
        }
    </script>
    
    @stack('styles')
</head>
<body class="font-inter bg-gray-100">
    <div class="flex h-screen relative"> <div id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg
                    transform -translate-x-full transition-transform duration-300 ease-in-out
                    lg:translate-x-0 lg:static lg:flex-shrink-0 lg:flex lg:flex-col"> <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo-bagus.jpg') }}" alt="Molen Bagus Logo" class="w-10 h-10 rounded-full">
                    <div>
                        <h1 class="text-lg font-bold text-primary-600 font-poppins">Admin Panel</h1>
                        <p class="text-sm text-gray-600">Molen Bagus</p>
                    </div>
                </div>
            </div>
            
            <nav class="mt-6 flex-1"> <div class="px-6 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Menu Utama</h3>
                </div>
                
                <ul class="mt-2 space-y-1">
                    <li>
                        <a href="{{ route('admin.products.index') }}" 
                           class="flex items-center px-6 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-primary-50 text-primary-600 border-r-2 border-primary-600' : '' }}">
                            <i class="fas fa-box mr-3"></i>
                            Kelola Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" 
                           class="flex items-center px-6 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                            <i class="fas fa-home mr-3"></i>
                            Lihat Website
                        </a>
                    </li>
                    {{-- Tambahkan item menu admin lainnya di sini --}}
                </ul>
            </nav>
            
            <div class="px-6 py-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 transition-colors rounded-md">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>

        </div>

        <div id="sidebar-backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden" onclick="toggleSidebar()"></div>


        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4"> <button onclick="toggleSidebar()" class="lg:hidden text-gray-500 hover:text-primary-600 p-2 focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-md">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <div>
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2> <p class="text-xs sm:text-sm text-gray-600">@yield('page-description', 'Kelola data produk Molen Bagus')</p> </div>
                    
                    <div class="flex items-center space-x-3 sm:space-x-4"> <div class="relative group hidden lg:block"> <button class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition-colors">
                                <i class="fas fa-user-circle text-2xl"></i>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>

                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-2">
                                    <div class="px-4 py-2 text-sm text-gray-500 border-b border-gray-200">
                                        {{ Auth::user()->email }}
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-sign-out-alt mr-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div id="flashMessage" class="mx-4 sm:mx-6 mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"> <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                        <button onclick="this.parentElement.parentElement.remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div id="flashMessage" class="mx-4 sm:mx-6 mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"> <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                        <button onclick="this.parentElement.parentElement.remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endif

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-4 sm:px-6 py-6 sm:py-8"> @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
    
    <script>
        // Sidebar Toggle Functionality
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            
            sidebar.classList.toggle('-translate-x-full'); // Toggles sidebar visibility
            backdrop.classList.toggle('hidden'); // Toggles backdrop visibility

            // Prevent body scroll when sidebar is open on mobile
            // Checks if sidebar is open AND screen width is less than lg (1024px)
            const isSidebarOpen = !sidebar.classList.contains('-translate-x-full');
            document.body.classList.toggle('overflow-hidden', isSidebarOpen && window.innerWidth < 1024);
        }

        // Auto hide flash messages
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessage = document.getElementById('flashMessage');
            if (flashMessage) {
                setTimeout(() => {
                    flashMessage.style.opacity = '0';
                    setTimeout(() => {
                        flashMessage.remove();
                    }, 300);
                }, 5000);
            }
        });

        // Close sidebar if window is resized to desktop from mobile
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            // If window resized to large (desktop) and sidebar is open, close it
            if (window.innerWidth >= 1024 && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>
</body>
</html>