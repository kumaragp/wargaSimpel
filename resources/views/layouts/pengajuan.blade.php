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
<body class="bg-gray-50 font-inter">
<header class="bg-green-950 shadow">
    <nav class="w-full text-md flex justify-between items-center py-4 px-10 fixed top-0 left-0 right-0 bg-green-950 shadow-md z-50">
       <div class="flex-grow flex justify-center md:justify-start">
        <a href="{{ route('home') }}">
            <img src="images/wargasimpel.png" class="w-40 lg:w-64 h-auto">
        </a>
    </div>
    <ul class="hidden md:flex md:space-x-6 lg:space-x-8">
        <li>
            <a href="{{ route('home') }}" class="block text-center bg-emerald-500 text-green-950 py-2 px-4 sm:py-2 sm:px-6 text-sm sm:text-md md:text-lg rounded-lg hover:bg-gray-300 transition-all duration-300">
                BERANDA
            </a>
        </li>
    </ul>
    </nav>
</header>
    <div class="flex justify-start items-start min-h-screen pt-24 px-10">
        <div class="bg-transparent p-6 rounded-lg shadow-lg w-full max-w-3xl">
        <div class="flex items-center mb-6 ml-2">
            <!-- <a href="{{ route('home') }}" class="hidden md:flex mr-2">
                <img src="images/back.png" alt="Back" class="w-8 h-8">
            </a> -->
            <span class="text-green-950 text-4xl font-semibold">PENGAJUAN SURAT</span>
        </div>
            <!-- Surat Keterangan Usaha -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN USAHA</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahir" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahir" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelamin" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="pekerjaan" placeholder="Pekerjaan" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="alamat" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="namaUsaha" placeholder="Nama Usaha" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="jenisUsaha" placeholder="Jenis Usaha" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="alamatUsaha" placeholder="Alamat Usaha" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalPengajuan" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratUsaha" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Keterangan Lahir -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN LAHIR</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="namaBayi" placeholder="Nama Bayi" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirBayi" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirBayi" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelaminBayi" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="namaAyahBayi" placeholder="Nama Ayah" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="namaIbuBayi" placeholder="Nama Ibu" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="anakKe" placeholder="Anak Ke" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalPengajuanBayi" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratLahir" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Keterangan Ahli Waris -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN AHLI WARIS</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="namaAhliWaris" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirAhliWaris" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirAhliWaris" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelaminAhliWaris" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="namaAlmarhumAlmarhumahAhliWaris" placeholder="Nama Almarhum / Almarhumah" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tahunMeninggalDuniaAhliWaris" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Meninggal Dunia" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <input type="text" id="tanggalPengajuanAhliWaris" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratAhliWaris" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

             <!-- Surat Keterangan Janda / Duda -->
             <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN JANDA / DUDA</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nikJandaDuda" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="namaJandaDuda" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirJandaDuda" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirJandaDuda" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <input type="text" id="alamatJandaDuda" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <select id="jenisKelaminJandaDuda" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="namaAlmarhumAlmarhumahJandaDuda" placeholder="Nama Almarhum / Almarhumah" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tahunMeninggalDuniaJandaDuda" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Meninggal Dunia" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="tanggalPengajuanJandaDuda" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratJandaDuda" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Keterangan Tidak Mampu -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN TIDAK MAMPU (SKTM)</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nikSKTM" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="namaSKTM" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirSKTM" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirSKTM" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelaminSKTM" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="pekerjaanSKTM" placeholder="Pekerjaan" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="agamaSKTM" placeholder="Agama" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="alamatSKTM" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="tanggalPengajuanSKTM" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSKTM" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Keterangan Kematian -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN KEMATIAN</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="namaSKK" placeholder="Nama Lengkap Almarhum / Almarhumah" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirSKK" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirSKK" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelaminSKK" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="pekerjaanSKK" placeholder="Pekerjaan" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="agamaSKK" placeholder="Agama" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="alamatSKK" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="tahunMeninggalDuniaSKK" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Meninggal Dunia" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <input type="text" id="penyebabKematianSKK" placeholder="Penyebab Kematian (Opsional)" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatSKK" placeholder="Tempat" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalPengajuanSKK" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratKematian" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Keterangan Pindah Penduduk -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT KETERANGAN PINDAH PENDUDUK</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nikSKPP" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="namaSKPP" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirSKPP" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirSKPP" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelaminSKPP" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="pekerjaanSKPP" placeholder="Pekerjaan" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="agamaSKPP" placeholder="Agama" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="alamatAsalSKPP" placeholder="Alamat Asal" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <label for="statusKawin">Status Kawin:</label>
                    <select id="statusKawinSKPP" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Status Kawin --</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <label>Pindah ke</label>
                    <div class="mb-3">
                        <label for="desa">• Desa / Kelurahan:</label>
                        <input type="text" id="desaSKPP" placeholder="Desa / Kelurahan" class="w-full p-3 border-2 rounded-md mb-3" required>
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan">• Kecamatan:</label>
                        <input type="text" id="kecamatanSKPP" placeholder="Kecamatan" class="w-full p-3 border-2 rounded-md mb-3" required>
                    </div>

                    <div class="mb-3">
                        <label for="kabupaten">• Kota / Kabupaten:</label>
                        <input type="text" id="kabupatenSKPP" placeholder="Kota / Kabupaten" class="w-full p-3 border-2 rounded-md mb-3" required>
                    </div>

                    <div class="mb-3">
                        <label for="provinsi">• Provinsi:</label>
                        <input type="text" id="provinsiSKPP" placeholder="Provinsi" class="w-full p-3 border-2 rounded-md mb-3" required>
                    </div>
                    <input type="text" id="alasanPindahSKPP" placeholder="Alasan Pindah" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalPengajuanSKPP" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratPindahPenduduk" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Pengantar -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT PENGANTAR</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nikSP" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="namaSP" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirSP" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirSP" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="jenisKelaminSP" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <select id="statusKawinSP" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Status Kawin --</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                    <input type="text" id="alamatSP" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="keperluanSP" placeholder="Keperluan" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalPengajuanSP" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratPengantar" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
                            Buat Surat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Surat Domisili -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full px-6 py-3 text-left border-2 rounded-lg flex justify-between items-center hover:bg-gray-200 transition-all duration-300">
                    <span class="text-xl font-semibold">SURAT DOMISILI</span>
                    <svg :class="{'rotate-90': open}" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 p-4 w-full max-w-2xl">
                    <input type="text" id="nikSD" placeholder="NIK" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="namaSD" placeholder="Nama Lengkap" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tempatLahirSD" placeholder="Tempat Lahir" class="w-full p-3 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="tanggalLahirSD" class="w-full p-4 border-2 rounded-md mb-4 transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <select id="statusKawinSD" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Status Kawin --</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                    <select id="jenisKelaminSD" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" id="agamaSD" placeholder="Agama" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <input type="text" id="alamatSD" placeholder="Alamat" class="w-full p-3 border-2 rounded-md mb-3 transition-all duration-300 focus:ring-green-950" required>
                    <p class="text-sm mb-4 text-gray-500 italic">*Sesuai KTP</p>
                    <input type="text" id="tanggalPengajuanSD" class="w-full p-4 border-2 rounded-md transition-all duration-300 focus:ring-green-950" placeholder="Tanggal Pengajuan" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                    <div class="flex justify-end">
                        <button id="btnBuatSuratDomisili" class="bg-white text-emerald-500 p-2 px-3 text-xl font-semibold rounded-lg shadow-md border-2 border-gray-300 hover:bg-gray-300">
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