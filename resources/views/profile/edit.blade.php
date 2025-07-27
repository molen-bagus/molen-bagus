@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Edit Profil</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($user->avatar)
    <div class="mb-4">
        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" 
             alt="Foto Profil" 
             class="w-32 h-32 rounded-full object-cover">
    </div>
@endif


    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Alamat</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="w-full border rounded px-3 py-2">
            @error('address')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Foto Profil</label>
            <input type="file" name="avatar" class="w-full border rounded px-3 py-2">
            @error('avatar')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded">
                Simpan Perubahan
            </button>
            <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>
@endsection
