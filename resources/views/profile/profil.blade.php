@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Profil Saya</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center space-x-6 mb-6">
        <div>
            @if ($user->avatar)
                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar" class="w-32 h-32 rounded-full">
            @else
                <img src="{{ asset('images/default.png') }}" alt="Avatar Default" class="w-32 h-32 rounded-full">
            @endif
        </div>
        <div>
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Alamat:</strong> {{ $user->address ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('profile.edit') }}" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded">
        Edit Profil
    </a>
</div>
@endsection
