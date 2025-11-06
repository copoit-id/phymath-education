<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phymath Education</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="landing">
    <nav class="relative flex items-center justify-between py-4 px-[30px] md:px-[100px] lg:px-[250px] bg-[#FFFFFF]">
        <a href="#hero-section" class="flex items-center gap-3">
            <img src="{{ asset('img/logo/logo_wide.png') }}" alt="Phymath Education" class="h-10 w-auto">
        </a>
        <button id="mobile-menu-button"
            class="md:hidden flex flex-col gap-1.5 p-2 rounded-lg border border-green-dark text-green-dark"
            aria-label="Buka menu navigasi">
            <span class="h-[2px] w-6 bg-current"></span>
            <span class="h-[2px] w-6 bg-current"></span>
            <span class="h-[2px] w-6 bg-current"></span>
        </button>
        <ul class="hidden md:flex items-center gap-10 text-gray-600">
            <li><a href="#hero-section" class="hover:text-green-dark transition-colors">Beranda</a></li>
            <li><a href="#mapel-section" class="hover:text-green-dark transition-colors">Mata Pelajaran</a></li>
            <li><a href="#package-section" class="hover:text-green-dark transition-colors">Paket Belajar</a></li>
            <li><a href="#testimony-section" class="hover:text-green-dark transition-colors">Testimoni</a></li>
            <li><a href="#footer" class="hover:text-green-dark transition-colors">Kontak</a></li>
            <li>
                @auth
                    <a href="{{ route('user.package.index') }}"
                        class="btn btn-sm btn-primary">
                        Materi Belajar
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-sm btn-primary">
                        Materi Belajar
                    </a>
                @endauth
            </li>
        </ul>
    </nav>
    <div id="mobile-menu" class="fixed inset-0 z-50 hidden">
        <div id="mobile-menu-overlay" class="absolute inset-0 bg-black/40 opacity-0 transition-opacity duration-200">
        </div>
        <div id="mobile-menu-panel"
            class="relative h-full w-72 max-w-[80vw] bg-white px-6 py-8 shadow-xl -translate-x-full transition-transform duration-200">
            <div class="flex items-center justify-between mb-10">
                <img src="{{ asset('img/logo/logo_wide.png') }}" alt="Phymath Education" class="h-8 w-auto">
                <button class="p-2 rounded-md border border-gray-200" data-close="mobile-menu"
                    aria-label="Tutup menu navigasi">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col gap-6 text-gray-700">
                <li><a href="#hero-section" class="hover:text-green-dark" data-close="mobile-menu">Beranda</a></li>
                <li><a href="#mapel-section" class="hover:text-green-dark" data-close="mobile-menu">Mata Pelajaran</a>
                </li>
                <li><a href="#package-section" class="hover:text-green-dark" data-close="mobile-menu">Paket Belajar</a>
                </li>
                <li><a href="#testimony-section" class="hover:text-green-dark" data-close="mobile-menu">Testimoni</a>
                </li>
                <li><a href="#footer" class="hover:text-green-dark" data-close="mobile-menu">Kontak</a></li>
            </ul>
            @auth
                <a href="{{ route('user.package.index') }}"
                    class="btn btn-md btn-primary w-full mt-10"
                    data-close="mobile-menu">
                    Materi Belajar
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="btn btn-md btn-primary w-full mt-10"
                    data-close="mobile-menu">
                    Materi Belajar
                </a>
            @endauth
        </div>
    </div>
    <main>
        <section id="hero-section"
            class="relative flex flex-col md:flex-row  w-full px-[30px] md:px-[100px] lg:px-[200px] py-[100px]"
            style="background-image: url('{{ asset('img/hero/WEB-PHYMATH.png') }}');">

            <div class="w-full md:w-1/2 text-white relative z-10">
                <div
                    class="inline-block bg-white/10 px-4 py-2 rounded-full text-sm font-medium mb-6 border border-white/20">
                    #1 Platform Bimbel Digital Indonesia
                </div>
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold leading-tight">
                    Raih <span class="text-white">Prestasi Terbaik</span><br>
                    dengan Metode<br>
                    <span class="text-yellow-300">Personalized Learning</span>
                </h1>
                <p class="text-lg md:text-xl mt-6 text-white/90 leading-relaxed">
                    Bergabunglah dengan <span class="font-bold text-white">1000+ siswa</span> yang telah merasakan
                    peningkatan nilai hingga <span class="font-bold text-yellow-300">40%</span> dalam 3 bulan!
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    @auth
                        <a href="{{ route('user.package.index') }}"
                            class="btn btn-lg btn-secondary">
                            Mulai Belajar Sekarang
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="btn btn-lg btn-secondary">
                            Mulai Belajar Sekarang
                        </a>
                    @endauth
                    <a href="#package-section"
                        class="btn btn-lg btn-outline-light">
                        Lihat Paket Belajar
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="flex gap-6 mt-12 text-sm">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">1000+</div>
                        <div class="text-white/70">Siswa Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">50+</div>
                        <div class="text-white/70">Tutor Expert</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">95%</div>
                        <div class="text-white/70">Success Rate</div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 relative z-10 mt-10 md:mt-0">

            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="bg-white py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Kenapa Memilih <span class="text-green-dark">Phymath Education?</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Kami tidak hanya mengajar, tapi mentransformasi cara belajar siswa dengan pendekatan yang terbukti
                    efektif
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 0; $i < 3; $i++) <div
                    class="card relative group bg-gray-50 rounded-lg hover:bg-white transition-all duration-300 border border-gray-200">
                    <div class="p-8">
                        <div
                            class="w-12 h-12 bg-green-dark rounded-lg flex items-center justify-center text-white text-xl mb-6">
                            🧠
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Metode AI-Powered</h3>
                        <p class="text-base text-gray-600 leading-relaxed">
                            Sistem pembelajaran yang menganalisis gaya belajar setiap siswa dan menyesuaikan materi
                            secara otomatis
                        </p>
                    </div>
                    <div class="w-full h-2 bg-green-dark rounded-b-lg"></div>
                    <div>
                        <img src="{{asset('img/components/top-right.png')}}" alt="" class="w-12 absolute top-0 right-0">
                    </div>
            </div>
            @endfor
            </div>
        </section>
        <!-- Interactive Learning Method Section -->
        <section class="bg-green-dark py-20 px-[30px] md:px-[100px] lg:px-[250px] text-white">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Metode Pembelajaran <span class="text-yellow-300">Terdepan</span>
                </h2>
                <p class="text-lg text-white/90">
                    Kombinasi teknologi canggih dan pendekatan humanis untuk hasil belajar yang maksimal
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white/10 p-6 rounded-lg text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="text-3xl mb-4">🎯</div>
                    <h3 class="text-lg font-bold mb-2">Adaptive Learning</h3>
                    <p class="text-white/80 text-sm">Materi menyesuaikan kemampuan siswa secara real-time</p>
                </div>

                <div
                    class="bg-white/10 p-6 rounded-lg text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="text-3xl mb-4">🚀</div>
                    <h3 class="text-lg font-bold mb-2">Gamifikasi</h3>
                    <p class="text-white/80 text-sm">Belajar jadi seru dengan sistem reward dan achievement</p>
                </div>

                <div
                    class="bg-white/10 p-6 rounded-lg text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="text-3xl mb-4">💡</div>
                    <h3 class="text-lg font-bold mb-2">Smart Analytics</h3>
                    <p class="text-white/80 text-sm">Analisis mendalam untuk strategi belajar yang tepat</p>
                </div>

                <div
                    class="bg-white/10 p-6 rounded-lg text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="text-3xl mb-4">🤝</div>
                    <h3 class="text-lg font-bold mb-2">1-on-1 Mentoring</h3>
                    <p class="text-white/80 text-sm">Bimbingan personal dari tutor berpengalaman</p>
                </div>
            </div>
        </section>

        <section id="mapel-section" class="w-full bg-[#F8FAFC] py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Mata Pelajaran <span class="text-green-dark">Unggulan</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Kuasai berbagai mata pelajaran dengan pendekatan yang fun dan efektif
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 0; $i < 3; $i++) <div
                    class="group relative bg-white rounded-lg border border-gray-200 hover:border-green-dark transition-all duration-300 overflow-hidden">
                    <div class="relative p-8 text-center">

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Matematika</h3>
                        <p class="text-base text-gray-600 mb-6">Mulai dari dasar hingga tingkat olimpiade dengan metode
                            yang mudah dipahami</p>
                    </div>
                    <div class='element'>
                        <img src="{{asset('img/components/top-left.png')}}" alt="" class="w-12 absolute top-0 left-0">
                        <img src="{{asset('img/components/top-right.png')}}" alt="" class="w-12 absolute top-0 right-0">
                        <img src="{{asset('img/components/bottom-right.png')}}" alt=""
                            class="w-14 absolute bottom-0 right-0">
                        <img src="{{asset('img/components/bottom-left.png')}}" alt=""
                            class="w-14 absolute bottom-0 left-0">
                    </div>
            </div>
            @endfor
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-12">
                @auth
                    <a href="{{ route('user.package.index') }}"
                        class="btn btn-md btn-primary">
                        Jelajahi Semua Mata Pelajaran
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-md btn-primary">
                        Jelajahi Semua Mata Pelajaran
                    </a>
                @endauth
            </div>
        </section>
        <!-- Success Stories Section -->
        <section class="bg-gray-50 py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Kisah <span class="text-green-dark">Sukses</span> Siswa Kami
                </h2>
                <p class="text-lg text-gray-600">
                    Prestasi nyata yang membuktikan efektivitas metode pembelajaran kami
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                @for ($i = 0; $i < 3; $i++) <div
                    class="flex relative bg-white p-8 rounded-lg border border-gray-200 hover:border-green-dark transition-all duration-300">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-green-dark rounded-lg mx-auto mb-6 flex items-center justify-center text-white text-xl">
                            🏆
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">95%</div>
                        <div class="text-lg font-medium text-gray-600 mb-2">Siswa Lulus PTN Favorit</div>
                        <div class="text-sm text-gray-500 mt-2">Dari total siswa yang mengikuti program intensif 2024
                        </div>
                    </div>
                    <div class="h-full w-3 bg-secondary absolute top-0 left-0 rounded-l-lg"></div>
                    <img src="{{asset('img/components/top-left.png')}}" alt=""
                        class="w-12 absolute top-0 left-0 rounded-l-lg">
            </div>
            @endfor
            </div>

            <!-- Student Achievement Section -->
            <div class="bg-white rounded-lg border border-gray-200 p-8">
                <div class="text-center mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pencapaian Terbaru Siswa Kami</h3>
                    <p class="text-gray-600 text-sm">Prestasi membanggakan dari siswa-siswa terbaik Phymath Education
                    </p>
                </div>

                <!-- Achievement List -->
                <div class="space-y-4 mb-8">
                    @for ($i = 0; $i < 5; $i++) <div
                        class="flex relative items-center px-6 py-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <div
                            class="w-12 h-12 bg-green-dark rounded-lg flex items-center justify-center text-white font-bold text-lg mr-4">
                            🏆
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">Sarah Maharani</div>
                            <div class="text-sm text-gray-600">Juara 1 OSN Matematika Tingkat Provinsi DKI Jakarta 2024
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs text-green-dark font-medium">Oktober 2024</div>
                        </div>
                        <div class="absolute h-full w-2 bg-green-dark top-0 right-0 rounded-r-lg"></div>
                        <div class="absolute h-full w-2 bg-green-dark top-0 left-0 rounded-l-lg"></div>
                </div>
                @endfor
            </div>

            <!-- Stats Summary -->
            <div class="border-t border-gray-100 pt-6">
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div>
                        <div class="text-2xl font-bold text-green-dark">28</div>
                        <div class="text-xs text-gray-500">Medali Nasional</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-green-dark">95</div>
                        <div class="text-xs text-gray-500">PTN Favorit</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-green-dark">150+</div>
                        <div class="text-xs text-gray-500">Prestasi 2024</div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section id="package-section" class="w-full bg-[#FFFFFF] py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Paket Belajar untuk <span class="text-green-dark">Setiap Tujuan</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Temukan paket belajar yang dirancang khusus untuk mencapai target akademik dan prestasi terbaikmu
                    bersama tutor berpengalaman Phymath Education.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Premium Package -->
                <div class="relative bg-green-dark text-white rounded-lg border border-green-dark overflow-hidden">
                    <div
                        class="absolute top-4 right-4 bg-yellow-300 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">
                        POPULER
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center text-xl mb-6">
                            🚀
                        </div>
                        <h3 class="text-xl font-bold mb-1">Bimbel Intensif</h3>
                        <p class="text-white/90 mb-4">Pendampingan akademik menyeluruh dengan jadwal fleksibel dan tutor
                            terbaik.</p>
                        <div class="mb-6">
                            <div class="text-2xl font-bold">Rp 350.000</div>
                            <div class="text-white/80 text-sm">per bulan</div>
                        </div>
                        <div class="space-y-3 mb-8 text-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 bg-white/20 rounded-full flex items-center justify-center text-xs">✓
                                </div>
                                <span>Kelas live interaktif setiap pekan</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 bg-white/20 rounded-full flex items-center justify-center text-xs">✓
                                </div>
                                <span>Modul eksklusif dan bank soal</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 bg-white/20 rounded-full flex items-center justify-center text-xs">✓
                                </div>
                                <span>Laporan perkembangan pribadi</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 bg-white/20 rounded-full flex items-center justify-center text-xs">✓
                                </div>
                                <span>Konsultasi 24/7 dengan tutor</span>
                            </div>
                        </div>
                        @auth
                            <a href="{{ route('user.package.index') }}"
                                class="btn btn-md btn-secondary w-full">
                                PILIH PAKET INI
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-md btn-secondary w-full">
                                LOGIN UNTUK AKSES
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Standard Package -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="p-8">
                        <div
                            class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-xl mb-6">
                            🎯
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Tryout UTBK</h3>
                        <p class="text-gray-600 mb-4">Simulasi UTBK komprehensif dengan analisis hasil otomatis dan
                            pembahasan.</p>
                        <div class="mb-6">
                            <div class="text-2xl font-bold text-gray-900">Rp 150.000</div>
                            <div class="text-gray-500 text-sm">per paket</div>
                        </div>
                        <div class="space-y-3 mb-8 text-sm text-gray-600">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Paket soal terbaru & variatif</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Analisis skor dan rekomendasi materi</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Tryout dapat diulang kapan saja</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Pembahasan video lengkap</span>
                            </div>
                        </div>
                        @auth
                            <a href="{{ route('user.package.index') }}"
                                class="btn btn-md btn-dark w-full">
                                LIHAT DETAIL
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-md btn-dark w-full">
                                LOGIN UNTUK AKSES
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Professional Package -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="p-8">
                        <div
                            class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 text-xl mb-6">
                            🏆
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Sertifikasi Keahlian</h3>
                        <p class="text-gray-600 mb-4">Persiapan intensif untuk sertifikasi akademik dan kompetisi
                            nasional.</p>
                        <div class="mb-6">
                            <div class="text-2xl font-bold text-gray-900">Rp 250.000</div>
                            <div class="text-gray-500 text-sm">per sesi</div>
                        </div>
                        <div class="space-y-3 mb-8 text-sm text-gray-600">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Materi fokus pada kebutuhan sertifikasi</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Bimbingan mentor sesuai bidang</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Simulasi penilaian berkala</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-4 h-4 bg-green-dark rounded-full flex items-center justify-center text-white text-xs">
                                    ✓</div>
                                <span>Sertifikat resmi completion</span>
                            </div>
                        </div>
                        @auth
                            <a href="{{ route('user.package.index') }}"
                                class="btn btn-md btn-dark w-full">
                                LIHAT DETAIL
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-md btn-dark w-full">
                                LOGIN UNTUK AKSES
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Money Back Guarantee -->
            <div class="text-center">
                <div class="inline-block bg-gray-50 p-8 rounded-lg border border-gray-200">
                    <div class="text-3xl mb-4">💯</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Garansi 100% Uang Kembali</h3>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Tidak puas dengan hasil belajar dalam 30 hari pertama? Kami kembalikan uang Anda 100%!
                    </p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="bg-gray-50 py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Pertanyaan yang <span class="text-green-dark">Sering Ditanyakan</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Temukan jawaban untuk pertanyaan umum tentang program pembelajaran kami
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button
                        class="w-full text-left p-6 focus:outline-none hover:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(1)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Bagaimana sistem pembelajaran di Phymath
                                Education?</h3>
                            <svg id="faq-icon-1"
                                class="w-6 h-6 text-green-dark transform transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-1" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Kami menggunakan metode Personalized Learning yang menyesuaikan materi
                            dan kecepatan belajar dengan kemampuan masing-masing siswa. Setiap siswa mendapat program
                            pembelajaran yang dirancang khusus berdasarkan hasil assessment awal.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button
                        class="w-full text-left p-6 focus:outline-none hover:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(2)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Apakah tutor Phymath Education berkualitas?
                            </h3>
                            <svg id="faq-icon-2"
                                class="w-6 h-6 text-green-dark transform transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-2" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Semua tutor kami adalah lulusan universitas terbaik di Indonesia dengan
                            IPK minimal 3.5. Mereka telah melalui proses seleksi ketat dan pelatihan khusus metodologi
                            pengajaran. Pengalaman mengajar minimal 3 tahun dengan track record terbukti.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button
                        class="w-full text-left p-6 focus:outline-none hover:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(3)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Berapa lama waktu yang dibutuhkan untuk
                                melihat peningkatan?</h3>
                            <svg id="faq-icon-3"
                                class="w-6 h-6 text-green-dark transform transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-3" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Sebagian besar siswa mulai merasakan peningkatan pemahaman dalam 2-3
                            minggu pertama. Peningkatan nilai yang signifikan biasanya terlihat setelah 1-2 bulan
                            pembelajaran konsisten. Namun, hasilnya dapat bervariasi tergantung kondisi awal dan
                            konsistensi belajar.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button
                        class="w-full text-left p-6 focus:outline-none hover:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(4)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Apakah ada garansi jika tidak puas dengan
                                hasilnya?</h3>
                            <svg id="faq-icon-4"
                                class="w-6 h-6 text-green-dark transform transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-4" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Ya! Kami memberikan garansi 100% uang kembali jika Anda tidak puas
                            dengan hasil pembelajaran dalam 30 hari pertama. Syarat dan ketentuan berlaku, termasuk
                            harus mengikuti minimal 80% dari jadwal pembelajaran yang telah disepakati.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button
                        class="w-full text-left p-6 focus:outline-none hover:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(5)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Bagaimana cara mendaftar dan memulai
                                pembelajaran?</h3>
                            <svg id="faq-icon-5"
                                class="w-6 h-6 text-green-dark transform transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-5" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Proses pendaftaran sangat mudah! Klik tombol "Materi Belajar", pilih
                            paket yang sesuai, lakukan pembayaran, dan Anda langsung bisa mengakses materi pembelajaran.
                            Tim kami akan menghubungi untuk jadwal konsultasi awal dalam 24 jam.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="testimony-section" class="bg-[#FFFFFF] w-full py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-green-dark mb-6">
                    Apa Kata Mereka Selama Belajar Bersama<br>
                    <span class="text-gray-900">Tutor Phymath?</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Dengarkan cerita inspiratif dari siswa-siswa yang telah merasakan transformasi belajar bersama kami
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-56 mb-12">
                @for ($i = 0; $i < 3; $i++)
                    <div>
                        <div class="flex flex-col items-center justify-center">
                            <!-- SVG Wrapper, pastikan ada jarak antara SVG dan card -->
                            <div class="svg-wrapper mb-[-50px]">
                                <svg width="500" height="250" viewBox="0 0 500 250" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                                    <path id="curve" d="M50,200 Q250,-100 450,200" fill="transparent" stroke="transparent" />
                                    <text font-size="32" fill="#015E37" class="font-semibold">
                                        <textPath href="#curve" startOffset="50%" text-anchor="middle">A LOVE LETTER FROM</textPath>
                                    </text>
                                </svg>
                            </div>

                            <!-- Card Section -->
                            <div class="flex flex-col items-center justify-center px-8 py-6 text-center bg-secondary text-black hover:border hover:border-green-dark transition-all duration-300 overflow-visible rounded-2xl">
                                <img src="{{asset('img/testimony/img.png')}}" alt="" class="w-[200px] h-[220px] object-cover mt-[-110px] mb-4 rounded-t-full mx-auto">
                                <i class="ri-double-quotes-r"></i>
                                <h3 class="text-lg font-bold text-green-dark uppercase">Nabila Azzahra</h3>
                                <p class="font-semibold mb-3 text-black text-sm">Siswa SMA Negeri 1 Jakarta</p>
                                <p class="font-light leading-relaxed mb-4 text-sm text-justify">
                                    "Sebelum belajar di Phymath, nilai matematika saya selalu di bawah KKM. Setelah 3 bulan
                                    belajar dengan metode mereka, nilai saya naik dari 65 jadi 90! Tutor nya sabar dan cara
                                    menjelaskannya mudah dipahami."
                                </p>
                                <div class="flex justify-center items-center gap-1 text-yellow-400 text-sm">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="ri-star-fill text-green-dark text-xl"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <!-- Review Summary -->
            <div class="text-center bg-green-dark text-white rounded-lg border border-green-dark py-10">
                <h3 class="text-xl font-bold mb-4">Rating Keseluruhan</h3>
                <div class="text-4xl font-bold text-yellow-300 mb-2">4.9/5</div>
                <div class="text-lg">Dari 1000+ Review Siswa & Orang Tua</div>
            </div>
        </section>
    </main>
    <footer id="footer" class="bg-green-dark text-white py-[80px] px-[30px] md:px-[100px] lg:px-[250px]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <img src="{{ asset('img/logo/logo_wide.png') }}" alt="Phymath Education" class="h-10 w-auto">
                <p class="mt-4 text-sm leading-relaxed text-white/80">Phymath Education menghadirkan pengalaman belajar
                    personal dengan tutor profesional, materi terkini, dan dukungan penuh untuk mencapai target akademik
                    terbaik.</p>
            </div>
            <div>
                <p class="text-lg font-semibold">Navigasi</p>
                <ul class="mt-4 space-y-3 text-white/80">
                    <li><a href="#hero-section" class="hover:text-white">Beranda</a></li>
                    <li><a href="#mapel-section" class="hover:text-white">Mata Pelajaran</a></li>
                    <li><a href="#package-section" class="hover:text-white">Paket Belajar</a></li>
                    <li><a href="#testimony-section" class="hover:text-white">Testimoni</a></li>
                </ul>
            </div>
            <div>
                <p class="text-lg font-semibold">Hubungi Kami</p>
                <ul class="mt-4 space-y-3 text-white/80">
                    <li>Email: <a href="mailto:info@phymatheducation.com"
                            class="hover:text-white">info@phymatheducation.com</a></li>
                    <li>WhatsApp: <a href="https://wa.me/6281234567890" class="hover:text-white" target="_blank"
                            rel="noopener">+62 812-3456-7890</a></li>
                    <li>Alamat: Jl. Pendidikan No. 12, Yogyakarta</li>
                </ul>
            </div>
        </div>
        <div class="mt-10 border-t border-white/20 pt-6 text-xs md:text-sm text-white/70">
            &copy; {{ date('Y') }} Phymath Education. All rights reserved.
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var mobileMenuButton = document.getElementById('mobile-menu-button');
            var mobileMenu = document.getElementById('mobile-menu');
            var mobileMenuPanel = document.getElementById('mobile-menu-panel');
            var mobileOverlay = document.getElementById('mobile-menu-overlay');
            var closeElements = document.querySelectorAll('[data-close="mobile-menu"]');

            function openMobileMenu() {
                mobileMenu.classList.remove('hidden');
                requestAnimationFrame(function () {
                    mobileMenuPanel.classList.remove('-translate-x-full');
                    mobileOverlay.classList.remove('opacity-0');
                    mobileOverlay.classList.add('opacity-100');
                });
                document.body.classList.add('overflow-hidden');
            }

            function closeMobileMenu() {
                mobileMenuPanel.classList.add('-translate-x-full');
                mobileOverlay.classList.add('opacity-0');
                mobileOverlay.classList.remove('opacity-100');
                setTimeout(function () {
                    mobileMenu.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }, 200);
            }

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openMobileMenu);
            }

            closeElements.forEach(function (element) {
                element.addEventListener('click', closeMobileMenu);
            });

            if (mobileOverlay) {
                mobileOverlay.addEventListener('click', closeMobileMenu);
            }

            document.addEventListener('keyup', function (event) {
                if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                    closeMobileMenu();
                }
            });
        });

        // FAQ Toggle Function
        function toggleFaq(faqNumber) {
            const content = document.getElementById(`faq-content-${faqNumber}`);
            const icon = document.getElementById(`faq-icon-${faqNumber}`);

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Add smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll animation effects
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe all sections for scroll animations
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>

</html>
