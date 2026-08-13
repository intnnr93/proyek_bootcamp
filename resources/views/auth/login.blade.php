<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Area - Data Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            /* GANTI URL DI BAWAH DENGAN LOKASI GAMBAR 3D YANG KAMU SIMPAN */
            background-image: url('/images/love.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        /* Efek Kaca (Glassmorphism) untuk Form */
        .glass-card {
            background: rgba(255, 235, 245, 0.6); /* Warna pink keputihan sangat transparan */
            backdrop-filter: blur(12px); /* Efek blur di belakang form */
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="min-h-screen font-sans antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <!-- Container Utama -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md px-4 relative z-10">

        <!-- Form Container Card dengan perpaduan Glassmorphism & Neo-Brutalism -->
        <div class="glass-card border-[3px] border-slate-900 rounded-3xl p-6 sm:p-8 shadow-[8px_8px_0px_0px_#cc3366]">

        <!-- Header Brand di dalam Card -->
            <div class="text-center mb-8 flex flex-row items-center justify-center gap-3">
                <i data-lucide="lock" class="w-8 h-8 text-slate-900 stroke-[2.5]"></i>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Login Admin</h1>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Display Alert Error -->
                @if($errors->any())
                    <div class="bg-rose-100/90 border-2 border-rose-900 p-3 rounded-xl flex items-start gap-2 mb-4">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-rose-700 shrink-0"></i>
                        <p class="text-sm font-bold text-rose-900">{{ $errors->first() }}</p>
                    </div>
                @endif

                <!-- Input Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-extrabold text-slate-900">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 bg-white/90 border-2 border-slate-900 rounded-xl focus:outline-none focus:ring-4 focus:ring-pink-400/50 focus:border-slate-900 font-bold text-slate-900 transition-all placeholder:text-slate-500">
                </div>

                <!-- Input Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-extrabold text-slate-900">Kata Sandi</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 bg-white/90 border-2 border-slate-900 rounded-xl focus:outline-none focus:ring-4 focus:ring-pink-400/50 focus:border-slate-900 font-bold text-slate-900 transition-all placeholder:text-slate-500">
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-white hover:bg-pink-100 text-slate-900 font-extrabold py-3.5 rounded-xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all flex items-center justify-center gap-2">
                        Masuk Dashboard <i data-lucide="arrow-right" class="w-5 h-5 stroke-[3]"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>