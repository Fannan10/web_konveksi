<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marchetti Konveksi - Custom Apparel Modern</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- 1. NAVIGATION BAR (Consistency Rule) -->
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md shadow-sm border-b border-gray-100">
        <div class="max-w-7xl px-6 py-4 flex justify-between items-center mx-auto">
            <a href="#" class="text-2xl font-bold tracking-tight text-amber-500">Marchetti<span class="text-gray-900">Konveksi</span></a>
            <div class="hidden md:flex space-x-8 font-medium">
                <a href="#katalog" class="hover:text-amber-500 transition">Katalog Produk</a>
                <a href="#berita" class="hover:text-amber-500 transition">Berita & Informasi</a>
                <a href="#tentang-kami" class="text-slate-600 hover:text-amber-500 font-medium transition">Tentang Kami</a>
            </div>
            <a href="https://wa.me/6281260684026" target="_blank" class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 rounded-full font-semibold flex items-center gap-2 shadow-sm transition">
                <i class="fab fa-whatsapp text-lg"></i> Hubungi Kami
            </a>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    <header class="relative bg-gradient-to-br from-gray-900 to-gray-800 text-white py-24 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center relative z-10">
            <div class="space-y-6">
                <span class="bg-amber-500/10 text-amber-400 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase">Vendor Konveksi Terpercaya</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Ekspresikan Identitas Timmu Lewat Pakaian Berkualitas</h1>
                <p class="text-lg text-gray-300">Kami melayani pembuatan T-Shirt, PDH (Korsa), dan Jersey custom dengan bahan premium serta pengerjaan tepat waktu.</p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#katalog" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-3.5 rounded-xl font-bold shadow-lg shadow-amber-500/20 transition text-center">Lihat Katalog</a>
                    <a href="#cara-pesan" class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-3.5 rounded-xl font-bold transition text-center">Cara Pemesanan</a>
                </div>
            </div>
            <div class="hidden md:block relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-500 rounded-2xl blur opacity-30 animate-pulse"></div>
                <img src="{{ asset('images/header-foto.png') }}" alt="Produksi Konveksi" class="rounded-2xl shadow-2xl relative w-full object-cover h-[400px]">
            </div>
        </div>
    </header>

    <!-- 3. KATALOG PRODUK (Dinamis dari Dashboard Admin) -->
<section id="katalog" class="py-24 px-6 max-w-7xl mx-auto">
    <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900">Katalog Produk Unggulan</h2>
        <p class="text-gray-500 text-lg">Pilih kategori pakaian yang ingin kamu produksi di bawah ini dan konsultasikan detail desainmu secara langsung.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @forelse($galleries as $gallery)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
                <div>
                    <div class="relative overflow-hidden h-64 bg-gray-100">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?auto=format&fit=crop&w=600&q=80" alt="Default Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @endif
                        <span class="absolute top-4 left-4 bg-gray-900/80 backdrop-blur-md text-white px-3 py-1 rounded-md text-xs font-semibold uppercase tracking-wider">Produk</span>
                    </div>
                    <div class="p-6 space-y-3">
                        <h3 class="text-xl font-bold text-gray-900">{{ $gallery->title }}</h3>
                        <!-- Deskripsi otomatis/statis alternatif jika deskripsi tidak ada di DB -->
                        <p class="text-gray-500 text-sm leading-relaxed">Kustomisasi produk premium berkualitas tinggi untuk kebutuhan tim, organisasi, atau komunitas Anda.</p>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="https://wa.me/6281260684026?text=Halo%20Marchetti%20Konveksi,%20saya%20tertarik%20untuk%20memesan%20produk%20*{{ urlencode($gallery->title) }}*." target="_blank" class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 rounded-xl font-bold flex items-center justify-center gap-2 transition shadow-sm">
                        Pilih Produk Ini <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-400 col-span-3 text-center py-8">Belum ada foto produk yang diunggah di galeri admin.</p>
        @endforelse
    </div>
</section>

    <!-- 4. ALUR TRANSAKSI VIA WHATSAPP (Informative Feedback) -->
    <section id="cara-pesan" class="bg-white py-24 px-6 border-y border-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Sistem Transaksi Mudah</h2>
                <p class="text-gray-500">Tanpa ribet pengisian form pembayaran otomatis, kami memprioritaskan komunikasi personal yang ramah lewat WhatsApp.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-12 relative">
                <!-- Langkah 1 -->
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center text-2xl font-black mx-auto shadow-sm">1</div>
                    <h3 class="text-xl font-bold text-gray-900">Pilih Produk</h3>
                    <p class="text-gray-500 text-sm max-w-xs mx-auto">Tentukan jenis produksi pakaian yang diinginkan melalui deretan katalog produk di atas.</p>
                </div>
                <!-- Langkah 2 -->
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl font-black mx-auto shadow-sm">2</div>
                    <h3 class="text-xl font-bold text-gray-900">Kirim Ke WhatsApp</h3>
                    <p class="text-gray-500 text-sm max-w-xs mx-auto">Klik tombol pesanan untuk secara otomatis membuka aplikasi WhatsApp dengan pesan teks template otomatis.</p>
                </div>
                <!-- Langkah 3 -->
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center text-2xl font-black mx-auto shadow-sm">3</div>
                    <h3 class="text-xl font-bold text-gray-900">Transaksi & Produksi</h3>
                    <p class="text-gray-500 text-sm max-w-xs mx-auto">Lakukan negosiasi harga, penentuan ukuran baju, kesepakatan desain, serta transfer pembayaran aman langsung dipandu oleh admin.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. BERITA SECTION (Dari Database Filament) -->
    <section id="berita" class="py-24 px-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-end mb-12">
            <div class="space-y-3">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Berita Terbaru Konveksi</h2>
                <p class="text-gray-500">Ikuti perkembangan proyek produksi dan info seputar operasional Marchetti Konveksi.</p>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between">
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="bg-amber-100 text-amber-700 px-2.5 py-0.5 rounded text-xs font-semibold uppercase">{{ $post->type }}</span>
                            <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($post->published_at)->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 hover:text-amber-500 transition line-clamp-2">
    <a href="{{ route('berita.detail', $post->id) }}">
        {{ $post->title }}
    </a>
</h3>
                        <div class="text-gray-500 text-sm line-clamp-3 leading-relaxed">{!! $post->content !!}</div>
                    </div>
                </article>
            @empty
                <p class="text-gray-400 col-span-3 text-center py-8">Belum ada berita yang diterbitkan.</p>
            @endforelse
        </div>
    </section>

	<!-- SEKSI TENTANG KAMI & STRUKTUR ORGANISASI -->
<section id="tentang-kami" class="py-16 bg-white border-t border-slate-100">
    <div class="max-w-6xl mx-auto px-4">
        
        <!-- Judul Seksi -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Tentang Marchetti Konveksi</h2>
            <p class="mt-3 text-slate-600 text-sm md:text-base leading-relaxed">
                Kami adalah konveksi terpercaya di Yogyakarta yang berkomitmen menghasilkan pakaian kustom berkualitas tinggi. Kenali tim profesional di balik setiap jahitan produk kami.
            </p>
        </div>

        <!-- Grid Kartu Organisasi (Menggunakan variabel $team dari controllermu) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($team as $member)
                <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-200 hover:shadow-lg hover:border-amber-400 transition duration-300 flex flex-col items-center">
                    
                    <!-- Foto Anggota Tim -->
                    <div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-2 border-amber-400 shadow-sm bg-white flex items-center justify-center">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-3xl text-slate-300"></i>
                        @endif
                    </div>

                    <!-- Nama & Jabatan -->
                    <h3 class="font-bold text-lg text-slate-900">{{ $member->name }}</h3>
                    <span class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-3 py-1 rounded-full mt-1 mb-3">
                        {{ $member->position ?? 'Tim Marchetti' }}
                    </span>

                    <!-- Deskripsi (Jika ada) -->
                    @if($member->description)
                        <p class="text-xs text-slate-500 line-clamp-2 mt-auto">
                            {{ $member->description }}
                        </p>
                    @endif

                </div>
            @empty
                <!-- Tampil jika database organisasi masih kosong -->
                <div class="col-span-full text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                    <i class="fas fa-users text-4xl text-slate-300 mb-3 block"></i>
                    <p class="text-slate-500 text-sm font-medium">Struktur organisasi sedang diperbarui oleh Admin.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

    <!-- FOOTER -->
    <footer class="bg-gray-950 text-gray-400 py-12 px-6 border-t border-gray-900 text-center">
        <p class="text-sm">&copy; 2026 Marchetti Konveksi.</p>
    </footer>

</body>
</html>