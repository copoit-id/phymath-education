@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Tambah Why Us</h2>
            <p class="text-gray-500">Tambah keunggulan dan alasan memilih layanan</p>
        </div>
        <a href="{{ route('admin.landing.whyus.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
            <i class="ri-arrow-left-line"></i> Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Form -->
    <div class="bg-white rounded-lg border border-gray-200">
        <form action="{{ route('admin.landing.whyus.store') }}" method="POST">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan judul keunggulan">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon <span class="text-red-500">*</span></label>
                        <input type="text" id="icon" name="icon" value="{{ old('icon') }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('icon') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., ri-star-line">
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Gunakan icon dari Remix Icon (e.g., ri-star-line, ri-shield-check-line)</p>
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Deskripsi singkat section Why Us">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="card_title" class="block text-sm font-medium text-gray-700 mb-2">Card Title <span class="text-red-500">*</span></label>
                        <input type="text" id="card_title" name="card_title" value="{{ old('card_title') }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('card_title') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Judul pada kartu (contoh: Metode AI-Powered)">
                        @error('card_title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order') }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('order') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Urutan tampil (opsional)">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="card_description" class="block text-sm font-medium text-gray-700 mb-2">Card Description <span class="text-red-500">*</span></label>
                    <textarea id="card_description" name="card_description" rows="4" required
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('card_description') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Deskripsi detail yang tampil pada kartu">{{ old('card_description') }}</textarea>
                    @error('card_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="border-t pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary/20 focus:ring-2">
                        <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.landing.whyus.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Kembali
                </a>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
