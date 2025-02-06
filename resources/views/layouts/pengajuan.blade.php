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
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 font-inter">
    <header class="bg-green-950 shadow pt-10">
        <nav class="w-full text-md flex justify-between items-center py-4 px-10 fixed top-0 left-0 right-0 bg-green-950 shadow-md z-50">
            <a href="{{ route('home') }}">
                <img src="images/wargasimpel.png" class="w-64 h-auto ml-6">
            </a>
            <ul class="flex space-x-8 ml-auto">
                <li>
                    <a href="{{ route('home') }}" class="bg-emerald-500 text-green-950 py-3 px-8 rounded-lg hover:bg-gray-300 transition-all duration-300">
                        BERANDA
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="flex justify-start items-start min-h-screen pt-24 px-10">
        <div class="bg-transparent p-6 rounded-lg shadow-lg w-full max-w-3xl">
            <span class="flex items-center text-green-950 mb-6 ml-2 text-4xl font-semibold">PENGAJUAN SURAT</span>

            <!-- Surat Keterangan Usaha -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN USAHA</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950">
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="noKTP" placeholder="No. KTP" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="jenisUsaha" placeholder="Jenis Usaha" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="alamatUsaha" placeholder="Alamat Usaha" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <div class="flex justify-end">
                        <button id="btnBuatSurat" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Keterangan Lahir -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN LAHIR</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="namaBayi" placeholder="Nama Bayi" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="ttl" placeholder="Tempat Tanggal Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="namaAyah" placeholder="Nama Ayah" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="NIKAyah" placeholder="NIK Ayah" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="namaIbu" placeholder="Nama Ibu" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="NIKIbu" placeholder="NIK Ibu" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="text" id="alamat" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <input type="date" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950">
                    <div class="flex justify-end">
                        <button id="btnBuatSurat" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>
            <script src="{{ asset('docs/dokumen.js') }}"></script>
        </div>
    </div>
</body>
</html>
