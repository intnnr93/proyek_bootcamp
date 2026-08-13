<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Destinasi | Wisata Sukabumi</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Google Fonts: Inter (Body) & Playfair Display (Judul) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind Config Custom Colors & Fonts -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#9b111e ',
                            500: '#9b111e ', 
                            600: '#9b111e ', 
                            700: '#9b111e ', 
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased text-slate-800 bg-rose-100 selection:bg-brand-500 selection:text-white min-h-screen flex flex-col justify-center items-center py-12 md:py-20" style="background-image: url('{{ asset('images/sunset.jpg') }}');">

    <main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- BAGIAN HEADER/JUDUL -->
        <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16">
            <h2 class="text-brand-600 font-serif font-bold tracking-widest uppercase text-xs md:text-sm mb-3">Eksplorasi Sukabumi</h2>
            <h3 class="text-3xl md:text-5xl font-serif font-bold text-slate-900 mb-6 tracking-tight">Destinasi Wisata</h3>
            <p class="text-slate-500 font-serif text-base md:text-lg leading-relaxed">
                Dari jembatan gantung di tengah hutan pinus hingga keajaiban warisan geologi dunia, temukan pesona alam terbaik di Sukabumi.
            </p>
        </div>

        <!-- GRID DESTINASI -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full">
            
          @foreach ($links as $link)
            <!-- CARD DINAMIS -->
            <a href="{{ route('public.redirect', $link->id) }}" target="_blank" rel="noopener noreferrer" class="group rounded-2xl overflow-hidden bg-slate-50 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                <div class="relative h-64 overflow-hidden shrink-0 bg-slate-200">
                    
                    <!-- Logika Pengecekan Gambar -->
                    @if ($link->image)
                        <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <!-- Placeholder jika gambar belum diupload -->
                        <div class="w-full h-full flex flex-col items-center justify-center bg-pink-100 group-hover:scale-110 transition-transform duration-700">
                            <i data-lucide="mountain-snow" class="w-12 h-12 text-slate-300 mb-2"></i>
                            <span class="text-xs font-semibold text-slate-400">Tanpa Gambar</span>
                        </div>
                    @endif

                    <!-- Label Pojok Kanan Atas -->
                    <div class="absolute top-4 right-4 bg-pink/95 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-bold text-pink-800 shadow-sm flex items-center gap-1.5">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-brand-500"></i> Eksplorasi
                    </div>
                </div>
                
                <div class="p-6 flex flex-col flex-grow">
                    <!-- Judul Destinasi -->
                    <h4 class="text-xl font-bold text-slate-900 mb-2 font-serif group-hover:text-brand-600 transition-colors">{{ $link->title }}</h4>
                    
                    <!-- Deskripsi (Jika ada di DB, jika tidak pakai teks default) -->
                    <p class="text-slate-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                        {{ $link->description ?? 'Jelajahi pesona alam dan keindahan destinasi wisata ini. Klik untuk melihat detail lokasi, rute, dan informasi selengkapnya.' }}
                    </p>
                    
                    <div class="mt-auto flex items-center text-sm font-semibold text-brand-600 group-hover:text-brand-700 transition-colors">
                        Jelajahi Lokasi <i data-lucide="chevron-right" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        
        <!-- PAGINATION -->
        <div class="mt-12 w-full flex justify-center">
            {{ $links->links('vendor.pagination.custom-public') }}
        </div>

    </main>  

    <script>
        lucide.createIcons();

        const modal = document.getElementById('contact-modal');
        const modalContent = document.getElementById('modal-content');

        function openModal() {
            modal.classList.remove('hidden');
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('translate-y-full');
            });
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.add('translate-y-full');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>
</body>

</html>