<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Kelola Destinasi Sukabumi')</title>

    <!-- 1. Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 2. Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        'neo': '4px 4px 0px 0px rgba(15, 23, 42, 1)',
                        'neo-sm': '2px 2px 0px 0px rgba(15, 23, 42, 1)',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#ffc0cb ] text-slate-800 antialiased selection:bg-pink-300 selection:text-pink-900 min-h-screen flex flex-col overflow-x-hidden">

    <!-- Responsive Modern Navbar -->
    <nav class="bg-gradient-to-r from-slate-900 via-pink-900 to-indigo-950 text-white shadow-xl sticky top-0 z-50 border-b border-pink-800/40 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="bg-gradient-to-tr from-pink-500 to-indigo-400 text-white p-2 sm:p-2.5 rounded-xl sm:rounded-2xl shadow-lg shadow-pink-500/30 border border-pink-400/30">
                        <i data-lucide="link" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg sm:text-xl tracking-tight bg-gradient-to-r from-white via-pink-100 to-pink-300 bg-clip-text text-transparent">Admin Wisata Sukabumi</span>
                        <span class="hidden sm:block text-[10px] text-pink-300 font-semibold uppercase tracking-widest leading-none mt-0.5">Daftar Destinasi</span>
                    </div>
                </div>
                
                <!-- Nav Links -->
                <div class="flex items-center space-x-2 sm:space-x-4">

                    <!-- MENU DASHBOARD (Navigasi ke Dashboard Analytics) -->
                    <a href="{{ route('admin.dashboard') }}" class="text-pink-200 hover:text-white hover:bg-pink/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2">
                        <i data-lucide="bar-chart-3" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Dashboard</span>
                    </a>
                    <a href="{{ route('admin.links.index') ?? '#' }}" class="text-pink-200 hover:text-white hover:bg-pink/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Manage Links</span>
                    </a>
                    
                    <!-- Preview Button -->
                    <a href="/" target="_blank" class="bg-pink-200 hover:bg-pink-300 text-slate-950 font-bold px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl text-xs sm:text-sm transition-all duration-200 flex items-center gap-1.5 sm:gap-2 shadow-lg shadow-pink-500/20 hover:shadow-pink-500/40 border border-pink-100">
                        <span class="hidden sm:inline">Preview Public</span>
                        <span class="sm:hidden">Preview</span>
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>

                    <!-- Form Aksi Logout (HTTP POST) -->
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                         @csrf
                        <button type="submit"
                                class="bg-rose-400 hover:bg-rose-400 text-slate-900 font-bold text-xs sm:text-sm px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all flex items-center gap-1.5 sm:gap-2">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="max-w-7xl mx-auto py-6 sm:py-10 px-4 sm:px-6 lg:px-8 flex-grow w-full">
         
        <!-- Flash Message Notification (Success) -->
        @if(session('success'))
            <div class="mb-6 p-4 sm:p-5 bg-pink-200 text-pink-950 font-extrabold rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#cc3366] flex items-center gap-3">
                <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-800 shrink-0"></i>
                <span class="text-sm sm:text-base">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 text-center py-6 px-4 text-xs font-medium text-slate-500 mt-auto">
        &copy; {{ date('Y') }} Destinasi Wisata Sukabumi &bull; Daftar Destinasi
    </footer>

    <!-- 3. Inisialisasi Script Lucide -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>