@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Edit Rating</h2>
            <p class="text-gray-500">Edit rating dan ulasan keseluruhan</p>
        </div>
        <a href="{{ route('admin.landing.rating.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
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
        <form action="{{ route('admin.landing.rating.update', $rating->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6">
                <!-- Rating Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <input type="text" id="category" name="category" value="{{ old('category', $rating->category) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('category') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., Kualitas Pengajaran, Kepuasan Siswa">
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="rating_value" class="block text-sm font-medium text-gray-700 mb-2">Nilai Rating <span class="text-red-500">*</span></label>
                        <input type="number" id="rating_value" name="rating_value" value="{{ old('rating_value', $rating->rating_value) }}"
                               min="0" max="5" step="0.1" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('rating_value') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., 4.8">
                        @error('rating_value')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Nilai dari 0-5 (dapat menggunakan desimal)</p>
                    </div>
                </div>

                <!-- Review Count -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="total_reviews" class="block text-sm font-medium text-gray-700 mb-2">Total Reviews <span class="text-red-500">*</span></label>
                        <input type="number" id="total_reviews" name="total_reviews" value="{{ old('total_reviews', $rating->total_reviews) }}"
                               min="0" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('total_reviews') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., 1250">
                        @error('total_reviews')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="is_active" name="is_active"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('is_active') ? 'border-red-500' : 'border-gray-300' }}">
                            <option value="1" {{ old('is_active', $rating->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $rating->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('is_active')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Deskripsi tambahan untuk rating ini...">{{ old('description', $rating->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('admin.landing.rating.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Batal
                </a>
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                    Update Rating
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
