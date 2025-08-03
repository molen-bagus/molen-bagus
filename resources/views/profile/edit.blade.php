@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-xl mx-auto px-4 sm:px-6 py-6 sm:py-10"> <h1 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Edit Profil</h1> @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-sm"> {{ session('success') }}
        </div>
    @endif

    @if ($user->avatar)
    <div class="mb-4">
        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" 
             alt="Foto Profil" 
             class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover"> </div>
    @endif


    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4 sm:space-y-6"> @csrf

        <div>
            <label class="block font-semibold mb-1 text-sm text-gray-700">Nama</label> <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2 text-sm"> @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1 text-sm text-gray-700">Alamat</label> <input type="text" name="address" value="{{ old('address', $user->address) }}" class="w-full border rounded px-3 py-2 text-sm"> @error('address')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1 text-sm text-gray-700">Foto Profil</label> <input type="file" name="avatar" class="w-full border rounded px-3 py-2 text-sm"> @error('avatar')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col-reverse sm:flex-row justify-between items-center space-y-3 sm:space-y-0 space-x-0 sm:space-x-4 pt-2 sm:pt-0"> <a href="{{ url()->previous() }}" class="text-sm sm:text-base text-gray-600 hover:underline">Kembali</a> <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-4 py-2 sm:px-6 sm:py-3 rounded-lg text-sm sm:text-base"> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection