@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Edit Subject</h2>
            <p class="text-gray-500">Edit mata pelajaran</p>
        </div>
        <a href="{{ route('admin.landing.subject.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
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
        <form action="{{ route('admin.landing.subject.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6">
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $subject->title) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan judul mata pelajaran">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                        <input type="text" id="icon" name="icon" value="{{ old('icon', $subject->icon) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('icon') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., ri-calculator-line">
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Gunakan icon dari Remix Icon (e.g., ri-calculator-line, ri-flask-line)</p>
                    </div>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('image') ? 'border-red-500' : 'border-gray-300' }}">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if($subject->image)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Current image:</p>
                            <img src="{{ asset('storage/' . $subject->image) }}" alt="{{ $subject->title }}" class="mt-1 h-20 w-20 object-cover rounded-lg border border-gray-200">
                        </div>
                    @endif
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $subject->order) }}"
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('order') ? 'border-red-500' : 'border-gray-300' }}"
                           placeholder="Urutan tampil (opsional)">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Deskripsi mata pelajaran">{{ old('description', $subject->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="border-t pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $subject->is_active) ? 'checked' : '' }}
                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary/20 focus:ring-2">
                        <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.landing.subject.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
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
