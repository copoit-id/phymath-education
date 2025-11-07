@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Edit Testimony</h2>
            <p class="text-gray-500">Edit testimoni pengguna</p>
        </div>
        <a href="{{ route('admin.landing.testimony.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
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
        <form action="{{ route('admin.landing.testimony.update', $testimony->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6">
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name', $testimony->name) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan nama customer">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="school" class="block text-sm font-medium text-gray-700 mb-2">Sekolah / Posisi <span class="text-red-500">*</span></label>
                        <input type="text" id="school" name="school" value="{{ old('school', $testimony->school) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('school') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Contoh: SMA 1 Jakarta, Orang Tua Siswa, dll">
                        @error('school')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Testimonial <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="4" required
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('message') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Masukkan testimoni customer">{{ old('message', $testimony->message) }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating <span class="text-red-500">*</span></label>
                    <select id="rating" name="rating" required
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('rating') ? 'border-red-500' : 'border-gray-300' }}">
                        <option value="">Pilih Rating</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating', $testimony->rating) == $i ? 'selected' : '' }}>
                                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>
                    @error('rating')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo -->
                <div>
                    @if($testimony->photo)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Photo</label>
                            <img src="{{ asset('storage/' . $testimony->photo) }}" alt="{{ $testimony->name }}" class="w-24 h-24 rounded-full object-cover border">
                        </div>
                    @endif
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/*"
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('photo') ? 'border-red-500' : 'border-gray-300' }}">
                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Upload foto customer baru (JPG, PNG, max 2MB). Kosongkan jika tidak ingin mengubah.</p>
                </div>

                <!-- Status -->
                <div class="border-t pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $testimony->is_active) ? 'checked' : '' }}
                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary/20 focus:ring-2">
                        <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.landing.testimony.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
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
