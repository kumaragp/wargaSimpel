<body class="bg-gray-100 font-inter flex items-center justify-center min-h-screen">
    @include('navbar.navbar')
    <div class="shadow-lg p-8 w-full max-w-xl">
        <h1 class="text-6xl font-bold text-green-800 text-center mb-10">DAFTAR AKUN</h1>
        <form action="#" method="POST">
            <div class="mb-4">
                <input type="email" placeholder="Email" class="w-full p-2 rounded border placeholder-gray-700 bg-emerald-200 border-black focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
            <div class="mb-4">
                <input type="text" placeholder="Nama Pengguna" class="w-full p-2 rounded border placeholder-gray-700 bg-emerald-200 border-black focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
            <div class="mb-4">
                <input type="password" placeholder="Password Baru" class="w-full p-2 rounded border placeholder-gray-700 bg-emerald-200 border-black focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
            <div class="mb-2">
                <input type="password" placeholder="Konfirmasi Password" class="w-full p-2  rounded border placeholder-gray-700 bg-emerald-200 border-black focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
            <p class="text-sm text-gray-600 mb-4">* Min. 8 Karakter</p>
            <div class="flex justify-center items-center space-x-10">
            <a href="{{route('login')}}" class="bg-white text-emerald-500 py-1 px-4 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">Buat Akun</a>
            <a href="{{route('login')}}" class="text-emerald-500 underline">Sudah Punya Akun</a>
        </div>
        </form>
    </div>
</body>
</html>