@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Edit Hero Section</h2>
            <p class="text-gray-500">Edit banner utama landing page</p>
        </div>
        <a href="{{ route('admin.landing.hero.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
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

    <!-- Edit Form -->
    <div class="bg-white rounded-lg border border-gray-200">
        <form action="{{ route('admin.landing.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6">
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $hero->title) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan judul hero">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="highlight_text" class="block text-sm font-medium text-gray-700 mb-2">Highlight Text</label>
                        <input type="text" id="highlight_text" name="highlight_text" value="{{ old('highlight_text', $hero->highlight_text) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('highlight_text') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Teks yang akan disorot">
                        @error('highlight_text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Deskripsi hero section">{{ old('description', $hero->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button Settings -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="primary_button_text" class="block text-sm font-medium text-gray-700 mb-2">Primary Button Text <span class="text-red-500">*</span></label>
                        <input type="text" id="primary_button_text" name="primary_button_text" value="{{ old('primary_button_text', $hero->primary_button_text) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('primary_button_text') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Teks tombol utama">
                        @error('primary_button_text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="primary_button_url" class="block text-sm font-medium text-gray-700 mb-2">Primary Button URL <span class="text-red-500">*</span></label>
                        <input type="text" id="primary_button_url" name="primary_button_url" value="{{ old('primary_button_url', $hero->primary_button_url) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('primary_button_url') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="URL tombol utama">
                        @error('primary_button_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="secondary_button_text" class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text <span class="text-red-500">*</span></label>
                        <input type="text" id="secondary_button_text" name="secondary_button_text" value="{{ old('secondary_button_text', $hero->secondary_button_text) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('secondary_button_text') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Teks tombol sekunder">
                        @error('secondary_button_text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="secondary_button_url" class="block text-sm font-medium text-gray-700 mb-2">Secondary Button URL <span class="text-red-500">*</span></label>
                        <input type="text" id="secondary_button_url" name="secondary_button_url" value="{{ old('secondary_button_url', $hero->secondary_button_url) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('secondary_button_url') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="URL tombol sekunder">
                        @error('secondary_button_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Statistics</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Stat 1 -->
                        <div class="space-y-4">
                            <div>
                                <label for="stat_1_number" class="block text-sm font-medium text-gray-700 mb-2">Stat 1 Number <span class="text-red-500">*</span></label>
                                <input type="text" id="stat_1_number" name="stat_1_number" value="{{ old('stat_1_number', $hero->stat_1_number) }}" required
                                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('stat_1_number') ? 'border-red-500' : 'border-gray-300' }}"
                                       placeholder="e.g., 1000+">
                                @error('stat_1_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="stat_1_label" class="block text-sm font-medium text-gray-700 mb-2">Stat 1 Label <span class="text-red-500">*</span></label>
                                <input type="text" id="stat_1_label" name="stat_1_label" value="{{ old('stat_1_label', $hero->stat_1_label) }}" required
                                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('stat_1_label') ? 'border-red-500' : 'border-gray-300' }}"
                                       placeholder="Students">
                                @error('stat_1_label')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="space-y-4">
                            <div>
                                <label for="stat_2_number" class="block text-sm font-medium text-gray-700 mb-2">Stat 2 Number <span class="text-red-500">*</span></label>
                                <input type="text" id="stat_2_number" name="stat_2_number" value="{{ old('stat_2_number', $hero->stat_2_number) }}" required
                                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('stat_2_number') ? 'border-red-500' : 'border-gray-300' }}"
                                       placeholder="e.g., 500+">
                                @error('stat_2_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="stat_2_label" class="block text-sm font-medium text-gray-700 mb-2">Stat 2 Label <span class="text-red-500">*</span></label>
                                <input type="text" id="stat_2_label" name="stat_2_label" value="{{ old('stat_2_label', $hero->stat_2_label) }}" required
                                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('stat_2_label') ? 'border-red-500' : 'border-gray-300' }}"
                                       placeholder="Courses">
                                @error('stat_2_label')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="space-y-4">
                            <div>
                                <label for="stat_3_number" class="block text-sm font-medium text-gray-700 mb-2">Stat 3 Number <span class="text-red-500">*</span></label>
                                <input type="text" id="stat_3_number" name="stat_3_number" value="{{ old('stat_3_number', $hero->stat_3_number) }}" required
                                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('stat_3_number') ? 'border-red-500' : 'border-gray-300' }}"
                                       placeholder="e.g., 98%">
                                @error('stat_3_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="stat_3_label" class="block text-sm font-medium text-gray-700 mb-2">Stat 3 Label <span class="text-red-500">*</span></label>
                                <input type="text" id="stat_3_label" name="stat_3_label" value="{{ old('stat_3_label', $hero->stat_3_label) }}" required
                                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('stat_3_label') ? 'border-red-500' : 'border-gray-300' }}"
                                       placeholder="Success Rate">
                                @error('stat_3_label')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Background Image -->
                <div class="border-t pt-6">
                    @if($hero->background_image)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Background Image</label>
                            <img src="{{ asset('storage/' . $hero->background_image) }}" alt="Current background" class="w-48 h-32 object-cover rounded-lg border">
                        </div>
                    @endif
                    <div>
                        <label for="background_image" class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                        <input type="file" id="background_image" name="background_image" accept="image/*"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('background_image') ? 'border-red-500' : 'border-gray-300' }}">
                        @error('background_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Upload gambar background baru untuk hero section (JPG, PNG, max 2MB). Kosongkan jika tidak ingin mengubah.</p>
                    </div>
                </div>

                <!-- Status -->
                <div class="border-t pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $hero->is_active) ? 'checked' : '' }}
                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary/20 focus:ring-2">
                        <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.landing.hero.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Kembali
                </a>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
