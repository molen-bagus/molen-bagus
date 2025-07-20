@extends('layouts.app')

@section('title', 'Molen Bagus - Jajanan Tradisional Terbaik di Bandung')
@section('description', 'Nikmati kelezatan molen, onde-onde, pastel, dan kue soes terbaik di Bandung. Dibuat dengan resep turun temurun dan bahan berkualitas.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary-50 to-primary-100 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="text-center lg:text-left">
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6 font-poppins leading-tight">
                    Jajanan <span class="text-primary-600">Tradisional</span><br>
                    <span class="text-primary-700">Terbaik</span> di Bandung
                </h1>
                <p class="text-lg lg:text-xl text-gray-700 mb-8 leading-relaxed">
                    Nikmati kelezatan molen, onde-onde, pastel, dan kue soes yang dibuat dengan resep turun temurun. 
                    Cita rasa autentik dengan kualitas terjamin.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#products" class="bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Lihat Produk
                    </a>
                    <a href="https://wa.me/6281322818164?text=Halo%20Molen%20Bagus" target="_blank" class="bg-white text-primary-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-50 transition-all duration-300 border-2 border-primary-600">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-primary-200">
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary-600 font-poppins">1000+</div>
                        <div class="text-sm text-gray-600">Pelanggan Puas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary-600 font-poppins">10+</div>
                        <div class="text-sm text-gray-600">Varian Rasa</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary-600 font-poppins">5★</div>
                        <div class="text-sm text-gray-600">Rating Pelanggan</div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image -->
            <div class="relative">
                <div class="relative z-10">
                    <img src="{{ asset('images/logo-bagus.jpg') }}" alt="Molen Bagus" class="w-full max-w-md mx-auto rounded-2xl shadow-2xl">
                </div>
                <!-- Decorative elements -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary-200 rounded-full opacity-50"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-secondary-200 rounded-full opacity-30"></div>
            </div>
        </div>
    </div>
    
    <!-- Floating elements -->
    <div class="absolute top-20 left-10 w-16 h-16 bg-primary-300 rounded-full opacity-20 animate-bounce"></div>
    <div class="absolute bottom-20 right-10 w-12 h-12 bg-secondary-300 rounded-full opacity-20 animate-pulse"></div>
</section>

<!-- Order Methods Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-poppins">Cara Pemesanan</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pesan dengan mudah melalui berbagai platform yang tersedia</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-6">
            <!-- Cash/Outlet -->
            <a href="https://www.google.com/maps/place/Molen+Bagus" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <img src="{{ asset('images/cash.jpg') }}" alt="Cash" class="w-10 h-10 rounded">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Cash</h3>
                <p class="text-sm text-gray-600">Datang Langsung</p>
            </a>
            
            <!-- GoFood -->
            <a href="https://gofood.co.id/bandung/restaurant/molen-bagus-gegerkalong-girang-d029da02-a2ba-4733-8f91-a44c0ccfb030" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <img src="{{ asset('images/gfood.png') }}" alt="GoFood" class="w-10 h-10">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">GoFood</h3>
                <p class="text-sm text-gray-600">Pesan Online</p>
            </a>
            
            <!-- ShopeeFood -->
            <a href="https://shopee.co.id/" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                    <img src="{{ asset('images/shopeefood.png') }}" alt="ShopeeFood" class="w-10 h-10">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">ShopeeFood</h3>
                <p class="text-sm text-gray-600">Pesan Online</p>
            </a>
            
            <!-- GrabFood -->
            <a href="https://food.grab.com/id/id/" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <img src="{{ asset('images/graabfood.jpg') }}" alt="GrabFood" class="w-10 h-10 rounded">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">GrabFood</h3>
                <p class="text-sm text-gray-600">Pesan Online</p>
            </a>
            
            <!-- Maps -->
            <a href="https://www.google.com/maps/place/Molen+Bagus" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                    <img src="{{ asset('images/maps.jpg') }}" alt="Maps" class="w-10 h-10 rounded">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Lokasi</h3>
                <p class="text-sm text-gray-600">Lihat di Maps</p>
            </a>
            
            <!-- WhatsApp -->
            <a href="https://wa.me/6281322818164?text=Halo%20Molen%20Bagus" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <img src="{{ asset('images/wa.jpg') }}" alt="WhatsApp" class="w-10 h-10 rounded">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">WhatsApp</h3>
                <p class="text-sm text-gray-600">Chat Langsung</p>
            </a>
            
            <!-- Instagram -->
            <a href="https://www.instagram.com/molen_bagus" target="_blank" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-pink-100 rounded-full flex items-center justify-center group-hover:bg-pink-200 transition-colors">
                    <img src="{{ asset('images/ig.jpg') }}" alt="Instagram" class="w-10 h-10 rounded">
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Instagram</h3>
                <p class="text-sm text-gray-600">Follow Kami</p>
            </a>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="relative">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Cari produk favorit Anda..." 
                    class="w-full px-6 py-4 pl-12 text-lg border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent shadow-lg"
                >
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="py-16 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-poppins">Produk Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Berbagai pilihan jajanan tradisional dengan cita rasa yang tak terlupakan</p>
        </div>
        
        <!-- Category Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button onclick="filterProducts('all')" class="category-btn active px-6 py-3 rounded-full font-medium transition-all duration-300">
                Semua Produk
            </button>
            <button onclick="filterProducts('molen')" class="category-btn px-6 py-3 rounded-full font-medium transition-all duration-300">
                Molen
            </button>
            <button onclick="filterProducts('onde')" class="category-btn px-6 py-3 rounded-full font-medium transition-all duration-300">
                Onde-onde
            </button>
            <button onclick="filterProducts('pastel')" class="category-btn px-6 py-3 rounded-full font-medium transition-all duration-300">
                Pastel
            </button>
            <button onclick="filterProducts('soes')" class="category-btn px-6 py-3 rounded-full font-medium transition-all duration-300">
                Kue Soes
            </button>
        </div>
        
        <!-- Products Grid -->
        <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden" data-category="{{ $product->category }}">
                <div class="relative overflow-hidden">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">
                    <div class="absolute top-4 right-4">
                        <button onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image }}')" class="bg-primary-600 text-white p-3 rounded-full shadow-lg hover:bg-primary-700 transition-colors">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 font-poppins">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $product->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-primary-600">{{ $product->formatted_price }}</span>
                        <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ ucfirst($product->category) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section id="reviews" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-poppins">Ulasan Pelanggan</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Apa kata pelanggan tentang produk kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Review cards will be loaded here -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('pelanggan/D.png') }}" alt="Dian Permatasari" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">Dian Permatasari</h4>
                        <div class="text-yellow-500">★★★★☆</div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Enak molen pisangnya. Kalau bisa harganya balik ke awal."</p>
                <p class="text-xs text-gray-400 mt-2">2 tahun yang lalu</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('pelanggan/N.png') }}" alt="Neneng Rahayu" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">Neneng Rahayu</h4>
                        <div class="text-yellow-500">★★★★☆</div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Baru nyoba sekali .. enak onde nya renyah"</p>
                <p class="text-xs text-gray-400 mt-2">3 tahun yang lalu</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('pelanggan/R.png') }}" alt="Regina Kumakauw" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">Regina Kumakauw</h4>
                        <div class="text-yellow-500">★★★★★</div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"INI ENAKKKKK murah lagi, aa molen plss buka di antapani"</p>
                <p class="text-xs text-gray-400 mt-2">1 bulan yang lalu</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('pelanggan/RA.png') }}" alt="Rahila Adhien" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">Rahila Adhien</h4>
                        <div class="text-yellow-500">★★★★★</div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Pelayanan ramah, rasa mantap!"</p>
                <p class="text-xs text-gray-400 mt-2">4 tahun yang lalu</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-primary-600 text-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4 font-poppins">Hubungi Kami</h2>
            <p class="text-lg text-primary-100 max-w-2xl mx-auto">Siap melayani Anda dengan sepenuh hati</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Alamat</h3>
                            <p class="text-primary-100">Jl. Gegerkalong Girang, Bandung, Jawa Barat</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-phone text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Telepon</h3>
                            <p class="text-primary-100">+62 813-2281-8164</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Jam Buka</h3>
                            <p class="text-primary-100">Setiap hari: 08.00 - 20.00 WIB</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="https://wa.me/6281322818164?text=Halo%20Molen%20Bagus" target="_blank" class="inline-flex items-center bg-white text-primary-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        <i class="fab fa-whatsapp mr-2 text-xl"></i>
                        Chat WhatsApp
                    </a>
                </div>
            </div>

            <div class="bg-white bg-opacity-10 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold mb-6 font-poppins">Kirim Pesan</h3>
                <form class="space-y-4">
                    <div>
                        <input type="text" placeholder="Nama Anda" class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                    </div>
                    <div>
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                    </div>
                    <div>
                        <textarea rows="4" placeholder="Pesan Anda" class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-white text-primary-600 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .category-btn {
        @apply bg-white text-gray-700 border border-gray-300;
    }

    .category-btn.active {
        @apply bg-primary-600 text-white border-primary-600;
    }

    .category-btn:hover {
        @apply bg-primary-50 text-primary-700 border-primary-300;
    }

    .category-btn.active:hover {
        @apply bg-primary-700 text-white border-primary-700;
    }
</style>
@endpush

@push('scripts')
<script>
    // Product filtering
    function filterProducts(category) {
        const products = document.querySelectorAll('.product-card');
        const buttons = document.querySelectorAll('.category-btn');

        // Update active button
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Filter products
        products.forEach(product => {
            if (category === 'all' || product.dataset.category === category) {
                product.style.display = 'block';
                product.style.animation = 'fadeIn 0.5s ease-in-out';
            } else {
                product.style.display = 'none';
            }
        });
    }

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const products = document.querySelectorAll('.product-card');

        products.forEach(product => {
            const productName = product.querySelector('h3').textContent.toLowerCase();
            const productDescription = product.querySelector('p').textContent.toLowerCase();

            if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
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

    // Add fade-in animation keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
</script>
@endpush
