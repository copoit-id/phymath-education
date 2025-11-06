@extends('admin.layout.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div>
        <h2 class="text-2xl font-bold">Landing Page Management</h2>
        <p class="text-gray-500">Kelola semua konten landing page dengan mudah</p>
    </div>

    <!-- Management Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Hero Section -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-home-4-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Hero Section</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola banner utama, judul, deskripsi, dan statistik</p>
                <a href="{{ route('admin.landing.hero.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-thumb-up-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Why Choose Us</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola alasan memilih platform kami</p>
                <a href="{{ route('admin.landing.whyus.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Subjects -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-book-open-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Mata Pelajaran</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola daftar mata pelajaran unggulan</p>
                <a href="{{ route('admin.landing.subject.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Testimonies -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-chat-quote-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Testimoni</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola testimoni dari siswa dan orang tua</p>
                <a href="{{ route('admin.landing.testimony.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- FAQ -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-question-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">FAQ</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola pertanyaan yang sering ditanyakan</p>
                <a href="{{ route('admin.landing.faq.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Contact -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-contacts-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Kontak</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola informasi kontak perusahaan</p>
                <a href="{{ route('admin.landing.contact.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Methods (Metode Pembelajaran) -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-lightbulb-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Metode Pembelajaran</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola metode pembelajaran terdepan</p>
                <a href="{{ route('admin.landing.method.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Achievements (Pencapaian Siswa) -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-trophy-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Pencapaian Siswa</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola pencapaian terbaru siswa</p>
                <a href="{{ route('admin.landing.achievement.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>

        <!-- Rating (Rating Keseluruhan) -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="text-center">
                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-4">
                    <i class="ri-star-line text-primary text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Rating Keseluruhan</h3>
                <p class="text-gray-600 mb-4 text-sm">Kelola rating dan review keseluruhan</p>
                <a href="{{ route('admin.landing.rating.index') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
                    <i class="ri-edit-line"></i> Kelola
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Action -->
    <div class="bg-white p-6 rounded-lg border border-gray-200 text-center">
        <h3 class="text-lg font-semibold mb-2">Lihat Hasil</h3>
        <p class="text-gray-600 mb-4">Lihat perubahan yang sudah dibuat di landing page</p>
        <a href="{{ route('landing') }}" target="_blank" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors inline-flex items-center gap-2">
            <i class="ri-external-link-line"></i> Buka Landing Page
        </a>
    </div>
</div>
@endsection
