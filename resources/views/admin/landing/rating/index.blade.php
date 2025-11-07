@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Rating Keseluruhan</h2>
            <p class="text-gray-500">Kelola rating dan ulasan keseluruhan</p>
        </div>
        @if($rating)
            <a href="{{ route('admin.landing.rating.edit', $rating->id) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                <i class="ri-edit-line"></i> Edit Rating
            </a>
        @else
            <a href="{{ route('admin.landing.rating.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                <i class="ri-add-line"></i> Tambah Rating
            </a>
        @endif
    </div>

    @foreach ([
        'success' => 'bg-green-100 border border-green-400 text-green-800',
        'info' => 'bg-blue-100 border border-blue-400 text-blue-800',
        'error' => 'bg-red-100 border border-red-400 text-red-800',
    ] as $type => $classes)
        @if (session($type))
            <div class="{{ $classes }} px-4 py-3 rounded">
                {{ session($type) }}
            </div>
        @endif
    @endforeach

    @if($rating)
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <p class="text-sm text-gray-500">Kategori</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $rating->category }}</h3>
                        <p class="text-gray-600 mt-2">{{ $rating->description ?: 'Tidak ada deskripsi' }}</p>
                    </div>
                    <div class="flex gap-12">
                        <div class="text-center">
                            <p class="text-sm text-gray-500">Rating</p>
                            <div class="text-3xl font-bold text-primary flex items-center justify-center gap-1">
                                <span>{{ number_format($rating->rating_value, 1) }}</span>
                                <span class="text-yellow-400">★</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-gray-500">Total Reviews</p>
                            <div class="text-3xl font-bold text-gray-900">{{ number_format($rating->total_reviews) }}</div>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-gray-500">Status</p>
                            <span class="px-3 py-1 inline-block text-sm font-semibold rounded-full {{ $rating->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $rating->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('admin.landing.rating.edit', $rating->id) }}"
                        class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                        <i class="ri-edit-line"></i> Edit Rating
                    </a>

                    <form action="{{ route('admin.landing.rating.destroy', $rating->id) }}" method="POST" onsubmit="return confirm('Hapus rating ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors inline-flex items-center gap-2">
                            <i class="ri-delete-bin-line"></i> Hapus Rating
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg border border-dashed border-gray-300 p-10 text-center">
            <div class="flex flex-col items-center gap-3">
                <i class="ri-star-smile-line text-4xl text-primary"></i>
                <p class="text-gray-600">Belum ada data rating keseluruhan.</p>
                <a href="{{ route('admin.landing.rating.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-add-line"></i> Tambah Rating
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
