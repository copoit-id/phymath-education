<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phymath Education</title>
    @vite('resources/css/app.css')
</head>

<body class="landing">
    <nav class="relative flex items-center justify-between py-4 px-[30px] md:px-[100px] lg:px-[250px] bg-[#FFFFFF]">
        <a href="#hero-section" class="flex items-center gap-3">
            <img src="{{ asset('img/logo/logo_wide.png') }}" alt="Phymath Education" class="h-10 w-auto">
        </a>
        <button id="mobile-menu-button" class="md:hidden flex flex-col gap-1.5 p-2 rounded-lg border border-green-dark text-green-dark"
            aria-label="Buka menu navigasi">
            <span class="h-[2px] w-6 bg-current"></span>
            <span class="h-[2px] w-6 bg-current"></span>
            <span class="h-[2px] w-6 bg-current"></span>
        </button>
        <ul class="hidden md:flex items-center gap-10 text-gray-600">
            <li><a href="#hero-section" class="hover:text-green-dark">Beranda</a></li>
            <li><a href="#mapel-section" class="hover:text-green-dark">Mata Pelajaran</a></li>
            <li><a href="#package-section" class="hover:text-green-dark">Paket Belajar</a></li>
            <li><a href="#testimony-section" class="hover:text-green-dark">Testimoni</a></li>
            <li><a href="#footer" class="hover:text-green-dark">Kontak</a></li>
            <li>
                <a href="#" class="border border-green-dark px-6 py-2 rounded-full bg-green-dark text-white hover:bg-green-700 transition">
                    Materi Belajar
                </a>
            </li>
        </ul>
    </nav>
    <div id="mobile-menu" class="fixed inset-0 z-50 hidden">
        <div id="mobile-menu-overlay" class="absolute inset-0 bg-black/40 opacity-0 transition-opacity duration-200"></div>
        <div id="mobile-menu-panel"
            class="relative h-full w-72 max-w-[80vw] bg-white px-6 py-8 shadow-xl -translate-x-full transition-transform duration-200">
            <div class="flex items-center justify-between mb-10">
                <img src="{{ asset('img/logo/logo_wide.png') }}" alt="Phymath Education" class="h-8 w-auto">
                <button class="p-2 rounded-md border border-gray-200" data-close="mobile-menu" aria-label="Tutup menu navigasi">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col gap-6 text-gray-700">
                <li><a href="#hero-section" class="hover:text-green-dark" data-close="mobile-menu">Beranda</a></li>
                <li><a href="#mapel-section" class="hover:text-green-dark" data-close="mobile-menu">Mata Pelajaran</a></li>
                <li><a href="#package-section" class="hover:text-green-dark" data-close="mobile-menu">Paket Belajar</a></li>
                <li><a href="#testimony-section" class="hover:text-green-dark" data-close="mobile-menu">Testimoni</a></li>
                <li><a href="#footer" class="hover:text-green-dark" data-close="mobile-menu">Kontak</a></li>
            </ul>
            <a href="#" class="mt-10 inline-block w-full rounded-full bg-green-dark px-6 py-3 text-center text-white hover:bg-green-700 transition"
                data-close="mobile-menu">
                Materi Belajar
            </a>
        </div>
    </div>
    <main>
        <section id="hero-section"
            class="flex flex-col md:flex-row bg-green-dark w-full px-[30px] md:px-[100px] lg:px-[250px] py-[100px]">
            <div class="w-full md:w-1/2 text-white">
                <h1 class="text-[48px] font-bold">Les Privat Terbaik<br> dengan Pendekatan<br> Personalized
                    Learning</h1>
                <p class="text-[100] mt-4">Dengan pendekatan <b>Personalized Learning</b>, Kami menyesuaikan metode
                    belajar
                    sesuai
                    gaya dan
                    kebutuhan
                    siswa. Fokus meningkat, prestasi pun melesat!

                </p>
                <div class="mt-12">
                    <a href="" class="border px-8 py-3 rounded-full">Materi Belajar</a>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <img src="{{ asset('img/hero-img') }}" alt="">
            </div>
        </section>
        <section id="mapel-section" class="w-full bg-[#FFFFFF] py-[100px] px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <img src="{{ asset('img/matkul/fisika.png') }}" alt="">
                <img src="{{ asset('img/matkul/matematika.png') }}" alt="">
                <img src="{{ asset('img/matkul/fisika.png') }}" alt="">
            </div>
        </section>
        <section id="package-section" class="w-full bg-[#FFFFFF] py-[100px] px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-3xl mx-auto">
                <p class="text-green-dark font-semibold uppercase tracking-widest">Program Kami</p>
                <h2 class="text-[32px] md:text-[40px] font-bold text-gray-900 mt-4">Paket Belajar untuk Setiap Tujuan</h2>
                <p class="text-gray-600 mt-4">Temukan paket belajar yang dirancang khusus untuk mencapai target akademik
                    dan prestasi terbaikmu bersama tutor berpengalaman Phymath Education.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 text-gray-600">
                <div class="bg-white px-6 py-6 shadow rounded-xl border border-gray-100">
                    <div class="w-full h-36 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('img/matkul/matematika.png') }}" alt="Paket Bimbel Intensif"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-xl font-bold text-black">Bimbel Intensif</p>
                    <p class="font-light mt-1">Pendampingan akademik menyeluruh dengan jadwal fleksibel dan tutor terbaik.</p>
                    <p class="font-bold text-black mt-3">Mulai dari Rp 350.000</p>
                    <div class="flex flex-col mt-4 gap-2 font-light">
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Kelas live interaktif setiap pekan</span>
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Modul eksklusif dan bank soal</span>
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Laporan perkembangan pribadi</span>
                    </div>
                    <a href="#" class="mt-6 block w-full bg-primary text-white px-4 py-3 rounded-lg font-semibold text-center">
                        LIHAT DETAIL
                    </a>
                </div>
                <div class="bg-white px-6 py-6 shadow rounded-xl border border-gray-100">
                    <div class="w-full h-36 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('img/matkul/fisika.png') }}" alt="Paket Tryout UTBK"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-xl font-bold text-black">Tryout UTBK</p>
                    <p class="font-light mt-1">Simulasi UTBK komprehensif dengan analisis hasil otomatis dan pembahasan.</p>
                    <p class="font-bold text-black mt-3">Mulai dari Rp 150.000</p>
                    <div class="flex flex-col mt-4 gap-2 font-light">
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Paket soal terbaru &amp; variatif</span>
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Analisis skor dan rekomendasi materi</span>
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Tryout dapat diulang kapan saja</span>
                    </div>
                    <a href="#" class="mt-6 block w-full bg-primary text-white px-4 py-3 rounded-lg font-semibold text-center">
                        LIHAT DETAIL
                    </a>
                </div>
                <div class="bg-white px-6 py-6 shadow rounded-xl border border-gray-100">
                    <div class="w-full h-36 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('img/graduation.png') }}" alt="Paket Sertifikasi"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-xl font-bold text-black">Sertifikasi Keahlian</p>
                    <p class="font-light mt-1">Persiapan intensif untuk sertifikasi akademik dan kompetisi nasional.</p>
                    <p class="font-bold text-black mt-3">Mulai dari Rp 250.000</p>
                    <div class="flex flex-col mt-4 gap-2 font-light">
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Materi fokus pada kebutuhan sertifikasi</span>
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Bimbingan mentor sesuai bidang</span>
                        <span><i class="ri-checkbox-circle-fill text-green-500"></i> Simulasi penilaian berkala</span>
                    </div>
                    <a href="#" class="mt-6 block w-full bg-primary text-white px-4 py-3 rounded-lg font-semibold text-center">
                        LIHAT DETAIL
                    </a>
                </div>
            </div>
        </section>
        <section id="stats-section" class="bg-[#F4F8FB] w-full py-[100px] px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="flex flex-col items-center">
                    <p class="text-[34px] font-medium">1,000</p>
                    <p>Learners</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-[34px] font-medium">50</p>
                    <p>Tutors</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-[34px] font-medium">120</p>
                    <p>Courses published</p>
                </div>
            </div>
        </section>
        <section id="testimony-section" class="bg-[#FFFFFF] w-full py-[100px] px-[30px] md:px-[100px] lg:px-[250px]">
            <h3 class=" text-[32px] md:text-[48px] text-center text-green-dark">Apa Kata Mereka Selama Belajar Bersama
                Tutor Phymath?
            </h3>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 bg-[#FFFFFF]">
                <div>
                    <img src="{{ asset('img/testimony/nabila.png') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('img/testimony/nadira.png') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('img/testimony/queena.png') }}" alt="">
                </div>
            </div>
        </section>
    </main>
    <footer id="footer" class="bg-green-dark text-white py-[80px] px-[30px] md:px-[100px] lg:px-[250px]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <img src="{{ asset('img/logo/logo_wide.png') }}" alt="Phymath Education" class="h-10 w-auto">
                <p class="mt-4 text-sm leading-relaxed text-white/80">Phymath Education menghadirkan pengalaman belajar
                    personal dengan tutor profesional, materi terkini, dan dukungan penuh untuk mencapai target akademik terbaik.</p>
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
                    <li>Email: <a href="mailto:info@phymatheducation.com" class="hover:text-white">info@phymatheducation.com</a></li>
                    <li>WhatsApp: <a href="https://wa.me/6281234567890" class="hover:text-white" target="_blank" rel="noopener">+62 812-3456-7890</a></li>
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
    </script>
</body>

</html>
