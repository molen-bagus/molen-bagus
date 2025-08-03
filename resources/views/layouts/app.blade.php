<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Molen Bagus - Jajanan Tradisional Terbaik')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Molen Bagus menyajikan jajanan tradisional terbaik dengan resep turun temurun. Nikmati molen, onde-onde, pastel, dan kue soes yang lezat.')">
    <meta name="keywords" content="molen, onde-onde, pastel, kue soes, jajanan tradisional, makanan ringan, Bandung">
    <meta name="author" content="Molen Bagus">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'Molen Bagus - Jajanan Tradisional Terbaik')">
    <meta property="og:description" content="@yield('description', 'Molen Bagus menyajikan jajanan tradisional terbaik dengan resep turun temurun.')">
    <meta property="og:image" content="{{ asset('images/logo-bagus.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-bagus.jpg') }}">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

   <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS -->
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
                            50: '#fef7ed',
                            100: '#fdedd3',
                            200: '#fbd7a5',
                            300: '#f8bc6d',
                            400: '#f59e0b',
                            500: '#d97706',
                            600: '#c2410c',
                            700: '#9a3412',
                            800: '#7c2d12',
                            900: '#451a03',
                        },
                        'secondary': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    
    @stack('styles')
</head>
<body class="font-inter bg-gray-50 text-gray-900">
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo-bagus.jpg') }}" alt="Molen Bagus Logo" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full">
                    <div>
                        <h1 class="text-lg lg:text-xl font-bold text-primary-600 font-poppins">Molen Bagus</h1>
                        <p class="text-xs lg:text-sm text-gray-600">Jajanan Tradisional</p>
                    </div>
                </div>
                
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Beranda</a>
                    <a href="#products" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Produk</a>
                    <a href="#reviews" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Ulasan</a>
                    <a href="#contact" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Kontak</a>

                    @auth
                        <div class="relative group">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 font-medium transition-colors">
                                <img src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                                     alt="Avatar"
                                     class="w-8 h-8 rounded-full object-cover border border-gray-300">
                                <span>{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>

                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-2">
                                    <div class="px-4 py-2 text-sm text-gray-500 border-b border-gray-200">
                                        {{ Auth::user()->email }}
                                    </div>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        <i class="fas fa-user mr-2"></i> Profil Saya
                                    </a>
                                    @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        <i class="fas fa-cog mr-2"></i> Admin Panel
                                    </a>
                                    @endif
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 font-medium transition-colors">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span>Profil</span>
                        </a>
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                            <i class="fas fa-sign-in-alt mr-1"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition-colors">
                            <i class="fas fa-user-plus mr-1"></i> Daftar
                        </a>
                    @endauth
                </nav>
                
                <div class="flex items-center space-x-2 lg:hidden">
                    <button onclick="toggleCart()" class="relative p-2 text-gray-700 hover:text-primary-600 transition-colors">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span id="cartCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center hidden">0</span>
                    </button>
                </div>
                
                {{-- MOBILE NAVIGATION DRAWER DIHAPUS DARI SINI --}}
                {{-- Karena sudah ada bottom nav dan ikon profil di bottom nav --}}
            </div>
        </div>
    </header>

    @if(session('success'))
        <div id="flashMessage" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="flashMessage" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6"> 
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ asset('images/logo-bagus.jpg') }}" alt="Molen Bagus Logo" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full">
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold font-poppins">Molen Bagus</h3>
                        <p class="text-xs sm:text-sm text-gray-400">Jajanan Tradisional</p>
                    </div>
                </div>
                <p class="text-sm sm:text-base text-gray-300 mb-4 max-w-md">
                    Jajanan tradisional yang dibuat dengan resep turun temurun, menghadirkan cita rasa autentik dalam setiap gigitan. Kualitas terbaik dengan harga terjangkau.
                </p>
                <div class="flex space-x-3 sm:space-x-4">
                    <a href="https://www.instagram.com/molen_bagus" target="_blank" class="text-xl sm:text-2xl text-gray-400 hover:text-pink-500 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/6281322818164" target="_blank" class="text-xl sm:text-2xl text-gray-400 hover:text-green-500 transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.google.com/maps/place/Molen+Bagus" target="_blank" class="text-xl sm:text-2xl text-gray-400 hover:text-blue-500 transition-colors">
                        <i class="fas fa-map-marker-alt"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4 font-poppins">Kontak</h4>
                <ul class="space-y-2 sm:space-y-3 text-gray-300">
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-phone text-base sm:text-lg text-primary-400"></i>
                        <span class="text-sm sm:text-base">+62 813-2281-8164</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-base sm:text-lg text-primary-400"></i>
                        <span class="text-sm sm:text-base">molenbagus@email.com</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-map-marker-alt text-base sm:text-lg text-primary-400 mt-1"></i>
                        <span class="text-sm sm:text-base">Jl. Gegerkalong Girang, Bandung, Jawa Barat</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-6 pt-6 text-center text-gray-400 sm:mt-8 sm:pt-8">
            <p class="text-xs sm:text-sm">© 2025 Molen Bagus. All rights reserved.</p>
        </div>
    </div>
</footer>
    <div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl w-full max-w-md max-h-[90vh] overflow-hidden flex flex-col">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold font-poppins">Keranjang Belanja</h3>
                    <button onclick="toggleCart()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <div class="px-6 py-4 overflow-y-auto max-h-60 flex-1">
                <div id="cartItems">
                    <p class="text-gray-500 text-center py-8">Keranjang kosong</p>
                </div>
            </div>
            
            <div class="p-6 border-t border-gray-200">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Metode Pemesanan:</label>
                    <div class="grid grid-cols-2 gap-3">
                        <button onclick="selectPayment('WhatsApp')" class="payment-btn p-3 border border-gray-300 rounded-lg hover:border-primary-500 transition-colors flex flex-col items-center space-y-1">
                            <img src="{{ asset('images/wa.jpg') }}" alt="WhatsApp" class="w-8 h-8">
                            <span class="text-xs">WhatsApp</span>
                        </button>
                        <button onclick="selectPayment('GoFood')" class="payment-btn p-3 border border-gray-300 rounded-lg hover:border-primary-500 transition-colors flex flex-col items-center space-y-1">
                            <img src="{{ asset('images/gfood.png') }}" alt="GoFood" class="w-8 h-8">
                            <span class="text-xs">GoFood</span>
                        </button>
                        <button onclick="selectPayment('GrabFood')" class="payment-btn p-3 border border-gray-300 rounded-lg hover:border-primary-500 transition-colors flex flex-col items-center space-y-1">
                            <img src="{{ asset('images/graabfood.jpg') }}" alt="GrabFood" class="w-8 h-8">
                            <span class="text-xs">GrabFood</span>
                        </button>
                        <button onclick="selectPayment('ShopeeFood')" class="payment-btn p-3 border border-gray-300 rounded-lg hover:border-primary-500 transition-colors flex flex-col items-center space-y-1">
                            <img src="{{ asset('images/shopeefood.png') }}" alt="ShopeeFood" class="w-8 h-8">
                            <span class="text-xs">ShopeeFood</span>
                        </button>
                    </div>
                </div>
                
                <button onclick="goToCheckout()" class="w-full bg-primary-600 text-white py-3 rounded-lg font-medium hover:bg-primary-700 transition-colors">
                    Pesan Sekarang
                </button>
            </div>
        </div>
    </div>

    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-lg lg:hidden z-40">
        <div class="flex justify-around items-center h-16">
            <a href="{{ route('home') }}" class="flex flex-col items-center justify-center text-gray-700 hover:text-primary-600 transition-colors w-1/4">
                <i class="fas fa-home text-xl mb-1"></i>
                <span class="text-xs font-medium">Beranda</span>
            </a>

            <a href="#products" class="flex flex-col items-center justify-center text-gray-700 hover:text-primary-600 transition-colors w-1/4">
                <i class="fas fa-box-open text-xl mb-1"></i>
                <span class="text-xs font-medium">Produk</span>
            </a>

            <a href="#reviews" class="flex flex-col items-center justify-center text-gray-700 hover:text-primary-600 transition-colors w-1/4">
                <i class="fas fa-star text-xl mb-1"></i>
                <span class="text-xs font-medium">Ulasan</span>
            </a>

            <button onclick="toggleProfileBottomSheet()" class="flex flex-col items-center justify-center text-gray-700 hover:text-primary-600 transition-colors w-1/4">
                @auth
                    <img src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                         alt="Avatar"
                         class="w-8 h-8 rounded-full object-cover">
                @else
                    <i class="fas fa-user-circle text-xl"></i>
                @endauth
                <span class="text-xs font-medium">Profil</span>
            </button>
        </div>
    </nav>

    <div id="profileBottomSheet" class="fixed inset-x-0 bottom-0 bg-white shadow-xl rounded-t-2xl lg:hidden z-50 transform translate-y-full transition-transform duration-300 hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold font-poppins">Akun Saya</h3>
                <button onclick="toggleProfileBottomSheet()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            @auth
                <div class="py-2 border-t border-gray-200 mt-4">
                    <div class="px-4 py-2 text-sm text-gray-500 border-b border-gray-200 mb-2">
                        <div class="flex items-center space-x-2">
                            <img src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                                 alt="Avatar"
                                 class="w-8 h-8 rounded-full object-cover border border-gray-300">
                            <span class="font-medium text-gray-900">{{ Auth::user()->name }}</span>
                        </div>
                        <p class="mt-1">{{ Auth::user()->email }}</p>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors rounded-lg">
                        <i class="fas fa-user mr-3"></i> Profil Saya
                    </a>

                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors rounded-lg">
                        <i class="fas fa-cog mr-3"></i> Admin Panel
                    </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-base text-gray-700 hover:bg-gray-100 transition-colors rounded-lg">
                            <i class="fas fa-sign-out-alt mr-3"></i> Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="py-4 text-center">
                    <p class="text-gray-600 mb-4">Anda belum login.</p>
                    <a href="{{ route('login') }}" class="w-full bg-primary-600 text-white py-3 rounded-lg font-medium hover:bg-primary-700 transition-colors block mb-2">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors block">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </a>
                </div>
            @endauth
        </div>
    </div>


    @stack('scripts')
    
    <script>
        // Fungsi untuk toggle Cart Modal (tidak berubah)
        function toggleCart() {
            const modal = document.getElementById('cartModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
            updateCartDisplay();
        }

        // Fungsi baru untuk toggle Profile Bottom Sheet
        function toggleProfileBottomSheet() {
            const sheet = document.getElementById('profileBottomSheet');
            sheet.classList.toggle('translate-y-full'); // Menggeser keluar/masuk
            sheet.classList.toggle('hidden'); // Menampilkan/menyembunyikan
        }


        // Global variables
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let selectedPayment = '';

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Cart functionality
        function toggleCart() {
            const modal = document.getElementById('cartModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
            updateCartDisplay();
        }

        // Add to cart
        function addToCart(id, name, price, image) {
            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    image: image,
                    quantity: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            showToast('Produk ditambahkan ke keranjang!');
        }

        // Remove from cart
        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
        }

        // Update cart count
        function updateCartCount() {
            const cartCount = document.getElementById('cartCount');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

            if (totalItems > 0) {
                cartCount.textContent = totalItems;
                cartCount.classList.remove('hidden');
            } else {
                cartCount.classList.add('hidden');
            }
        }

        // Update cart display
        function updateCartDisplay() {
            const cartItems = document.getElementById('cartItems');

            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-gray-500 text-center py-8">Keranjang kosong</p>';
                return;
            }

            let total = 0;
            let html = '';

            cart.forEach(item => {
                const subtotal = item.price * item.quantity;
                total += subtotal;

                html += `
                    <div class="flex items-center space-x-4 p-4 border-b border-gray-200">
                        <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">${item.name}</h4>
                            <p class="text-sm text-gray-600">Rp.${item.price.toLocaleString('id-ID')} x ${item.quantity}</p>
                            <p class="font-semibold text-primary-600">Rp.${subtotal.toLocaleString('id-ID')}</p>
                        </div>
                        <button onclick="removeFromCart(${item.id})" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
            });

            html += `
                <div class="p-4 bg-gray-50 rounded-lg mt-4">
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span>Total:</span>
                        <span class="text-primary-600">Rp.${total.toLocaleString('id-ID')}</span>
                    </div>
                </div>
            `;

            cartItems.innerHTML = html;
        }

        // Payment selection
        function selectPayment(method) {
            selectedPayment = method;

            // Update UI to show selected payment
            document.querySelectorAll('.payment-btn').forEach(btn => {
                btn.classList.remove('border-primary-500', 'bg-primary-50');
                btn.classList.add('border-gray-300');
            });

            event.target.closest('.payment-btn').classList.remove('border-gray-300');
            event.target.closest('.payment-btn').classList.add('border-primary-500', 'bg-primary-50');

            showToast(`Metode ${method} dipilih`);
        }

        // Checkout
        function goToCheckout() {
            if (cart.length === 0) {
                showToast('Keranjang kosong!');
                return;
            }

            if (!selectedPayment) {
                showToast('Pilih metode pemesanan terlebih dahulu!');
                return;
            }

            if (selectedPayment === 'WhatsApp') {
                let message = 'Halo Molen Bagus, saya ingin memesan:%0A%0A';
                let total = 0;

                cart.forEach(item => {
                    const subtotal = item.price * item.quantity;
                    total += subtotal;
                    message += `- ${item.name} x${item.quantity} = Rp.${subtotal.toLocaleString('id-ID')}%0A`;
                });

                message += `%0ATotal: Rp.${total.toLocaleString('id-ID')}%0A%0A`;
                message += 'Terima kasih!';

                const waURL = `https://wa.me/6281322818164?text=${message}`;
                window.open(waURL, '_blank');
            } else {
                // Handle other payment methods
                const links = {
                    'GoFood': 'https://gofood.co.id/bandung/restaurant/molen-bagus-gegerkalong-girang-d029da02-a2ba-4733-8f91-a44c0ccfb030',
                    'GrabFood': 'https://food.grab.com/id/id/',
                    'ShopeeFood': 'https://shopee.co.id/'
                };

                if (links[selectedPayment]) {
                    window.open(links[selectedPayment], '_blank');
                }
            }

            // Clear cart after checkout
            cart = [];
            localStorage.removeItem('cart');
            updateCartCount();
            updateCartDisplay();
            toggleCart();
            showToast('Terima kasih! Pesanan Anda sedang diproses.');
        }

        // Show toast notification
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-primary-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
            toast.textContent = message;

            document.body.appendChild(toast);

            
    // Trigger animasi masuk
    requestAnimationFrame(() => {
        toast.classList.remove('opacity-0', 'translate-y-2');
    });

    // Trigger animasi keluar
    setTimeout(() => {
        toast.classList.add('opacity-0', '-translate-y-2');
    }, 1000);

    // Hapus setelah transisi
    toast.addEventListener('transitionend', () => {
        toast.remove();
    });
}

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();

            // Show flash messages
            const flashMessage = document.getElementById('flashMessage');
            if (flashMessage) {
                setTimeout(() => {
                    flashMessage.classList.remove('translate-x-full');
                }, 100);

                setTimeout(() => {
                    flashMessage.classList.add('translate-x-full');
                    setTimeout(() => {
                        flashMessage.remove();
                    }, 300);
                }, 4000);
            }

            // Scroll bottom navigation 
            // Tambahkan fungsi untuk menangani smooth scroll dari bottom nav jika perlu
        document.querySelectorAll('.fixed.bottom-0 a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
    </script>
</body>
</html>
