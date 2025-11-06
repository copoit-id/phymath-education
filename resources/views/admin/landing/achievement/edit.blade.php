@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Edit Pencapaian Siswa</h2>
            <p class="text-gray-500">Edit pencapaian terbaru siswa</p>
        </div>
        <a href="{{ route('admin.landing.achievement.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
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
        <form action="{{ route('admin.landing.achievement.update', $achievement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6">
                <!-- Student Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="student_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa <span class="text-red-500">*</span></label>
                        <input type="text" id="student_name" name="student_name" value="{{ old('student_name', $achievement->student_name) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('student_name') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan nama siswa">
                        @error('student_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="achievement" class="block text-sm font-medium text-gray-700 mb-2">Judul Pencapaian <span class="text-red-500">*</span></label>
                        <input type="text" id="achievement" name="achievement" value="{{ old('achievement', $achievement->achievement) }}" required
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('achievement') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., Juara 1 Olimpiade Matematika">
                        @error('achievement')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Achievement Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="before_score" class="block text-sm font-medium text-gray-700 mb-2">Skor Sebelum</label>
                        <input type="text" id="before_score" name="before_score" value="{{ old('before_score', $achievement->before_score) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('before_score') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., 70">
                        @error('before_score')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="after_score" class="block text-sm font-medium text-gray-700 mb-2">Skor Sesudah</label>
                        <input type="text" id="after_score" name="after_score" value="{{ old('after_score', $achievement->after_score) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('after_score') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., 95">
                        @error('after_score')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Additional Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="school" class="block text-sm font-medium text-gray-700 mb-2">Sekolah/Institusi</label>
                        <input type="text" id="school" name="school" value="{{ old('school', $achievement->school) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('school') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., SMA Negeri 1 Jakarta">
                        @error('school')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="improvement" class="block text-sm font-medium text-gray-700 mb-2">Peningkatan</label>
                        <input type="text" id="improvement" name="improvement" value="{{ old('improvement', $achievement->improvement) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('improvement') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="e.g., +25 poin, 35% lebih baik">
                        @error('improvement')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Jelaskan pencapaian ini lebih detail...">{{ old('description', $achievement->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="is_active" name="is_active"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('is_active') ? 'border-red-500' : 'border-gray-300' }}">
                        <option value="1" {{ old('is_active', $achievement->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $achievement->is_active) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('is_active')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('admin.landing.achievement.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Batal
                </a>
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                    Update Pencapaian
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
