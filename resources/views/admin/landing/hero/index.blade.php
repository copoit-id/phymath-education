@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Hero Section</h2>
            <p class="text-gray-500">Kelola banner utama landing page</p>
        </div>
        @if(!$hero)
            <a href="{{ route('admin.landing.hero.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                <i class="ri-add-line"></i> Buat Hero Section
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
            {{ session('info') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if($hero)
        <!-- Hero Content -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $hero->title }}</h3>
                        @if($hero->highlight_text)
                            <p class="text-primary font-medium">{{ $hero->highlight_text }}</p>
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.landing.hero.edit', $hero->id) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                            <i class="ri-edit-line"></i> Edit
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <p class="text-gray-600">{{ $hero->description }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Primary Button</label>
                            <p class="text-gray-600">{{ $hero->primary_button_text }} → {{ $hero->primary_button_url }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Secondary Button</label>
                            <p class="text-gray-600">{{ $hero->secondary_button_text }} → {{ $hero->secondary_button_url }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Statistics</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="text-2xl font-bold text-primary">{{ $hero->stat_1_number }}</div>
                                <div class="text-sm text-gray-600">{{ $hero->stat_1_label }}</div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="text-2xl font-bold text-primary">{{ $hero->stat_2_number }}</div>
                                <div class="text-sm text-gray-600">{{ $hero->stat_2_label }}</div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <div class="text-2xl font-bold text-primary">{{ $hero->stat_3_number }}</div>
                                <div class="text-sm text-gray-600">{{ $hero->stat_3_label }}</div>
                            </div>
                        </div>
                    </div>

                    @if($hero->background_image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                            <img src="{{ asset('storage/' . $hero->background_image) }}" alt="Background" class="w-full h-48 object-cover rounded-lg">
                        </div>
                    @endif

                    <div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $hero->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $hero->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-lg border border-gray-200 p-8">
            <div class="text-center">
                <i class="ri-image-add-line text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada Hero Section</h3>
                <p class="text-gray-500 mb-4">Buat hero section untuk menampilkan banner utama di landing page</p>
                <a href="{{ route('admin.landing.hero.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-add-line"></i> Buat Hero Section
                </a>
            </div>
        </div>
    @endif

    <!-- Back Button -->
    <div>
        <a href="{{ route('admin.landing.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
            <i class="ri-arrow-left-line"></i> Kembali ke Landing Management
        </a>
    </div>
</div>
@endsection
