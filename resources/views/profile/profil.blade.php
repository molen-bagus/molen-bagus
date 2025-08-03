@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-xl mx-auto px-4 sm:px-6 py-6 sm:py-10"> <!-- Padding horisontal dan vertikal disesuaikan -->
    <h1 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Profil Saya</h1> <!-- Ukuran teks disesuaikan -->

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm"> <!-- Ukuran teks disesuaikan -->
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 space-x-0 sm:space-x-6 mb-6"> <!-- Layout disesuaikan untuk mobile -->
        <div>
            @if ($user->avatar)
                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Foto Profi" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover"> <!-- Ukuran gambar disesuaikan -->
            @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="Foto Profil Default" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover"> <!-- Ukuran gambar disesuaikan -->
            @endif
        </div>
        <div class="text-center sm:text-left"> <!-- Penyesuaian rata tengah untuk mobile -->
            <p class="text-sm sm:text-base mb-1"><strong>Nama:</strong> {{ $user->name }}</p> <!-- Ukuran teks disesuaikan -->
            <p class="text-sm sm:text-base mb-1"><strong>Email:</strong> {{ $user->email }}</p> <!-- Ukuran teks disesuaikan -->
            <p class="text-sm sm:text-base"><strong>Alamat:</strong> {{ $user->address ?? '-' }}</p> <!-- Ukuran teks disesuaikan -->
        </div>
    </div>

    <a href="{{ route('profile.edit') }}" class="w-full sm:w-auto text-center inline-block bg-primary-600 hover:bg-primary-700 text-white font-semibold px-5 py-2 rounded-lg text-sm sm:text-base"> <!-- Ukuran tombol disesuaikan -->
        Edit Profil
    </a>
</div>
@endsection