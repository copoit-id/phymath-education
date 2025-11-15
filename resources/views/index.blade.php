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
            <img src="{{ asset('img/logo/logo.png') }}" alt="Phymath Education" class="h-10 w-auto">
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
                <img src="{{ asset('img/logo/logo.png') }}" alt="Phymath Education" class="h-8 w-auto">
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
        @if($hero)
        <section id="hero-section"
            class="relative flex flex-col md:flex-row  w-full px-[30px] md:px-[100px] lg:px-[200px] py-[100px]"
            style="background-image: url('{{ $hero->background_image ? asset('storage/' . $hero->background_image) : asset('img/hero/WEB-PHYMATH.png') }}');">

            <div class="w-full md:w-1/2 text-white relative z-10">
                @if($hero->highlight_text)
                <div
                    class="inline-block bg-white/10 px-4 py-2 rounded-full text-sm font-medium mb-6 border border-white/20">
                    {{ $hero->highlight_text }}
                </div>
                @endif
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold leading-tight">
                    {!! nl2br(e($hero->title)) !!}
                </h1>
                <p class="text-lg md:text-xl mt-6 text-white/90 leading-relaxed">
                    {!! nl2br(e($hero->description)) !!}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="{{ $hero->primary_button_url }}"
                        class="btn btn-lg btn-secondary">
                        {{ $hero->primary_button_text }}
                    </a>
                    <a href="{{ $hero->secondary_button_url }}"
                        class="btn btn-lg btn-outline-light">
                        {{ $hero->secondary_button_text }}
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="flex gap-6 mt-12 text-sm">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">{{ $hero->stat_1_number }}</div>
                        <div class="text-white/70">{{ $hero->stat_1_label }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">{{ $hero->stat_2_number }}</div>
                        <div class="text-white/70">{{ $hero->stat_2_label }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">{{ $hero->stat_3_number }}</div>
                        <div class="text-white/70">{{ $hero->stat_3_label }}</div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 relative z-10 mt-10 md:mt-0">

            </div>
        </section>
        @endif

        <!-- Why Choose Us Section -->
        @if($whyus->count() > 0)
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
                @foreach($whyus as $item)
                <div class="card relative group bg-gray-50 rounded-lg hover:bg-white transition-all duration-300 border border-gray-200">
                    <div class="p-8">
                        <div class="w-12 h-12 bg-green-dark rounded-lg flex items-center justify-center text-white text-xl mb-6">
                            @php
                                $iconValue = trim($item->icon ?? '');
                                $shouldPrefix = $iconValue && !str_starts_with($iconValue, 'ri-') && preg_match('/^[a-z0-9-]+$/i', $iconValue);
                                $iconClass = $shouldPrefix ? 'ri-' . $iconValue : $iconValue;
                            @endphp
                            @if($iconClass)
                                @if(str_starts_with($iconClass, 'ri-'))
                                    <i class="{{ $iconClass }}"></i>
                                @else
                                    {{ $iconClass }}
                                @endif
                            @else
                                <i class="ri-star-smile-line"></i>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $item->card_title }}</h3>
                        <p class="text-base text-gray-600 leading-relaxed">
                            {{ $item->card_description }}
                        </p>
                    </div>
                    <div class="absolute bottom-0 w-full h-2 bg-green-dark rounded-b-lg"></div>
                    <div>
                        <img src="{{asset('img/components/top-right.png')}}" alt="" class="w-12 absolute top-0 right-0">
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
        <!-- Interactive Learning Method Section -->
        @if($methods->count() > 0)
        <section id="method-section" class="bg-green-dark py-20 px-[30px] md:px-[100px] lg:px-[250px] text-white">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Metode Pembelajaran <span class="text-yellow-300">Terdepan</span>
                </h2>
                <p class="text-lg text-white/90">
                    Kombinasi teknologi canggih dan pendekatan humanis untuk hasil belajar yang maksimal
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($methods as $method)
                <div class="bg-white/10 p-6 rounded-lg text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                    @if($method->icon)
                    <div class="text-3xl mb-4">
                        <i class="{{ $method->icon }}"></i>
                    </div>
                    @endif
                    <h3 class="text-lg font-bold mb-2">{{ $method->title }}</h3>
                    <p class="text-white/80 text-sm">{{ $method->description }}</p>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        @if($subjects->count() > 0)
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
                @foreach($subjects as $subject)
                <div class="group relative bg-white rounded-lg border border-gray-200 hover:border-green-dark transition-all duration-300 overflow-hidden">
                    <div class="relative p-8 text-center">
                        @php
                            $subjectIcon = trim($subject->icon ?? '');
                            $shouldPrefixSubject = $subjectIcon && !str_starts_with($subjectIcon, 'ri-') && preg_match('/^[a-z0-9-]+$/i', $subjectIcon);
                            $subjectIconClass = $shouldPrefixSubject ? 'ri-' . $subjectIcon : $subjectIcon;
                        @endphp
                        <div class="text-4xl mb-4">
                            @if($subjectIconClass)
                                @if(str_starts_with($subjectIconClass, 'ri-'))
                                    <i class="{{ $subjectIconClass }}"></i>
                                @else
                                    {{ $subjectIconClass }}
                                @endif
                            @else
                                <i class="ri-book-open-line"></i>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $subject->title }}</h3>
                        <p class="text-base text-gray-600 mb-6">{{ $subject->description }}</p>
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
                @endforeach
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
        @endif
        <!-- Success Stories Section -->
        <section id="achievement-section" class="bg-gray-50 py-20 px-[30px] md:px-[100px] lg:px-[250px]">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Kisah <span class="text-green-dark">Sukses</span> Siswa Kami
                </h2>
                <p class="text-lg text-gray-600">
                    Prestasi nyata yang membuktikan efektivitas metode pembelajaran kami
                </p>
            </div>

            @if($rating)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="flex relative bg-white p-8 rounded-lg border border-gray-200 hover:border-green-dark transition-all duration-300">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-dark rounded-lg mx-auto mb-6 flex items-center justify-center text-white text-xl">
                            ⭐
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">{{ number_format($rating->rating_value, 1) }}</div>
                        <div class="text-lg font-medium text-gray-600 mb-2">{{ $rating->category }}</div>
                        <div class="text-sm text-gray-500 mt-2">Dari {{ number_format($rating->total_reviews) }} reviews</div>
                    </div>
                    <div class="h-full w-3 bg-secondary absolute top-0 left-0 rounded-l-lg"></div>
                    <img src="{{asset('img/components/top-left.png')}}" alt="" class="w-12 absolute top-0 left-0 rounded-l-lg">
                </div>

                <div class="flex relative bg-white p-8 rounded-lg border border-gray-200 hover:border-green-dark transition-all duration-300">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-dark rounded-lg mx-auto mb-6 flex items-center justify-center text-white text-xl">
                            🏆
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">{{ $achievements->count() }}+</div>
                        <div class="text-lg font-medium text-gray-600 mb-2">Pencapaian Siswa</div>
                        <div class="text-sm text-gray-500 mt-2">Prestasi yang telah diraih tahun ini</div>
                    </div>
                    <div class="h-full w-3 bg-secondary absolute top-0 left-0 rounded-l-lg"></div>
                    <img src="{{asset('img/components/top-left.png')}}" alt="" class="w-12 absolute top-0 left-0 rounded-l-lg">
                </div>

                <div class="flex relative bg-white p-8 rounded-lg border border-gray-200 hover:border-green-dark transition-all duration-300">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-dark rounded-lg mx-auto mb-6 flex items-center justify-center text-white text-xl">
                            🎯
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">95%</div>
                        <div class="text-lg font-medium text-gray-600 mb-2">Siswa Lulus PTN</div>
                        <div class="text-sm text-gray-500 mt-2">Dari program intensif kami</div>
                    </div>
                    <div class="h-full w-3 bg-secondary absolute top-0 left-0 rounded-l-lg"></div>
                    <img src="{{asset('img/components/top-left.png')}}" alt="" class="w-12 absolute top-0 left-0 rounded-l-lg">
                </div>
            </div>
            @endif

            @if($achievements->count() > 0)
            <!-- Student Achievement Section -->
            <div class="bg-white rounded-lg border border-gray-200 p-8">
                <div class="text-center mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pencapaian Terbaru Siswa Kami</h3>
                    <p class="text-gray-600 text-sm">Prestasi membanggakan dari siswa-siswa terbaik Phymath Education</p>
                </div>

                <!-- Achievement List -->
                <div class="space-y-4 mb-8">
                    @foreach($achievements->take(5) as $achievement)
                    <div class="flex relative items-center px-6 py-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <div class="w-12 h-12 bg-green-dark rounded-lg flex items-center justify-center text-white font-bold text-lg mr-4">
                            🏆
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">{{ $achievement->student_name }}</div>
                            <div class="text-sm text-gray-600">{{ $achievement->achievement }}</div>
                            @if($achievement->after_score)
                            <div class="text-xs text-green-dark font-medium">Skor: {{ $achievement->after_score }}</div>
                            @elseif($achievement->improvement)
                            <div class="text-xs text-green-dark font-medium">{{ $achievement->improvement }}</div>
                            @endif
                        </div>
                        <div class="text-right">
                            @if($achievement->school)
                            <div class="text-xs text-green-dark font-medium">{{ $achievement->school }}</div>
                            @endif
                        </div>
                        <div class="absolute h-full w-2 bg-green-dark top-0 right-0 rounded-r-lg"></div>
                        <div class="absolute h-full w-2 bg-green-dark top-0 left-0 rounded-l-lg"></div>
                    </div>
                    @endforeach
                </div>

                <!-- Stats Summary -->
                <div class="border-t border-gray-100 pt-6">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-green-dark">{{ $achievements->where('achievement', 'like', '%Medali%')->count() }}</div>
                            <div class="text-xs text-gray-500">Medali Nasional</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-dark">{{ $achievements->where('achievement', 'like', '%PTN%')->count() }}</div>
                            <div class="text-xs text-gray-500">PTN Favorit</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-dark">{{ $achievements->count() }}+</div>
                            <div class="text-xs text-gray-500">Total Prestasi</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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

            @if($packages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($packages->take(3) as $index => $package)
                @php
                    $isPopular = $index === 0; // First package is popular
                    $packageIcon = match($package->type_package) {
                        'bimbel' => '🚀',
                        'tryout' => '🎯',
                        'sertifikasi' => '🏆',
                        default => '📚'
                    };
                    $packageBg = $isPopular ? 'bg-green-dark text-white' : 'bg-white border border-gray-200';
                    $textColor = $isPopular ? 'text-white' : 'text-gray-900';
                    $descColor = $isPopular ? 'text-white/90' : 'text-gray-600';
                    $priceColor = $isPopular ? 'text-white' : 'text-gray-900';
                    $features = $package->features ? json_decode($package->features, true) : [];
                @endphp

                <div class="relative {{ $packageBg }} rounded-lg overflow-hidden">
                    @if($isPopular)
                    <div class="absolute top-4 right-4 bg-yellow-300 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">
                        POPULER
                    </div>
                    @endif
                    <div class="p-8">
                        <div class="w-12 h-12 {{ $isPopular ? 'bg-white/20' : 'bg-green-100' }} rounded-lg flex items-center justify-center text-xl mb-6">
                            {{ $packageIcon }}
                        </div>
                        <h3 class="text-xl font-bold mb-1 {{ $textColor }}">{{ $package->name }}</h3>
                        <p class="mb-4 {{ $descColor }}">{{ $package->description ?: 'Paket pembelajaran berkualitas tinggi untuk mencapai target akademik Anda.' }}</p>
                        <div class="mb-6">
                            @if($package->type_price === 'free')
                                <div class="text-2xl font-bold {{ $priceColor }}">GRATIS</div>
                                <div class="{{ $isPopular ? 'text-white/80' : 'text-gray-500' }} text-sm">Akses terbatas</div>
                            @else
                                <div class="text-2xl font-bold {{ $priceColor }}">Rp {{ number_format($package->price, 0, ',', '.') }}</div>
                                <div class="{{ $isPopular ? 'text-white/80' : 'text-gray-500' }} text-sm">per {{ $package->type_package === 'bimbel' ? 'bulan' : 'paket' }}</div>
                            @endif
                        </div>

                        @if(!empty($features))
                        <div class="space-y-3 mb-8 text-sm">
                            @foreach(array_slice($features, 0, 4) as $feature)
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 {{ $isPopular ? 'bg-white/20' : 'bg-green-dark' }} rounded-full flex items-center justify-center text-xs {{ $isPopular ? 'text-white' : 'text-white' }}">✓</div>
                                <span class="{{ $isPopular ? 'text-white' : 'text-gray-600' }}">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="space-y-3 mb-8 text-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 {{ $isPopular ? 'bg-white/20' : 'bg-green-dark' }} rounded-full flex items-center justify-center text-xs {{ $isPopular ? 'text-white' : 'text-white' }}">✓</div>
                                <span class="{{ $isPopular ? 'text-white' : 'text-gray-600' }}">Akses materi pembelajaran</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 {{ $isPopular ? 'bg-white/20' : 'bg-green-dark' }} rounded-full flex items-center justify-center text-xs {{ $isPopular ? 'text-white' : 'text-white' }}">✓</div>
                                <span class="{{ $isPopular ? 'text-white' : 'text-gray-600' }}">Bimbingan tutor berpengalaman</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 {{ $isPopular ? 'bg-white/20' : 'bg-green-dark' }} rounded-full flex items-center justify-center text-xs {{ $isPopular ? 'text-white' : 'text-white' }}">✓</div>
                                <span class="{{ $isPopular ? 'text-white' : 'text-gray-600' }}">Evaluasi berkala</span>
                            </div>
                        </div>
                        @endif

                        @auth
                            <a href="{{ route('user.package.index') }}" class="btn btn-md {{ $isPopular ? 'btn-secondary' : 'btn-dark' }} w-full">
                                PILIH PAKET INI
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-md {{ $isPopular ? 'btn-secondary' : 'btn-dark' }} w-full">
                                LOGIN UNTUK AKSES
                            </a>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>
            @endif

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
        @if($faqs->count() > 0)
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
                @foreach($faqs as $index => $faq)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button
                        class="w-full text-left p-6 focus:outline-none hover:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq({{ $index + 1 }})">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $faq->question }}</h3>
                            <svg id="faq-icon-{{ $index + 1 }}"
                                class="w-6 h-6 text-green-dark transform transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-{{ $index + 1 }}" class="hidden px-6 pb-6">
                        <p class="text-gray-600">{!! nl2br(e($faq->answer)) !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
        @if($testimonies->count() > 0)
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
                @foreach($testimonies as $testimony)
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
                                <img src="{{ $testimony->photo ? asset('storage/' . $testimony->photo) : asset('img/testimony/img.png') }}" alt="{{ $testimony->name }}" class="w-[200px] h-[220px] object-cover mt-[-110px] mb-4 rounded-t-full mx-auto">
                                <i class="ri-double-quotes-r"></i>
                                <h3 class="text-lg font-bold text-green-dark uppercase">{{ $testimony->name }}</h3>
                                <p class="font-semibold mb-3 text-black text-sm">{{ $testimony->school }}</p>
                                <p class="font-light leading-relaxed mb-4 text-sm text-justify">
                                    "{{ $testimony->message }}"
                                </p>
                                <div class="flex justify-center items-center gap-1 text-yellow-400 text-sm">
                                    @for ($i = 0; $i < $testimony->rating; $i++)
                                        <i class="ri-star-fill text-green-dark text-xl"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Review Summary -->
            <div class="text-center bg-green-dark text-white rounded-lg border border-green-dark py-10">
                <h3 class="text-xl font-bold mb-4">Rating Keseluruhan</h3>
                <div class="text-4xl font-bold text-yellow-300 mb-2">4.9/5</div>
                <div class="text-lg">Dari 1000+ Review Siswa & Orang Tua</div>
            </div>
        </section>
        @endif
    </main>
    <footer id="footer" class="bg-green-dark text-white py-[80px] px-[30px] md:px-[100px] lg:px-[250px]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <img src="{{ asset('img/logo/logo.png') }}" alt="Phymath Education" class="h-10 w-auto">
                <p class="mt-4 text-sm leading-relaxed text-white/80">
                    Phymath Education menghadirkan pengalaman belajar personal dengan tutor profesional, materi terkini, dan dukungan penuh untuk mencapai target akademik terbaik.
                </p>
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
                    @php
                        $emailContact = $contacts->where('type', 'email')->where('is_active', true)->first();
                        $phoneContact = $contacts->where('type', 'phone')->where('is_active', true)->first();
                        $addressContact = $contacts->where('type', 'address')->where('is_active', true)->first();
                    @endphp
                    @if($emailContact)
                        <li>Email: <a href="mailto:{{ $emailContact->value }}" class="hover:text-white">{{ $emailContact->value }}</a></li>
                    @else
                        <li>Email: <a href="mailto:info@phymatheducation.com" class="hover:text-white">info@phymatheducation.com</a></li>
                    @endif
                    @if($phoneContact)
                        <li>{{ $phoneContact->label }}: <a href="{{ str_contains($phoneContact->value, 'wa.me') ? $phoneContact->value : 'https://wa.me/' . str_replace(['+', '-', ' '], '', $phoneContact->value) }}" class="hover:text-white" target="_blank" rel="noopener">{{ $phoneContact->label === 'WhatsApp' ? $phoneContact->value : $phoneContact->value }}</a></li>
                    @else
                        <li>WhatsApp: <a href="https://wa.me/6281234567890" class="hover:text-white" target="_blank" rel="noopener">+62 812-3456-7890</a></li>
                    @endif
                    @if($addressContact)
                        <li>Alamat: {{ $addressContact->value }}</li>
                    @else
                        <li>Alamat: Jl. Pendidikan No. 12, Yogyakarta</li>
                    @endif
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
