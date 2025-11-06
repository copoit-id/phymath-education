<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LandingpageHero;
use App\Models\LandingpageWhyus;
use App\Models\LandingpageSubject;
use App\Models\LandingpageTestimony;
use App\Models\LandingpageFaq;
use App\Models\LandingpageContact;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        LandingpageHero::create([
            'title' => 'Raih Prestasi Terbaik dengan Metode Personalized Learning',
            'description' => 'Bergabunglah dengan 1000+ siswa yang telah merasakan peningkatan nilai hingga 40% dalam 3 bulan!',
            'highlight_text' => '#1 Platform Bimbel Digital Indonesia',
            'primary_button_text' => 'Mulai Belajar Sekarang',
            'primary_button_url' => '/login',
            'secondary_button_text' => 'Lihat Paket Belajar',
            'secondary_button_url' => '#package-section',
            'stat_1_number' => '1000+',
            'stat_1_label' => 'Siswa Aktif',
            'stat_2_number' => '50+',
            'stat_2_label' => 'Tutor Expert',
            'stat_3_number' => '95%',
            'stat_3_label' => 'Success Rate',
            'background_image' => 'img/hero/WEB-PHYMATH.png',
            'is_active' => true
        ]);

        // Why Us Section
        $whyUsData = [
            [
                'title' => 'Kenapa Memilih Phymath Education?',
                'description' => 'Kami tidak hanya mengajar, tapi mentransformasi cara belajar siswa dengan pendekatan yang terbukti efektif',
                'icon' => '🧠',
                'card_title' => 'Metode AI-Powered',
                'card_description' => 'Sistem pembelajaran yang menganalisis gaya belajar setiap siswa dan menyesuaikan materi secara otomatis',
                'order' => 1
            ],
            [
                'title' => 'Kenapa Memilih Phymath Education?',
                'description' => 'Kami tidak hanya mengajar, tapi mentransformasi cara belajar siswa dengan pendekatan yang terbukti efektif',
                'icon' => '🎯',
                'card_title' => 'Tutor Berpengalaman',
                'card_description' => 'Tim pengajar terbaik dari universitas ternama dengan pengalaman mengajar lebih dari 5 tahun',
                'order' => 2
            ],
            [
                'title' => 'Kenapa Memilih Phymath Education?',
                'description' => 'Kami tidak hanya mengajar, tapi mentransformasi cara belajar siswa dengan pendekatan yang terbukti efektif',
                'icon' => '📊',
                'card_title' => 'Progress Tracking',
                'card_description' => 'Pantau perkembangan belajar dengan laporan detail dan analisis mendalam setiap minggu',
                'order' => 3
            ]
        ];

        foreach ($whyUsData as $data) {
            LandingpageWhyus::create($data);
        }

        // Subjects
        $subjectData = [
            [
                'title' => 'Matematika',
                'description' => 'Mulai dari dasar hingga tingkat olimpiade dengan metode yang mudah dipahami',
                'icon' => '📐',
                'order' => 1
            ],
            [
                'title' => 'Fisika',
                'description' => 'Pelajari konsep fisika dengan pendekatan praktis dan eksperimen virtual',
                'icon' => '⚗️',
                'order' => 2
            ],
            [
                'title' => 'Kimia',
                'description' => 'Kuasai reaksi kimia dan rumus dengan cara yang menyenangkan',
                'icon' => '🧪',
                'order' => 3
            ]
        ];

        foreach ($subjectData as $data) {
            LandingpageSubject::create($data);
        }

        // Testimonies
        $testimonyData = [
            [
                'name' => 'Nabila Azzahra',
                'school' => 'Siswa SMA Negeri 1 Jakarta',
                'message' => 'Sebelum belajar di Phymath, nilai matematika saya selalu di bawah KKM. Setelah 3 bulan belajar dengan metode mereka, nilai saya naik dari 65 jadi 90! Tutor nya sabar dan cara menjelaskannya mudah dipahami.',
                'photo' => 'img/testimony/img.png',
                'rating' => 5,
                'order' => 1
            ],
            [
                'name' => 'Ahmad Rizki',
                'school' => 'Siswa SMA Negeri 2 Bandung',
                'message' => 'Platform ini sangat membantu saya memahami fisika. Dengan animasi dan simulasi yang disediakan, konsep yang tadinya sulit jadi mudah dipahami. Recommended banget!',
                'photo' => 'img/testimony/img.png',
                'rating' => 5,
                'order' => 2
            ],
            [
                'name' => 'Siti Nurhaliza',
                'school' => 'Siswa SMA Negeri 3 Surabaya',
                'message' => 'Belajar kimia jadi menyenangkan dengan Phymath Education. Tutor nya sangat responsif dan selalu siap membantu ketika ada kesulitan. Nilai kimia saya meningkat drastis!',
                'photo' => 'img/testimony/img.png',
                'rating' => 5,
                'order' => 3
            ]
        ];

        foreach ($testimonyData as $data) {
            LandingpageTestimony::create($data);
        }

        // FAQ
        $faqData = [
            [
                'question' => 'Bagaimana sistem pembelajaran di Phymath Education?',
                'answer' => 'Kami menggunakan metode Personalized Learning yang menyesuaikan materi dan kecepatan belajar dengan kemampuan masing-masing siswa. Setiap siswa mendapat program pembelajaran yang dirancang khusus berdasarkan hasil assessment awal.',
                'order' => 1
            ],
            [
                'question' => 'Apakah tutor Phymath Education berkualitas?',
                'answer' => 'Semua tutor kami adalah lulusan universitas terbaik di Indonesia dengan IPK minimal 3.5. Mereka telah melalui proses seleksi ketat dan pelatihan khusus metodologi pengajaran. Pengalaman mengajar minimal 3 tahun dengan track record terbukti.',
                'order' => 2
            ],
            [
                'question' => 'Berapa lama waktu yang dibutuhkan untuk melihat peningkatan?',
                'answer' => 'Sebagian besar siswa mulai merasakan peningkatan pemahaman dalam 2-3 minggu pertama. Peningkatan nilai yang signifikan biasanya terlihat setelah 1-2 bulan pembelajaran konsisten. Namun, hasilnya dapat bervariasi tergantung kondisi awal dan konsistensi belajar.',
                'order' => 3
            ],
            [
                'question' => 'Apakah ada garansi jika tidak puas dengan hasilnya?',
                'answer' => 'Ya! Kami memberikan garansi 100% uang kembali jika Anda tidak puas dengan hasil pembelajaran dalam 30 hari pertama. Syarat dan ketentuan berlaku, termasuk harus mengikuti minimal 80% dari jadwal pembelajaran yang telah disepakati.',
                'order' => 4
            ],
            [
                'question' => 'Bagaimana cara mendaftar dan memulai pembelajaran?',
                'answer' => 'Proses pendaftaran sangat mudah! Klik tombol "Materi Belajar", pilih paket yang sesuai, lakukan pembayaran, dan Anda langsung bisa mengakses materi pembelajaran. Tim kami akan menghubungi untuk jadwal konsultasi awal dalam 24 jam.',
                'order' => 5
            ]
        ];

        foreach ($faqData as $data) {
            LandingpageFaq::create($data);
        }

        // Contact
        $contactData = [
            [
                'type' => 'phone',
                'label' => 'Customer Service',
                'value' => '+62 812-3456-7890',
                'icon' => 'ri-phone-line'
            ],
            [
                'type' => 'email',
                'label' => 'Email Utama',
                'value' => 'info@phymatheducation.com',
                'icon' => 'ri-mail-line'
            ],
            [
                'type' => 'address',
                'label' => 'Kantor Pusat',
                'value' => 'Jl. Pendidikan No. 12, Yogyakarta',
                'icon' => 'ri-map-pin-line'
            ],
            [
                'type' => 'social',
                'label' => 'Instagram',
                'value' => 'https://instagram.com/phymatheducation',
                'icon' => 'ri-instagram-line'
            ]
        ];

        foreach ($contactData as $data) {
            LandingpageContact::create($data);
        }

        // Methods (Metode Pembelajaran)
        $methodData = [
            [
                'title' => 'Pembelajaran Personal',
                'description' => 'Setiap siswa mendapat program pembelajaran yang disesuaikan dengan gaya belajar dan kemampuan individu masing-masing',
                'icon' => 'ri-user-star-line',
                'order' => 1
            ],
            [
                'title' => 'Live Interactive Class',
                'description' => 'Kelas interaktif langsung dengan tutor berpengalaman, diskusi real-time, dan sesi tanya jawab yang mendalam',
                'icon' => 'ri-live-line',
                'order' => 2
            ],
            [
                'title' => 'Adaptive Learning Technology',
                'description' => 'Teknologi pembelajaran adaptif yang menyesuaikan tingkat kesulitan berdasarkan progress dan pemahaman siswa',
                'icon' => 'ri-brain-line',
                'order' => 3
            ],
            [
                'title' => 'Gamifikasi Learning',
                'description' => 'Pembelajaran menjadi menyenangkan dengan sistem poin, badge, dan leaderboard untuk meningkatkan motivasi belajar',
                'icon' => 'ri-gamepad-line',
                'order' => 4
            ]
        ];

        foreach ($methodData as $data) {
            \App\Models\LandingpageMethod::create($data);
        }

        // Achievements (Pencapaian Siswa)
        $achievementData = [
            [
                'student_name' => 'Andi Pratama',
                'school' => 'SMA Negeri 1 Jakarta',
                'achievement' => 'Juara 1 Olimpiade Matematika Tingkat Nasional',
                'before_score' => '70',
                'after_score' => '95',
                'improvement' => '+25 poin',
                'description' => 'Berhasil meraih juara 1 olimpiade matematika setelah belajar intensif selama 6 bulan',
                'order' => 1
            ],
            [
                'student_name' => 'Sari Dewi',
                'school' => 'SMA Negeri 3 Bandung',
                'achievement' => 'Lolos SNBP ITB Teknik Elektro',
                'before_score' => '65',
                'after_score' => '88',
                'improvement' => '+23 poin',
                'description' => 'Berhasil lolos SNBP di ITB jurusan Teknik Elektro dengan nilai yang memuaskan',
                'order' => 2
            ],
            [
                'student_name' => 'Reza Firmansyah',
                'school' => 'SMA Negeri 2 Surabaya',
                'achievement' => 'Peringkat 5 Besar Nasional Try Out UTBK',
                'before_score' => '72',
                'after_score' => '92',
                'improvement' => '+20 poin',
                'description' => 'Masuk peringkat 5 besar nasional dalam try out UTBK dengan persiapan yang matang',
                'order' => 3
            ]
        ];

        foreach ($achievementData as $data) {
            \App\Models\LandingpageAchievement::create($data);
        }

        // Rating (Rating Keseluruhan)
        \App\Models\LandingpageRating::create([
            'category' => 'Kepuasan Siswa',
            'rating_value' => 4.9,
            'total_reviews' => 1250,
            'description' => 'Rating tinggi dari siswa dan orang tua yang puas dengan hasil pembelajaran'
        ]);
    }
}
