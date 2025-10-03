@extends('user.layout.user')
@section('title', 'Paket Pembelian')
@section('content')
<div class="dashboard">
    <x-page-desc title="Paket " description="Pilihan paket gratis hingga berbayar"></x-page-desc>
    <div class="flex flex-col md:flex-row md:items-center justify-between">
        <div class="flex justify-start gap-2 mt-4">
            <div id="btn-kelas" class="tab-btn px-6 py-1.5 bg-primary text-white rounded-xl cursor-pointer">
                Kelas
            </div>
            <div id="btn-tryout"
                class="tab-btn px-6 py-1.5 border border-primary text-primary rounded-xl cursor-pointer">
                Tryout
            </div>
            <div id="btn-sertifikasi"
                class="tab-btn px-6 py-1.5 border border-primary text-primary rounded-xl cursor-pointer">
                Sertifikasi
            </div>
        </div>

        <a href="{{ route('user.package.riwayatPembelian') }}" class="text-blue-600 underline mt-3 md:mt-0">Riwayat
            Pembelian</a>
    </div>

    <!-- Kelas Package -->
    <div id="kelas-package" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 text-gray-600">
        @forelse($kelasPackages as $package)
        <div class="bg-white px-5 py-5 shadow rounded-lg">
            <div class="w-full h-32 bg-gray-300 rounded-xl mb-4 overflow-hidden">
                @if($package->image)
                <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}"
                    class="w-full h-full object-cover">
                @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <i class="ri-image-line text-3xl text-gray-400"></i>
                </div>
                @endif
            </div>
            <p class="text-lg font-bold text-black">{{ $package->name }}</p>
            <p class="font-light">{{ $package->description }}</p>
            @if ($package->price == 0)
            <p class="font-bold text-black">Gratis</p>
            @else
            <p class="font-bold text-black">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
            @endif

            <div class="flex flex-col mt-4 gap-3 font-light">
                @if($package->features)
                @foreach ((array) json_decode($package->features, true) as $feature)
                <span>
                    <i class="ri-checkbox-circle-fill text-green-500"></i>
                    {{ $feature }}
                </span>
                @endforeach
                @endif
            </div>

            <div class="mt-4">
                @if($package->user_access_count > 0)
                <a href="{{ route('user.package.bimbel', $package->package_id) }}"
                    class="w-full bg-green-600 text-white px-4 py-3 rounded-lg font-bold text-center block">
                    SUDAH DIBELI
                </a>
                @else
                <form action="{{ route('user.package.buy', $package->package_id) }}" method="POST"
                    class="buy-package-form">
                    @csrf
                    <button type="submit" class="w-full bg-primary text-white px-4 py-3 rounded-lg font-bold">
                        {{ $package->price == 0 ? 'AMBIL GRATIS' : 'BELI SEKARANG' }}
                    </button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-8">
            <p class="text-gray-500">Belum ada paket kelas tersedia</p>
        </div>
        @endforelse
    </div>

    <!-- Tryout Package -->
    <div id="tryout-package" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 text-gray-600 hidden">
        @forelse($tryoutPackages as $package)
        <div class="flex flex-col justify-between bg-white px-5 py-5 shadow rounded-lg">
            <div>
                <div class="w-full h-32 bg-gray-300 rounded-xl mb-4 overflow-hidden">
                    @if($package->image)
                    <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}"
                        class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <i class="ri-image-line text-3xl text-gray-400"></i>
                    </div>
                    @endif
                </div>
                <p class="text-lg font-bold text-black">{{ $package->name }}</p>
                <p class="font-light">{{ $package->description }}</p>
                @if ($package->price == 0)
                <p class="font-bold text-black">Gratis</p>
                @else
                <p class="font-bold text-black">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                @endif

                <div class="flex flex-col mt-4 gap-3 font-light">
                    @if($package->features)
                    @foreach ((array) json_decode($package->features, true) as $feature)
                    <span>
                        <i class="ri-checkbox-circle-fill text-green-500"></i>
                        {{ $feature }}
                    </span>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="mt-4">
                @if($package->user_access_count > 0)
                <a href="{{ route('user.package.tryout', $package->package_id) }}"
                    class="w-full bg-green-600 text-white px-4 py-3 rounded-lg font-bold text-center block">
                    SUDAH DIBELI
                </a>
                @else
                <form action="{{ route('user.package.buy', $package->package_id) }}" method="POST"
                    class="buy-package-form">
                    @csrf
                    <button type="submit" class="w-full bg-primary text-white px-4 py-3 rounded-lg font-bold">
                        {{ $package->price == 0 ? 'AMBIL GRATIS' : 'BELI SEKARANG' }}
                    </button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-8">
            <p class="text-gray-500">Belum ada paket tryout tersedia</p>
        </div>
        @endforelse
    </div>

    <!-- Sertifikasi Package -->
    <div id="sertifikasi-package"
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 text-gray-600 hidden">
        @forelse($sertifikasiPackages as $package)
        <div class="bg-white px-5 py-5 shadow rounded-lg">
            <div class="w-full h-32 bg-gray-300 rounded-xl mb-4 overflow-hidden">
                @if($package->image)
                <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}"
                    class="w-full h-full object-cover">
                @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <i class="ri-image-line text-3xl text-gray-400"></i>
                </div>
                @endif
            </div>
            <p class="text-lg font-bold text-black">{{ $package->name }}</p>
            <p class="font-light">{{ $package->description }}</p>
            @if ($package->price == 0)
            <p class="font-bold text-black">Gratis</p>
            @else
            <p class="font-bold text-black">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
            @endif

            <div class="flex flex-col mt-4 gap-3 font-light">
                @if($package->features)
                @foreach ((array) json_decode($package->features, true) as $feature)
                <span>
                    <i class="ri-checkbox-circle-fill text-green-500"></i>
                    {{ $feature }}
                </span>
                @endforeach
                @endif
            </div>

            <div class="mt-4">
                @if($package->user_access_count > 0)
                <a href="{{ route('user.package.bimbel', $package->package_id) }}"
                    class="w-full bg-green-600 text-white px-4 py-3 rounded-lg font-bold text-center block">
                    SUDAH DIBELI
                </a>
                @else
                <form action="{{ route('user.package.buy', $package->package_id) }}" method="POST"
                    class="buy-package-form">
                    @csrf
                    <button type="submit" class="w-full bg-primary text-white px-4 py-3 rounded-lg font-bold">
                        {{ $package->price == 0 ? 'AMBIL GRATIS' : 'BELI SEKARANG' }}
                    </button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-8">
            <p class="text-gray-500">Belum ada paket sertifikasi tersedia</p>
        </div>
        @endforelse
    </div>

</div>

<!-- Loading Modal -->
<div id="loadingModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg">
        <div class="flex items-center">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary mr-3"></div>
            <p>Memproses pembayaran...</p>
        </div>
    </div>
</div>

<!-- Manual Payment Modal -->
<div id="manualPaymentModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center px-4" role="dialog" aria-modal="true" aria-labelledby="manualModalTitle" tabindex="-1">
    <div id="manualModalContent" class="bg-white w-full max-w-xl rounded-lg p-6 shadow-2xl border border-border transition ease-out duration-200 transform opacity-0 translate-y-4 scale-95" role="document">
        <div class="flex items-start justify-between">
            <div>
                <h3 id="manualModalTitle" class="text-xl font-bold text-gray-800">Pembayaran Manual (Transfer)</h3>
                <p class="text-gray-500 text-sm mt-1">Silakan transfer sesuai nominal lalu unggah bukti.
                </p>
            </div>
            <button type="button" id="manualCloseBtn" class="text-gray-400 hover:text-gray-600">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="border border-border rounded-lg p-4">
                <p class="text-sm text-gray-500">Bank Tujuan</p>
                <p class="font-semibold text-gray-800" id="bankName">{{ config('payment.manual.bank_name') }}</p>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">No. Rekening</p>
                    <p class="font-mono font-semibold text-gray-800" id="bankAccountNumber">{{ config('payment.manual.account_number') }}</p>
                </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Atas Nama</p>
                    <p class="font-semibold text-gray-800" id="bankAccountName">{{ config('payment.manual.account_name') }}</p>
                </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Instruksi</p>
                    <p class="text-sm text-gray-700" id="bankInstructions">{{ config('payment.manual.instructions') }}</p>
                </div>
            </div>
            <div class="border border-border rounded-lg p-4">
                <p class="text-sm text-gray-500">Informasi Transaksi</p>
                <p class="text-gray-800">ID Transaksi:</p>
                <p class="font-mono font-semibold text-gray-800" id="transactionId">-</p>
                <div class="mt-2">
                    <p class="text-gray-800">Total Pembayaran:</p>
                    <p class="text-2xl font-bold text-primary" id="totalAmount">Rp -</p>
                </div>
            </div>
        </div>

        <form id="manualPaymentForm" class="mt-6" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (opsional)</label>
                    <input type="text" name="notes" class="w-full border border-border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary" placeholder="Contoh: Waktu transfer">
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Pembayaran</label>
                <input id="manualProofInput" type="file" name="proof" accept="image/*" class="w-full border border-border rounded-lg px-3 py-2">
                <p class="text-xs text-gray-500 mt-1">Format JPG/PNG/WEBP, maks 4MB</p>
            </div>

            <div class="flex items-center justify-end gap-3 mt-6">
                <button type="button" id="manualCancelBtn" class="px-4 py-2 border border-border text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold">Kirim Bukti</button>
            </div>
        </form>
    </div>
    
    <script>
        // Prevent form submission on Enter in file input context
    </script>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        const tabs = ['kelas', 'tryout', 'sertifikasi'];
        const manualUploadUrlTemplate = "{{ route('user.package.manual.upload', '__ID__') }}";

        function activateTab(active) {
            tabs.forEach(tab => {
                const container = $(`#${tab}-package`);
                const button = $(`#btn-${tab}`);

                if (tab === active) {
                    container.removeClass('hidden').addClass('grid');
                    button.addClass('bg-primary text-white').removeClass('border border-primary text-primary');
                } else {
                    container.addClass('hidden').removeClass('grid');
                    button.removeClass('bg-primary text-white').addClass('border border-primary text-primary');
                }
            });
        }

        // Tab click events
        tabs.forEach(tab => {
            $(`#btn-${tab}`).click(function() {
                activateTab(tab);
            });
        });

        // Handle buy package form submission
        $('.buy-package-form').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const button = form.find('button[type="submit"]');
            const originalText = button.text();

            // Show loading state
            button.prop('disabled', true).text('Memproses...');
            $('#loadingModal').removeClass('hidden').addClass('flex');

            // Submit form
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Hide loading
                    $('#loadingModal').addClass('hidden').removeClass('flex');

                    if (response.manual) {
                        // Fill manual modal data
                        $('#transactionId').text(response.transaction_id);
                        const formatted = new Intl.NumberFormat('id-ID').format(response.amount);
                        $('#totalAmount').text('Rp ' + formatted);
                        if (response.bank) {
                            $('#bankName').text(response.bank.name);
                            $('#bankAccountNumber').text(response.bank.account_number);
                            $('#bankAccountName').text(response.bank.account_name);
                            $('#bankInstructions').text(response.bank.instructions ?? '');
                        }

                        // Set upload action URL
                        const uploadUrl = manualUploadUrlTemplate.replace('__ID__', response.payment_id);
                        $('#manualPaymentForm').attr('action', uploadUrl);

                        // Open modal
                        openManualModal();
                        return;
                    }

                    if (response.redirect_url) {
                        // Redirect to Xendit payment page
                        window.location.href = response.redirect_url;
                    } else if (response.success) {
                        // For free packages, reload page or show success
                        location.reload();
                    }
                },
                error: function(xhr) {
                    // Hide loading
                    $('#loadingModal').addClass('hidden').removeClass('flex');
                    button.prop('disabled', false).text(originalText);

                    let errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    alert(errorMessage);
                }
            });
        });

        // Initialize first tab
        activateTab('kelas');

        function openManualModal() {
            const $overlay = $('#manualPaymentModal');
            const $content = $('#manualModalContent');
            $overlay.removeClass('hidden').addClass('flex');
            // animate in
            requestAnimationFrame(() => {
                $content.removeClass('opacity-0 translate-y-4 scale-95').addClass('opacity-100 translate-y-0 scale-100');
            });
            $('body, html').addClass('overflow-hidden');
            $('#manualProofInput').trigger('focus');
        }

        function closeManualModal() {
            const $overlay = $('#manualPaymentModal');
            const $content = $('#manualModalContent');
            // animate out
            $content.addClass('opacity-0 translate-y-4 scale-95').removeClass('opacity-100 translate-y-0 scale-100');
            setTimeout(() => {
                $overlay.addClass('hidden').removeClass('flex');
                $('body, html').removeClass('overflow-hidden');
            }, 180);
        }

        // Manual modal close/cancel
        $('#manualCloseBtn, #manualCancelBtn').on('click', function() {
            closeManualModal();
        });

        // Close on outside click
        $('#manualPaymentModal').on('click', function(e) {
            if (e.target === this) {
                closeManualModal();
            }
        });

        // Close on ESC
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                closeManualModal();
            }
        });

        // Handle manual proof upload
        $('#manualPaymentForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this)[0];
            const data = new FormData(form);

            const submitBtn = $('#manualPaymentForm button[type="submit"]');
            const original = submitBtn.text();
            submitBtn.prop('disabled', true).text('Mengunggah...');

            $.ajax({
                url: $('#manualPaymentForm').attr('action'),
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(resp) {
                    submitBtn.prop('disabled', false).text(original);
                    if (resp.redirect_url) {
                        window.location.href = resp.redirect_url;
                        return;
                    }
                    if (resp.success) {
                        alert(resp.message || 'Bukti pembayaran berhasil diunggah.');
                        closeManualModal();
                    }
                },
                error: function(xhr) {
                    submitBtn.prop('disabled', false).text(original);
                    let msg = 'Gagal mengunggah. Coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) { msg = xhr.responseJSON.message; }
                    alert(msg);
                }
            });
        });
    });
</script>
@endsection

@section('styles')
<style>
    .buy-package-form button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>
@endsection
