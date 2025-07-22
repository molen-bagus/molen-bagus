@extends('admin.layouts.app')

@section('title', 'Detail Produk - Admin Panel')
@section('page-title', 'Detail Produk')
@section('page-description', 'Informasi lengkap produk ' . $product->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Detail Produk</h3>
                    <p class="mt-1 text-sm text-gray-600">Informasi lengkap produk {{ $product->name }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.products.edit', $product) }}" 
                       class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-lg hover:bg-yellow-700 transition-colors">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.products.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Column - Image -->
                <div>
                    <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                        <img src="{{ asset($product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Right Column - Details -->
                <div class="space-y-6">
                    <!-- Basic Info -->
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="text-3xl font-bold text-primary-600">{{ $product->formatted_price }}</span>
                            @if($product->is_active)
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Tidak Aktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Kategori</h3>
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ ucfirst($product->category) }}
                        </span>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Deskripsi</h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $product->description ?: 'Tidak ada deskripsi tersedia.' }}
                        </p>
                    </div>

                    <!-- Metadata -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-4">Informasi Tambahan</h3>
                        <dl class="grid grid-cols-1 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ID Produk</dt>
                                <dd class="text-sm text-gray-900">#{{ $product->id }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tanggal Dibuat</dt>
                                <dd class="text-sm text-gray-900">{{ $product->created_at->format('d F Y, H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Terakhir Diperbarui</dt>
                                <dd class="text-sm text-gray-900">{{ $product->updated_at->format('d F Y, H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Produk ini {{ $product->is_active ? 'dapat dilihat' : 'tidak dapat dilihat' }} oleh pelanggan
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.products.edit', $product) }}" 
                       class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-lg hover:bg-yellow-700 transition-colors">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Produk
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus Produk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info Cards -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Quick Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-eye text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Status Tampil</p>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $product->is_active ? 'Terlihat' : 'Tersembunyi' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-tag text-green-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Kategori</p>
                    <p class="text-lg font-semibold text-gray-900">{{ ucfirst($product->category) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar text-yellow-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Dibuat</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $product->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
