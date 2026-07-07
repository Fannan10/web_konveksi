<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Marchetti Konveksi</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- NAVIGATION BAR -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-4xl px-6 py-4 flex justify-between items-center mx-auto">
            <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-amber-500">
                <i class="fas fa-arrow-left text-sm mr-2"></i> Kembali ke Beranda
            </a>
            <span class="text-gray-900 font-bold">Marchetti<span class="text-amber-500">Konveksi</span></span>
        </div>
    </nav>

    <!-- CONTENT SECTION -->
    <main class="max-w-3xl mx-auto px-6 py-16 space-y-8">
        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded text-xs font-semibold uppercase">{{ $post->type }}</span>
                <span class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($post->published_at)->format('d M Y') }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                {{ $post->title }}
            </h1>
        </div>

        <hr class="border-gray-200">

        <!-- Isi Berita Utama -->
        <article class="prose max-w-none text-gray-600 leading-relaxed text-lg space-y-6">
            {!! $post->content !!}
        </article>
        
        <hr class="border-gray-200 pt-6">
        
        <!-- Call to Action Banner di bawah berita -->
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white p-8 rounded-2xl flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="space-y-2 text-center md:text-left">
                <h3 class="text-xl font-bold">Tertarik Produksi Pakaian Custom?</h3>
                <p class="text-gray-300 text-sm">Konsultasikan kebutuhan T-Shirt, PDH, atau Jersey timmu sekarang juga.</p>
            </div>
            <a href="https://wa.me/6281260684026" target="_blank" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 shadow-md transition whitespace-nowrap">
                <i class="fab fa-whatsapp text-xl"></i> Hubungi via WhatsApp
            </a>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-950 text-gray-500 py-8 text-center text-sm border-t border-gray-900">
        <p>&copy; 2026 Marchetti Konveksi. All rights reserved.</p>
    </footer>

</body>
</html>