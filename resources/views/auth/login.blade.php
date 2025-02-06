<body class="bg-gray-100 font-inter flex items-center justify-center min-h-screen">
    @include('navbar.navbar')
    <div class="shadow-lg p-8 w-full max-w-xl">
        <h1 class="text-6xl font-bold text-green-800 text-center mb-10">MASUK AKUN</h1>
        <form action="#" method="POST">
            <div class="mb-4">
                <input type="email" placeholder="Email" class="w-full p-2 rounded border placeholder-gray-700 bg-emerald-200 border-black focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
            <div class="mb-2">
                <input type="password" placeholder="Password" class="w-full p-2  rounded border placeholder-gray-700 bg-emerald-200 border-black focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
            <p class="text-sm text-gray-600 mb-4">* Min. 8 Karakter</p>
            <div class="flex justify-center items-center space-x-10">
            <a href="{{route('register')}}" class="text-emerald-500 underline">Belum Punya Akun?<b>Daftar Disini</b></a>
            <a href="{{route('home')}}" class="bg-white text-emerald-500 py-1 px-4 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">Masuk</a>
        </div>
        <div class="my-4 flex items-center">
            <div class="flex-grow border-t border-gray-900"></div>
            <!-- <span class="px-4 text-sm text-black">atau</span> -->
            <div class="flex-grow border-t border-gray-900"></div>
        </div>
        <div class="flex justify-center">
            <button class="flex items-center bg-green-800 text-green-200 font-semibold py-2 px-4 rounded-full hover:bg-green-700">
                <img src="images/google.png" alt="Google Logo" class="w-5 h-5 mr-2">Masuk via <span class="font-bold ml-1">Google</span>
            </button>
        </div>
        </form>
    </div>
</body>
</html>