@extends('layouts.app')

@section('title', 'Molen Bagus - Jajanan Tradisional di Bandung')
@section('description', 'Nikmati kelezatan molen, onde-onde, pastel, dan kue soes terbaik di Bandung. Dibuat dengan resep turun temurun dan bahan berkualitas.')

@section('content')
<section class="relative bg-gradient-to-br from-primary-50 to-primary-100 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="container mx-auto px-4 lg:px-8 py-12 lg:py-24 relative z-10"> 
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-gray-900 mb-6 font-poppins leading-tight">
                    Jajanan <span class="text-primary-600">Tradisional</span><br>
                    <span class="text-primary-700">Terbaik</span> di Bandung
                </h1>
                <p class="text-sm sm:text-lg lg:text-sm text-gray-700 mb-8 leading-relaxed">
                    Nikmati kelezatan molen, onde-onde, pastel, dan kue soes yang dibuat dengan resep turun temurun. 
                    Cita rasa autentik dengan kualitas terjamin.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#products" class="bg-primary-600 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-lg font-semibold hover:bg-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Lihat Produk
                    </a>
                    <a href="https://wa.me/6281322818164?text=Halo%20Molen%20Bagus" target="_blank" class="bg-white text-primary-600 px-6 py-3 sm:px-8 sm:py-4 rounded-lg font-semibold hover:bg-gray-50 transition-all duration-300 border-2 border-primary-600">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
                
                <div class="grid grid-cols-3 gap-6 mt-8 pt-6 border-t border-primary-200 sm:mt-12 sm:pt-8">
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-primary-600 font-poppins">1000+</div>
                        <div class="text-xs sm:text-sm text-gray-600">Pelanggan Puas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-primary-600 font-poppins">10+</div>
                        <div class="text-xs sm:text-sm text-gray-600">Varian Rasa</div>
                    </div>
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-primary-600 font-poppins">5★</div>
                        <div class="text-xs sm:text-sm text-gray-600">Rating Pelanggan</div>
                    </div>
                </div>
            </div>
            
            <div class="relative hidden lg:block">
                <div class="relative z-10">
                    <img src="{{ asset('images/logo-bagus.jpg') }}" alt="Molen Bagus" class="w-full max-w-md mx-auto rounded-2xl shadow-2xl">
                </div>
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary-200 rounded-full opacity-50"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-secondary-200 rounded-full opacity-30"></div>
            </div>
        </div>
    </div>
    
    <div class="absolute top-20 left-10 w-16 h-16 bg-primary-300 rounded-full opacity-20 animate-bounce"></div>
    <div class="absolute bottom-20 right-10 w-12 h-12 bg-secondary-300 rounded-full opacity-20 animate-pulse"></div>

</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-xl lg:text-lg font-bold text-gray-900 mb-4 font-poppins">Cara Pemesanan</h2>
            <p class="text-sm text-gray-600 max-w-2xl mx-auto">Pesan dengan mudah melalui berbagai platform yang tersedia</p>
        </div>
        
        {{-- KONTEN CARA PEMESANAN BARU --}}
        <div class="flex overflow-x-auto pb-4 gap-6 no-scrollbar lg:grid lg:grid-cols-6 lg:gap-6 xl:grid-cols-7">
            {{-- Menggunakan loop untuk DRY (Don't Repeat Yourself) --}}
            {{-- (kode @php ... @endphp yang sama seperti sebelumnya) --}}
            @php
                $orderMethods = [
                    ['src' => 'cash.jpg', 'alt' => 'Cash', 'title' => 'Cash', 'desc' => 'Datang Langsung', 'bg' => 'bg-green-100', 'hover_bg' => 'group-hover:bg-green-200', 'link' => 'https://www.google.com/maps/place/Molen+Bagus'],
                    ['src' => 'gfood.png', 'alt' => 'GoFood', 'title' => 'GoFood', 'desc' => 'Pesan Online', 'bg' => 'bg-green-100', 'hover_bg' => 'group-hover:bg-green-200', 'link' => 'https://gofood.co.id/bandung/restaurant/molen-bagus-gegerkalong-girang-d029da02-a2ba-4733-8f91-a44c0ccfb030'],
                    ['src' => 'shopeefood.png', 'alt' => 'ShopeeFood', 'title' => 'ShopeeFood', 'desc' => 'Pesan Online', 'bg' => 'bg-orange-100', 'hover_bg' => 'group-hover:bg-orange-200', 'link' => 'https://shopee.co.id/'],
                    ['src' => 'graabfood.jpg', 'alt' => 'GrabFood', 'title' => 'GrabFood', 'desc' => 'Pesan Online', 'bg' => 'bg-green-100', 'hover_bg' => 'group-hover:bg-green-200', 'link' => 'https://food.grab.com/id/id/'],
                    ['src' => 'maps.jpg', 'alt' => 'Maps', 'title' => 'Lokasi', 'desc' => 'Lihat di Maps', 'bg' => 'bg-blue-100', 'hover_bg' => 'group-hover:bg-blue-200', 'link' => 'https://www.google.com/maps/place/Molen+Bagus'],
                    ['src' => 'wa.jpg', 'alt' => 'WhatsApp', 'title' => 'WhatsApp', 'desc' => 'Chat Langsung', 'bg' => 'bg-green-100', 'hover_bg' => 'group-hover:bg-green-200', 'link' => 'https://wa.me/6281322818164?text=Halo%20Molen%20Bagus'],
                    ['src' => 'ig.jpg', 'alt' => 'Instagram', 'title' => 'Instagram', 'desc' => 'Follow Kami', 'bg' => 'bg-pink-100', 'hover_bg' => 'group-hover:bg-pink-200', 'link' => 'https://www.instagram.com/molen_bagus'],
                ];
            @endphp
            @foreach ($orderMethods as $method)
                <a href="{{ $method['link'] }}" target="_blank" class="group bg-white p-4 sm:p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center flex-none w-32 sm:w-40">
    <div class="w-12 h-12 sm:w-16 sm:h-16 mx-auto mb-3 sm:mb-4 {{ $method['bg'] }} rounded-full flex items-center justify-center {{ $method['hover_bg'] }} transition-colors">
        <img src="{{ asset('images/' . $method['src']) }}" alt="{{ $method['alt'] }}" class="w-8 h-8 sm:w-10 sm:h-10 @if(in_array($method['alt'], ['Cash', 'GrabFood', 'Maps', 'WhatsApp', 'Instagram'])) rounded @endif">
    </div>
    <h3 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">
        {{ $method['title'] }}
    </h3>
    <p class="text-xs sm:text-sm text-gray-600">{{ $method['desc'] }}</p>
</a>
    @endforeach
        </div>
    </div>
</section>

<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="relative">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Cari produk favorit Anda..." 
                    class="w-full px-4 py-3 pl-10 text-base border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent shadow-lg
                           sm:px-6 sm:py-4 sm:pl-12 sm:text-lg"
                >
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
</section>

<section id="products" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4 font-poppins">Produk Kami</h2>
            <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                Berbagai pilihan jajanan tradisional dengan cita rasa yang tak terlupakan
            </p>
        </div>

        <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-12">
            @foreach ([
                'all' => 'Semua Produk',
                'molen' => 'Molen',
                'onde' => 'Onde-onde',
                'pastel' => 'Pastel',
                'soes' => 'Kue Soes'
            ] as $key => $label)
                <button onclick="filterProducts('{{ $key }}')"
                        class="category-btn {{ $key == 'all' ? 'active' : '' }} px-3 py-1.5 text-sm sm:px-5 sm:py-2 sm:text-base rounded-full font-medium transition-all duration-300 bg-gray-100 hover:bg-gray-200">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <div id="productGrid" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 items-center">
            @forelse($products as $product)
                <div class="product-card bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1 overflow-hidden"
                    data-category="{{ $product->category }}">
                    <div class="relative w-full aspect-[4/3] overflow-hidden">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                             class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        <div class="absolute top-2 right-2">
                            <button onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image }}')"
                                    class="bg-primary-600 text-white p-2 rounded-full shadow-md hover:bg-primary-700 transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-4">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1 font-poppins truncate">
                            {{ $product->name }}
                        </h3>
                        <p class="text-gray-600 text-xs sm:text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm sm:text-base font-bold text-primary-600">{{ $product->formatted_price }}</span>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                {{ ucfirst($product->category) }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <p id="noProductsMessage" class="text-center text-gray-500 col-span-full">
                    Tidak ada produk ditemukan.
                </p>
            @endforelse
        </div>
    </div>
</section>

<section id="reviews" class="py-12 sm:py-16 bg-gray-50"> <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-poppins">Ulasan Pelanggan</h2>
            <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">Apa kata pelanggan tentang produk kami</p>
        </div>

        <div class="mb-10 sm:mb-12"> @auth
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('review.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="flex space-x-1 text-2xl text-yellow-400 cursor-pointer" id="ratingStars">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star text-gray-300" data-value="{{ $i }}"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', 0) }}">
                    @error('rating')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <textarea name="content" rows="3" class="w-full p-2 sm:p-3 border rounded text-sm" placeholder="Tulis ulasan Anda...">{{ old('content') }}</textarea> @error('content')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="bg-orange-600 text-white px-5 py-2 rounded hover:bg-orange-300 text-sm"> Kirim Ulasan
                    </button>
                </form>
            @else
                <p class="text-center text-gray-500 text-sm sm:text-base"> <a href="/login" class="text-blue-600 underline">Login</a> terlebih dahulu untuk menulis ulasan.
                </p>
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8"> 
            @forelse ($reviews as $review)
                <div class="bg-white p-4 sm:p-6 rounded-xl shadow"> <div class="flex items-center mb-3 sm:mb-4"> <img src="{{ $review->user->avatar ? asset('storage/avatars/' . $review->user->avatar) : asset('images/default-avatar.png') }}"
                             alt="Avatar {{ $review->user->name }}"
                             class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover mr-3 sm:mr-4 border border-gray-300"> <div>
                            <h4 class="font-semibold text-gray-900 text-sm sm:text-base">{{ $review->user->name }}</h4> <p class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                            <div class="text-yellow-500 text-xs sm:text-sm"> @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star @if($i <= $review->rating) text-yellow-500 @else text-gray-300 @endif"></i>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-700 text-xs sm:text-sm">"{{ $review->content }}"</p> </div>
            @empty
                <p class="text-center text-gray-500 col-span-full text-sm sm:text-base">Belum ada ulasan dari pelanggan.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="contact" class="py-12 sm:py-16 bg-primary-600 text-white"> <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-10 sm:mb-12"> <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 font-poppins">Hubungi Kami</h2>
            <p class="text-base sm:text-lg text-primary-100 max-w-2xl mx-auto">Siap melayani Anda dengan sepenuh hati</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 items-center"> 
            <div>
                <div class="space-y-4 sm:space-y-6"> <div class="flex items-center space-x-3 sm:space-x-4"> <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-lg sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-base sm:text-lg">Alamat</h3>
                            <p class="text-primary-100 text-sm sm:text-base">Jl. Gegerkalong Girang, Bandung, Jawa Barat</p> </div>
                    </div>

                    <div class="flex items-center space-x-3 sm:space-x-4"> <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-phone text-lg sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-base sm:text-lg">Telepon</h3>
                            <p class="text-primary-100 text-sm sm:text-base">+62 813-2281-8164</p> </div>
                    </div>

                    <div class="flex items-center space-x-3 sm:space-x-4"> <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-lg sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-base sm:text-lg">Jam Buka</h3>
                            <p class="text-primary-100 text-sm sm:text-base">Setiap hari: 08.00 - 20.00 WIB</p> </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-8"> <a href="https://wa.me/6281322818164?text=Halo%20Molen%20Bagus" target="_blank" class="inline-flex items-center bg-white text-primary-600 px-6 py-3 sm:px-8 sm:py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-sm sm:text-base">
                        <i class="fab fa-whatsapp mr-2 text-xl"></i>
                        Chat WhatsApp
                    </a>
                </div>
            </div>

            <div class="bg-white bg-opacity-10 p-5 sm:p-8 rounded-2xl"> 
                <h3 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6 font-poppins">Kirim Pesan</h3>
                <form class="space-y-3 sm:space-y-4"> <div>
                        <input type="text" placeholder="Nama Anda" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 text-sm sm:text-base">
                    </div>
                    <div>
                        <input type="email" placeholder="Email Anda" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 text-sm sm:text-base">
                    </div>
                    <div>
                        <textarea rows="4" placeholder="Pesan Anda" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 resize-none text-sm sm:text-base"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-white text-primary-600 py-2.5 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-sm sm:text-base">
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
        /* Untuk tombol non-aktif saat di-hover */
        @apply bg-primary-50 text-primary-700 border-primary-300;
    }

    .category-btn.active:hover {
        /* Untuk tombol aktif saat di-hover */
        @apply bg-primary-700 text-white border-primary-700;
    }
    /* Menghapus media query khusus untuk productGrid dan category-btn karena sudah ditangani Tailwind */
</style>
@endpush

@push('scripts')
<script>
    // Product filtering
    function filterProducts(category) {
        const products = document.querySelectorAll('.product-card');
        const buttons = document.querySelectorAll('.category-btn');

        // Update active button
        // Menggunakan event.currentTarget untuk memastikan elemen yang diklik adalah button itu sendiri
        buttons.forEach(btn => btn.classList.remove('active'));
        // Pastikan `this` dalam event listener adalah tombol itu sendiri jika dipanggil langsung
        // Jika dipanggil dari onclick di Blade, `event.currentTarget` akan berfungsi
        // atau jika Anda ingin lebih eksplisit, bisa menambahkan id ke setiap tombol dan mencarinya
        const clickedButton = Array.from(buttons).find(btn => btn.getAttribute('onclick').includes(`'${category}'`));
        if (clickedButton) {
            clickedButton.classList.add('active');
        }


        // Filter products
        let visibleCount = 0;
        products.forEach(product => {
            if (category === 'all' || product.dataset.category === category) {
                product.style.display = 'block';
                product.style.animation = 'fadeIn 0.5s ease-in-out';
                visibleCount++;
            } else {
                product.style.display = 'none';
                product.style.animation = 'none'; // Reset animation if hidden
            }
        });

        // Tampilkan atau sembunyikan pesan "tidak ada produk"
        const message = document.getElementById('noProductsMessage');
        if (message) {
            message.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }
    
    // Inisialisasi filter 'all' saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        const initialButton = document.querySelector('.category-btn.active');
        if (initialButton) {
             // Simulasi klik untuk memicu filter awal
            filterProducts(initialButton.dataset.category || 'all'); 
        } else {
            // Jika tidak ada yang aktif secara default, set 'all' sebagai aktif
            document.querySelector('.category-btn[onclick*="\'all\'"]').classList.add('active');
            filterProducts('all');
        }
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const products = document.querySelectorAll('.product-card');
        let visibleCount = 0;

        products.forEach(product => {
            const productName = product.querySelector('h3').textContent.toLowerCase();
            const productDescription = product.querySelector('p').textContent.toLowerCase();

            if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                product.style.display = 'block';
                product.style.animation = 'fadeIn 0.5s ease-in-out';
                visibleCount++;
            } else {
                product.style.display = 'none';
                product.style.animation = 'none'; // Reset animation if hidden
            }
        });

        // Tampilkan atau sembunyikan pesan "tidak ada produk" setelah pencarian
        const message = document.getElementById('noProductsMessage');
        if (message) {
            message.style.display = (visibleCount === 0) ? 'block' : 'none';
        }

        // De-activate all category buttons when searching
        document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));
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

    // Rating star functionality
    const stars = document.querySelectorAll('#ratingStars i');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            const val = parseInt(star.dataset.value);
            highlightStars(val);
        });

        star.addEventListener('mouseout', () => {
            highlightStars(parseInt(ratingInput.value));
        });

        star.addEventListener('click', () => {
            ratingInput.value = star.dataset.value;
            highlightStars(parseInt(star.dataset.value));
        });
    });

    function highlightStars(rating) {
        stars.forEach(star => {
            star.classList.toggle('text-yellow-400', star.dataset.value <= rating);
            star.classList.toggle('text-gray-300', star.dataset.value > rating);
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        highlightStars(parseInt(ratingInput.value));
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