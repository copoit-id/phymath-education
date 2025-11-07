@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold">Tambah FAQ</h2>
            <p class="text-gray-500">Masukkan pertanyaan yang sering ditanyakan pengguna</p>
        </div>
        <a href="{{ route('admin.landing.faq.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors inline-flex items-center gap-2">
            <i class="ri-arrow-left-line"></i> Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Form -->
    <div class="bg-white rounded-lg border border-gray-200">
        <form action="{{ route('admin.landing.faq.store') }}" method="POST">
            @csrf
            <div class="p-6 space-y-6">
                <div>
                    <label for="question" class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                    <input type="text" id="question" name="question" value="{{ old('question') }}" required
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('question') ? 'border-red-500' : 'border-gray-300' }}"
                           placeholder="Masukkan pertanyaan">
                    @error('question')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="answer" class="block text-sm font-medium text-gray-700 mb-2">Jawaban <span class="text-red-500">*</span></label>
                    <textarea id="answer" name="answer" rows="5" required
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('answer') ? 'border-red-500' : 'border-gray-300' }}"
                              placeholder="Masukkan jawaban untuk pertanyaan ini">{{ old('answer') }}</textarea>
                    @error('answer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', 0) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('order') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Urutan tampil pertanyaan">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="is_active" name="is_active"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary {{ $errors->has('is_active') ? 'border-red-500' : 'border-gray-300' }}">
                            <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('is_active')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('admin.landing.faq.index') }}"
                   class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                    Simpan FAQ
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
