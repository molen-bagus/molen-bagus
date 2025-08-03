@extends('admin.layouts.app')

@section('title', 'Kelola Produk - Admin Panel')
@section('page-title', 'Kelola Produk')
@section('page-description', 'Daftar semua produk Molen Bagus')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="px-4 sm:px-6 py-4 border-b border-gray-200"> <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-base sm:text-lg font-medium text-gray-900">Daftar Produk</h3> <p class="mt-1 text-sm text-gray-600">Kelola semua produk yang tersedia</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.products.create') }}" 
                   class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors"> <i class="fas fa-plus mr-2"></i>
                    Tambah Produk
                </a>
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200"> <form method="GET" action="{{ route('admin.products.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Produk</label>
                <input type="text" 
                       name="search" 
                       id="search"
                       value="{{ request('search') }}"
                       placeholder="Nama atau deskripsi..."
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-sm"> </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category" 
                         id="category"
                         class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-sm"> <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" 
                         id="status"
                         class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-sm"> <option value="">Semua Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div class="flex items-end space-x-2">
                <button type="submit" 
                        class="px-3 py-2 sm:px-4 sm:py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors"> <i class="fas fa-search mr-1"></i>
                    Filter
                </button>
                <a href="{{ route('admin.products.index') }}" 
                   class="px-3 py-2 sm:px-4 sm:py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors"> <i class="fas fa-times mr-1"></i>
                    Reset
                </a>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto"> <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th> <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th> <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th> <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th> <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dibuat</th> <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th> </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 whitespace-nowrap"> <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12 sm:h-16 sm:w-16"> <img class="h-12 w-12 sm:h-16 sm:w-16 rounded-lg object-cover" 
                                         src="{{ asset($product->image) }}" 
                                         alt="{{ $product->name }}">
                                </div>
                                <div class="ml-3 sm:ml-4"> <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                    <div class="text-xs text-gray-500">{{ Str::limit($product->description, 30) }}</div> </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap"> <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ ucfirst($product->category) }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900"> {{ $product->formatted_price }}
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap"> @if($product->is_active)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500"> {{ $product->created_at->format('d M Y') }}
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium"> <div class="flex items-center justify-end space-x-1 sm:space-x-2"> <a href="{{ route('admin.products.show', $product) }}" 
                                   class="text-blue-600 hover:text-blue-900 transition-colors p-1 sm:p-0"> <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 transition-colors p-1 sm:p-0"> <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" 
                                        method="POST" 
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 transition-colors p-1 sm:p-0"> <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center"> <div class="text-gray-500">
                                <i class="fas fa-box-open text-3xl mb-3"></i> <p class="text-base font-medium">Tidak ada produk ditemukan</p> <p class="text-xs">Mulai dengan menambahkan produk baru</p> <a href="{{ route('admin.products.create') }}" 
                                   class="inline-flex items-center mt-3 px-3 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors"> <i class="fas fa-plus mr-2"></i>
                                    Tambah Produk Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
        <div class="px-4 py-3 border-t border-gray-200"> {{ $products->links() }}
        </div>
    @endif
</div>
@endsection