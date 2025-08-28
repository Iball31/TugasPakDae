<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplikasi Anda</title>
    
    <!-- Memuat Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Memuat Font Inter dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        // Konfigurasi custom untuk Tailwind CSS jika diperlukan
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Menambahkan style dasar untuk body */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <!-- Container Utama -->
    <div class="flex items-center justify-center min-h-screen px-4">
        
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 space-y-6">
            
            <!-- Header Form -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Selamat Datang Kembali</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Silakan masuk untuk melanjutkan</p>
            </div>

            <!-- Form Login -->
            <!-- Ganti action="/login" sesuai dengan route yang Anda definisikan di web.php -->
            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                <!-- Token CSRF untuk keamanan -->
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                               placeholder="anda@email.com"
                               value="{{ old('email') }}">
                    </div>
                    <!-- Menampilkan pesan error validasi untuk email -->
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                               placeholder="••••••••">
                    </div>
                     <!-- Menampilkan pesan error validasi untuk password -->
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Opsi "Ingat Saya" dan "Lupa Password" -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Ingat saya</label>
                    </div>

                    <div class="text-sm">
                        <!-- Ganti href="#" dengan route untuk lupa password -->
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                        Masuk
                    </button>
                </div>
            </form>
            
            <!-- Link ke Halaman Registrasi -->
            <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                Belum punya akun?
                <!-- Ganti href="#" dengan route untuk registrasi -->
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                    Daftar di sini
                </a>
            </p>

        </div>
    </div>

</body>
</html>
