<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat</title>
    <link rel="shortcut icon" type="image/png/jpg" href="images/logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-transparent flex items-center justify-center min-h-screen">
    <header class="bg-green-950 shadow">
        <nav
            class="w-full flex flex-wrap items-center justify-between py-4 px-10 fixed top-0 left-0 right-0 bg-green-950 shadow-md z-50">
            <div class="flex-grow flex justify-center md:justify-start">
                <a href="{{ route('home') }}">
                    <img src="images/wargasimpel.png" class="w-40 lg:w-64 h-auto">
                </a>
            </div>
            <ul class="hidden md:flex md:space-x-6 lg:space-x-10">
                <li>
                    <a href="{{ route('home') }}"
                        class="block text-center bg-emerald-500 text-green-950 py-2 px-4 sm:py-2 sm:px-6 text-sm sm:text-md md:text-lg rounded-lg hover:bg-gray-300 transition-all duration-300">
                        BERANDA
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <title>Profile</title>
    <div class="backdrop-blur-md p-6 text-center w-full max-w-xl pt-20">
        <h2 class="text-6xl font-bold text-green-800 mb-6">PROFIL AKUN</h2>
        <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            <div class="relative w-24 h-24 mx-auto mb-6">
                <img id="profileImage"
                    src="{{ $profile->image ? asset('storage/' . $profile->image) : asset('images/default.png') }}"
                    class="w-24 h-24 rounded-full border-4 border-green-950 shadow-md object-cover">
                <input type="file" id="imageUpload" name="image" accept="image/*" class="hidden"
                    onchange="previewImage(event)">
                <img src="{{ asset('images/add.png') }}" class="absolute bottom-0 right-0 w-8 h-8 cursor-pointer"
                    onclick="document.getElementById('imageUpload').click();">
            </div>
            @error('image')
                <p class="text-red-500 text-sm text-center">ukuran gambar tidak boleh lebih dari 10mb!</p>
            @enderror
            <div>
                <input type="text" id="nama" name="nama" placeholder="Nama Pengguna"
                    value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500"
                    disabled>
                <p class="text-sm text-gray-700 text-left">*username</p>
            </div>
            <div>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500"
                    disabled>
                <p class="text-sm text-gray-700 text-left">*email</p>
            </div>
            <div>
                <input type="text" id="nik" name="nik" placeholder="NIK" value="{{ old('nik', $profile->nik) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500">
                @error('nik')
                    <p class="text-red-500 text-sm text-left">nik harus berjumlah 16 angka</p>
                @enderror
            </div>
            <div>
                <input type="text" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap"
                    value="{{ old('namaLengkap', $profile->nama_lengkap) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500">
            </div>
            <div>
                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                    value="{{ old('tempat_lahir', $profile->tempat_lahir) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500">
            </div>
            <div>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500">
            </div>
            <div class="relative border-gray-400">
                <select id="jenis_kelamin" name="jenis_kelamin"
                    class="peer w-full px-4 py-2 border border-gray-400 rounded-lg shadow-sm focus:outline-none focus:ring-2 bg-green-200 ocus:ring-emerald-500 text-gray-700">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="Pria" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>
                        Pria</option>
                    <option value="Wanita" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                </select>
            </div>
            <div>
                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
                    value="{{ old('pekerjaan', $profile->pekerjaan) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500">
            </div>
            <div>
                <input type="text" id="alamat" name="alamat" placeholder="Alamat"
                    value="{{ old('alamat', $profile->alamat) }}"
                    class="w-full px-4 py-2 border border-gray-400 rounded-lg placeholder-gray-700 focus:outline-none focus:ring-2 bg-green-200 focus:ring-emerald-500">
            </div>
            <button type="submit" id="editButton"
                class="bg-white text-emerald-500 w-32 h-12 text-xl font-semibold rounded-lg shadow-lg border-2 hover:bg-gray-300">
                Edit
            </button>
        </form>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit"
                class="bg-emerald-500 text-white w-32 h-12 text-xl font-semibold rounded-lg shadow-lg border-2 hover:bg-gray-300">
                Logout
            </button>
        </form>
        <p class="text-grey-300 flex justify-center text-sm mt-10">© 2025 WargaSimpel, Web. All rights reserved.</p>
    </div>
</body>

<!-- Preview Gambar -->
<script>
    function previewImage(event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<!-- Tambah Gambar -->
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

</html>