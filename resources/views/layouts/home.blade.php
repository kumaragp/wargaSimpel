<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png/jpg" href="images/logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <title>SimpelDesa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 font-inter">
    <header class="bg-white shadow pt-10">
        <nav
            class="w-full hover:text-yellow-500 flex justify-between items-center py-4 px-10 fixed top-0 left-0 right-0 bg-white shadow-md z-50">
            <a href="#home">
                <img src="images/simpeldesa.png" class="w-32 h-auto ml-6">
            </a>
            <ul class="flex space-x-8 ml-auto">
                <li><a href="#BERANDA" class="text-yellow-500 hover:text-yellow-800">BERANDA</a></li>
                <li><a href="#tentang" class="text-yellow-500 hover:text-yellow-800">TENTANG KAMI</a></li>
                <li><a href="#kontak" class="text-yellow-500 hover:text-yellow-800">KONTAK</a></li>
                <li><a href="{{ url('pengajuan') }}"
                        class="bg-yellow-500 text-white py-3 px-8 rounded-lg hover:bg-yellow-800 transition-all duration-300">PENGAJUAN
                        SURAT</a></li>

            </ul>
        </nav>
    </header>
    <section id="BERANDA" class="text-white  py-20 px-4 bg-cover bg-center"
        style="background-image: url('images/banner.png');">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <h1 class="text-6xl font-bold italic mb-4">Mau Bikin Surat<br>Tapi Gak Sempet<br>Ke Balai Desa?</h1>
                <p class="mb-6">Tinggal bikin aja di Website <a href="#" class="font-bold">www.simpeldesa.com</a><br>
                    Bikinnya <b>Mudah, Cepat & Praktis</b></p>
                <a href="{{ url('pengajuan') }}"
                    class="bg-white text-black font-bold text-lg py-4 px-8 rounded-lg border border-black shadow-md hover:shadow-lg hover:border-yellow-500 transition-all duration-300">
                    Pengajuan Surat
                </a>

                <h2 class="mt-6">*Hanya berlaku bagi penduduk Indonesia yang memiliki Nomor Induk Kewarganegaraan</h2>
            </div>
        </div>
    </section>

    <section id="tentang" class="bg-gray-100 py-20 px-4">
        <div class="container mx-auto">
            <div class="flex justify-center items-center gap-12 px-4 py-10">
                <div class="flex flex-col justify-center items-center md:items-start max-w-xl text-center md:text-left">
                    <h2 class="text-xl md:text-5xl font-bold text-black mb-4">Tentang Kami</h2>
                    <p class="text-8xl font-bold text-yellow-500 mb-6 italic">Simpel<br>Desa</p>
                </div>
                <div
                    class="text-3xl flex items-center justify-center md:justify-start max-w-2xl text-center md:text-left">
                    <p class="text-1xl md:text-1xl lg:text-1xl text-black text-justify leading-relaxed">
                        Dirancang untuk mendukung dan mempermudah Pelayanan Masyarakat Desa, <b
                            class="italic">SimpleDesa</b> hadir dalam bentuk Website
                        dengan mengusung semangat digitalisasi, partisipatif, dan mandiri.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center gap-6">
            <div class="w-full md:w-1/3 lg:w-1/4 bg-white p-6 rounded-lg border-2 border-yellow-500 shadow-lg">
                <h3 class="text-yellow-500 font-bold text-3xl mb-2 pb-3">01<br>Digitalisasi</h3>
                <p class="text-black text-xl">Layanan administrasi dan publik berbasis web untuk kemudahan warga.</p>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 bg-white p-6 rounded-lg border-2 border-yellow-500 shadow-lg">
                <h3 class="text-yellow-500 font-bold text-3xl mb-2 pb-3">02<br>Terbuka</h3>
                <p class="text-black text-xl">Mendukung Pemerintah Desa dalam memberikan layanan terbaik dengan lebih
                    efisien.</p>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 bg-white p-6 rounded-lg border-2 border-yellow-500 shadow-lg">
                <h3 class="text-yellow-500 font-bold text-3xl mb-2 pb-3">03<br>Transparansi</h3>
                <p class="text-black text-xl">Membangun kepercayaan melalui keterbukaan informasi antara desa dan warga.
                </p>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 bg-white p-6 rounded-lg border-2 border-yellow-500 shadow-lg">
                <h3 class="text-yellow-500 font-bold text-3xl mb-2 pb-3">04<br>Melayani</h3>
                <p class="text-black text text-xl">Mempermudah kinerja Pemerintah Desa dalam melayani segala kebutuhan
                    masyarakat desa.</p>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 bg-white p-6 rounded-lg border-2 border-yellow-500 shadow-lg">
                <h3 class="text-yellow-500 font-bold text-3xl mb-2 pb-3">05<br>BUMDes</h3>
                <p class="text-black text-xl">Mendorong unit usaha digital desa dan kerja sama yang menguntungkan.</p>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 bg-white p-6 rounded-lg border-2 border-yellow-500 shadow-lg">
                <h3 class="text-yellow-500 font-bold text-3xl mb-2 pb-3">06<br>Efisiensi</h3>
                <p class="text-black text-xl">Mendukung Pemerintah Desa memberikan layanan terbaik dengan lebih efisien
                    dan cepat.</p>
            </div>
        </div>

    </section>

    <section id="kontak" class="bg-yellow-500 text-black py-20 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <h2 class="text-5xl font-bold mb-4">Anda punya pertanyaan lain?</h2>
                    <p class="text-2xl mb-6">Silahkan kirim pertanyaan Anda di sini</p>
                    <div class="mb-4">
                        <p><span class="font-bold text-2xl">Kontak</span></p>
                        <p>Telepon / WhatsApp: 0987654321</p>
                    </div>
                    <div>
                        <p><span class="font-bold text-2xl">Alamat</span></p>
                        <p>Purwokerto, Jawa Tengah, Indonesia</p>
                    </div>
                </div>
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg">
                    <form action="#" method="POST">
                        <div class="mb-4">
                            <!-- <label for="name" class="block text-sm font-bold mb-2">Nama Lengkap</label> -->
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 rounded-lg bg-yellow-500 border border-gray-600 placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-yellow-700"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-4">
                            <!-- <label for="email" class="block text-sm font-bold mb-2">Email</label> -->
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 rounded-lg bg-yellow-500 border border-gray-600 placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-yellow-700"
                                placeholder="Email" required>
                        </div>
                        <div class="mb-4">
                            <!-- <label for="phone" class="block text-sm font-bold mb-2">No. Telepon</label> -->
                            <input type="text" id="phone" name="phone"
                                class="w-full px-4 py-2 rounded-lg bg-yellow-500 border border-gray-600 placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-yellow-700"
                                placeholder="No. Telepon" required>
                        </div>
                        <div class="mb-4">
                            <!-- <label for="category" class="block text-sm font-bold mb-2">Kategori</label> -->
                            <input type="text" id="category" name="category"
                                class="w-full px-4 py-2 rounded-lg bg-yellow-500 border border-gray-600 placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-yellow-700"
                                placeholder="Kategori" required>
                        </div>
                        <div class="mb-4">
                            <!-- <label for="message" class="block text-sm font-bold mb-2">Keterangan</label> -->
                            <textarea id="message" name="message" rows="4"
                                class="w-full px-4 py-2 rounded-lg bg-yellow-500 border border-gray-600 placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-yellow-700"
                                placeholder="Keterangan" required></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full bg-white text-yellow-500 font-bold py-3 px-6 rounded-lg hover:bg-yellow-200">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white border-t border-gray-300 py-8 mt-auto">
        <div class="mx-auto w-full px-10">
            <div class="flex flex-col lg:flex-row justify-between items-center text-center lg:text-left mb-6">
                <div class="mb-6 lg:mb-0 lg:w-1/2">
                    <div class="flex items-center justify-center lg:justify-start mb-2">
                        <img src="images/simpeldesa.png" alt="simpeldesa logo" class="h-12">
                    </div>
                    <p class="text-gray-500 text-sm">
                        Untuk urusan Administrasi, Pelayanan, dan Ekonomi Desa lebih simpel dengan interaksi digital
                        Pemdes dengan warga
                    </p>
                </div>
                <div class="lg:w-1/2 text-black text-sm text-center lg:text-right">
                    <p class="font-bold">KONTAK EMAIL</p>
                    <p><a href="mailto:cs@simpeldesa.com" class="text-blue-500 hover:underline">cs@simpeldesa.com</a>
                    </p>
                    <p>Purwokerto, Jawa Tengah, Indonesia</p>
                </div>
            </div>
            <div class="flex justify-center space-x-4 mb-6">
                <a href="#tentang" class="text-black hover:text-blue-500 text-sm">Tentang Kami</a>
                <a href="#kontak" class="text-black hover:text-blue-500 text-sm">Kontak</a>
                <a href="#pengajuan" class="text-black hover:text-blue-500 text-sm">Pengajuan Surat</a>
                <a href="#kontak" class="text-black hover:text-blue-500 text-sm">Pertanyaan</a>
                <button onclick="openModal()" class="text-black hover:text-blue-500 text-sm focus:outline-none">Privacy Policy</button>
            </div>
                <div id="privacyModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full relative">
                    <!-- Tombol Close -->
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl focus:outline-none">
                        &times;
                    </button>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Privacy Policy</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus cumque vitae rem ipsa molestiae officiis itaque quo quas qui aliquam, culpa laboriosam enim! Reprehenderit, molestiae in aut deleniti eum dolorum assumenda maxime aliquid quas unde sequi saepe fugiat modi consectetur autem culpa illum necessitatibus repellat vero tempore ullam, quibusdam accusamus, nobis pariatur. Consequuntur assumenda tempora possimus, at molestiae dolore pariatur vero necessitatibus culpa dolores nisi id, perferendis numquam quae amet. Nobis, reprehenderit. Repellat architecto, tempore id dignissimos quasi rerum itaque consectetur veniam atque dolorem. Culpa corporis vel neque, fuga quibusdam voluptatibus recusandae nihil enim quas cumque, quae dolorem reprehenderit quod!</p>
                    <div class="flex justify-center">
                        <button onclick="closeModal()" class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600 transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none">
                            Saya Mengerti
                        </button>
                    </div>
                </div>
            </div>
            <script>
                function openModal() {
                    let modal = document.getElementById("privacyModal");
                    modal.style.display = "flex";
                    modal.classList.remove("hidden");
                }

                function closeModal() {
                    let modal = document.getElementById("privacyModal");
                    modal.style.display = "none";
                }
            </script>
        </div>
        <div class="border-t border-gray-300 pt-4 text-center text-black text-xs">
            <div class="flex flex-col items-center justify-center">
                <div class="flex items-center justify-center mb-2">
                    <img src="images/simpeldesa.png" alt="simpeldesa logo" class="h-5 mr-2">
                    <span>&copy; 2025 SimpelDesa, Web. All rights reserved.</span>
                </div>
                <p class="text-xs text-black">Mendukung interaksi digital antara Pemdes dan warga.</p>
            </div>
        </div>
        </div>
    </footer>
</body>

</html>