<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .font-inter {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-green-950 shadow-md fixed top-0 left-0 right-0 z-50">
        <nav class="w-full flex justify-between items-center py-4 px-10">
            <a href="{{ url('/') }}">
                <img src="images/WargaSimpel.png" class="w-32 h-auto ml-6">
            </a>
            <ul class="flex space-x-8 ml-auto">
                <li><a href="{{ url('/') }}" class="bg-white text-green-950 py-3 px-8 rounded-lg hover:bg-green-800 transition-all duration-300">BERANDA</a></li>
            </ul>
        </nav>
    </header>

    <div class="flex justify-start items-start min-h-screen pt-24 px-4">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <a href="#" class="flex items-center text-green-950 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="ml-2 text-lg font-semibold">PENGAJUAN SURAT</span>
            </a>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT KETERANGAN USAHA</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="noKTP" placeholder="No. KTP" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="jenisUsaha" placeholder="Jenis Usaha" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamatUsaha" placeholder="Alamat Usaha" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT KETERANGAN LAHIR</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                <input type="text" id="namaBayi" placeholder="Nama Bayi" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="ttl" placeholder="Tempat Tanggal Lahir" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="namaAyah" placeholder="Nama Ayah" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="NIKAyah" placeholder="NIK Ayah" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="namaIbu" placeholder="Nama Ibu" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="NIKIbu" placeholder="NIK Ibu" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamat" placeholder="Alamat" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT KETERANGAN AHLI WARIS</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="namaAlmarhum" placeholder="Nama Alhmarhum" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="namaAhliWaris" placeholder="Nama Ahli Waris" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT KETERANGAN JANDA / DUDA</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamat" placeholder="Alamat" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT KETERANGAN KEMATIAN</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK Almarhum / Almarhumah" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap Almarhum / Almarhumah" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="ttl" placeholder="Tempat Tanggal Lahir" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="tanggalMeninggal" placeholder="Tanggal Meninggal Dunia" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="penyebab" placeholder="Penyebab Meninggal Dunia" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT KETERANGAN PINDAH PENDUDUK</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamatAsal" placeholder="Alamat Asal" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamatTujuan" placeholder="Alamat Tujuan" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT PENGANTAR</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamatAsal" placeholder="Alamat" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="keperluan" placeholder="Keperluan" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT REKOMENDASI KTP</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamatAsal" placeholder="Alamat" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="keperluan" placeholder="Keperluan" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full px-4 py-2 text-left rounded-lg flex justify-between items-center border border-gray-300 hover:bg-gray-200 transition-all duration-300">
                    <span>SURAT DOMISILI</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 p-4 border rounded-lg bg-gray-50">
                    <input type="text" id="nik" placeholder="NIK" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="ttl" placeholder="Tempat Tanggal Lahir" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="alamatAsal" placeholder="Alamat" class="w-full p-2 border rounded mb-2">
                    <input type="text" id="keperluan" placeholder="Keperluan" class="w-full p-2 border rounded mb-2">
                    <input type="date" class="w-full p-2 border rounded mb-2">
                    <button id="btnBuatSurat" class="w-full bg-green-950 text-white p-2 rounded hover:bg-green-800">Buat Surat</button>
                </div>
            </div>

        </div>
            <div x-show="preview" class="border rounded-lg p-4 bg-white shadow-lg">
                <img :src="preview" class="w-64 h-auto">
                <button class="w-full bg-green-500 text-white p-2 mt-2 rounded hover:bg-green-700">PREVIEW</button>
            </div>
    </div>

    <script>
        document.getElementById('btnBuatSurat').addEventListener('click', function() {
        const { jsPDF } = window.jspdf;

        const nik = document.getElementById('nik').value;
        const nama = document.getElementById('nama').value;
        const noKTP = document.getElementById('noKTP').value;
        const jenisUsaha = document.getElementById('jenisUsaha').value;
        const alamatUsaha = document.getElementById('alamatUsaha').value;
        const tempatTanggal = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

        const doc = new jsPDF();
        
        doc.setFont('times', 'normal');
        doc.setFontSize(12);
        doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
        doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
        doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });
        
        doc.setFont('times', 'bold');
        doc.setFontSize(14);
        doc.text('_________________________________', 105, 41, { align: 'center' });
        doc.text('SURAT KETERANGAN USAHA', 105, 50, { align: 'center' });
        doc.setFontSize(12);
        doc.setFont('times', 'normal');
        doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

        let yPos = 70;
        doc.text('Yang bertanda tangan di bawah ini:', 20, yPos);
        yPos += 10;
        doc.text(`Nama         : ${nama}`, 20, yPos);
        yPos += 7;
        doc.text(`NIK          : ${nik}`, 20, yPos);
        yPos += 7;
        doc.text(`No. KTP      : ${noKTP}`, 20, yPos);
        yPos += 7;
        doc.text(`Jenis Usaha  : ${jenisUsaha}`, 20, yPos);
        yPos += 7;
        doc.text(`Alamat Usaha : ${alamatUsaha}`, 20, yPos);
        yPos += 12;
        
        doc.text('Surat Keterangan Usaha ini dibuat sebagai bukti bahwa yang bersangkutan benar memiliki usaha yang berlokasi di alamat tersebut. Surat ini dapat digunakan untuk keperluan administrasi, pengajuan pinjaman, perizinan usaha, atau keperluan lain yang relevan sesuai kebutuhan.', 20, yPos, { maxWidth: 165 });
        yPos += 20;

        doc.text(`[Tempat], ${tempatTanggal}`, 140, yPos);
        yPos += 10;
        doc.text('Lurah/Kepala Desa', 140, yPos);
        yPos += 30;
        doc.text('(Nama Pejabat)', 140, yPos);

        doc.save('Surat_Keterangan_Usaha.pdf');
    });
    </script>
</body>
</html>