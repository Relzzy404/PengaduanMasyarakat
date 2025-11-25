@extends('warga.layouts.app')

@section('content')

<h1 class="text-3xl font-semibold mb-6">Notifikasi 🔔</h1>

@if($notif->isEmpty())
    <p class="text-gray-500">Belum ada notifikasi.</p>
@else
    @foreach($notif as $n)
        <div class="bg-white border rounded-lg p-5 mb-4 
            {{ $n->is_read ? 'opacity-60' : 'shadow-md' }}">

            <h3 class="font-semibold text-lg">{{ $n->judul }}</h3>
            <p class="text-gray-600 mt-1">{{ $n->pesan }}</p>
            <p class="text-xs text-gray-400 mt-2">{{ $n->created_at->diffForHumans() }}</p>

            @if(!$n->is_read)
            <form action="{{ route('notifikasi.baca', $n->id) }}" method="POST" class="mt-3">
                @csrf
                <button class="text-sm text-blue-600 hover:underline">
                    ✔️ Tandai Sudah Dibaca
                </button>
            </form>
            @endif
        </div>
    @endforeach
@endif

@endsection
