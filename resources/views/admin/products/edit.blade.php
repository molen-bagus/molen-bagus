@extends('admin.layouts.app')

@section('title', 'Edit Produk - Admin Panel')
@section('page-title', 'Edit Produk')
@section('page-description', 'Edit informasi produk ' . $product->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200"> <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base sm:text-lg font-medium text-gray-900">Form Edit Produk</h3> <p class="mt-1 text-sm text-gray-600">Edit informasi produk: {{ $product->name }}</p>
                </div>
                <a href="{{ route('admin.products.index') }}" 
                   class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors"> <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6"> @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6"> <div class="space-y-4 sm:space-y-6"> <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               value="{{ old('name', $product->name) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('name') border-red-500 @enderror text-sm"
                               placeholder="Masukkan nama produk"> @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Harga <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-gray-500 text-sm">Rp</span> <input type="number" 
                                   name="price" 
                                   id="price"
                                   value="{{ old('price', $product->price) }}"
                                   required
                                   min="0"
                                   step="0.01"
                                   class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('price') border-red-500 @enderror text-sm"
                                   placeholder="0"> </div>
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category" id="category" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-sm @error('category') border-red-500 @enderror"> <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $product->category) == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   id="is_active"
                                   value="1"
                                   {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 text-sm text-gray-700">
                                Produk aktif dan dapat dilihat pelanggan
                            </label>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 sm:space-y-6"> <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                        <div class="mb-4">
                            <img src="{{ asset($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="h-24 w-24 sm:h-32 sm:w-32 object-cover rounded-lg border border-gray-300">
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Ganti Gambar Produk
                        </label>
                        <div class="mt-1 flex justify-center px-4 pt-4 pb-4 sm:px-6 sm:pt-5 sm:pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <div id="imagePreview" class="hidden">
                                    <img id="previewImg" src="" alt="Preview" class="mx-auto h-24 w-24 sm:h-32 sm:w-32 object-cover rounded-lg"> </div>
                                <div id="uploadPlaceholder">
                                    <i class="fas fa-cloud-upload-alt text-3xl sm:text-4xl text-gray-400"></i> <div class="flex text-sm text-gray-600">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                            <span>Upload gambar baru</span>
                                            <input id="image" 
                                                   name="image" 
                                                   type="file" 
                                                   accept="image/*"
                                                   class="sr-only"
                                                   onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                    <p class="text-xs text-gray-400">Kosongkan jika tidak ingin mengganti gambar</p>
                                </div>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Produk
                        </label>
                        <textarea name="description" 
                                  id="description"
                                  rows="6"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('description') border-red-500 @enderror text-sm"
                                  placeholder="Masukkan deskripsi produk...">{{ old('description', $product->description) }}</textarea> @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-4 sm:mt-8 sm:pt-6 border-t border-gray-200"> <div class="flex items-center justify-end space-x-3 sm:space-x-4"> <a href="{{ route('admin.products.index') }}" 
                       class="px-5 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors"> Batal
                    </a>
                    <button type="submit" 
                            class="px-5 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors"> <i class="fas fa-save mr-2"></i>
                        Update Produk
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
                document.getElementById('uploadPlaceholder').classList.add('hidden');
            }
            reader.readAsDataURL(file);
        } else { // Jika input dikosongkan (file dihapus)
            document.getElementById('previewImg').src = "";
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('uploadPlaceholder').classList.remove('hidden');
        }
    }

    // Initialize preview if an image already exists (for edit page)
    document.addEventListener('DOMContentLoaded', function() {
        const currentImageSrc = "{{ asset($product->image) }}";
        if (currentImageSrc && currentImageSrc !== "{{ asset('') }}") { // Check if a real image path exists
            document.getElementById('previewImg').src = currentImageSrc;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('uploadPlaceholder').classList.add('hidden');
        }
    });
</script>
@endpush
@endsection