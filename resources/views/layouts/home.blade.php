<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png/jpg" href="images/logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <title>WargaSimpel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            overflow-x: hidden;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-50 font-inter overflow-x-hidden w-full">
    <!-- Navbar -->
    <header class="bg-white shadow pt-10">
        <nav
            class="w-full text-md flex justify-between items-center py-4 px-10 fixed top-0 left-0 right-0 bg-white shadow-md z-50">
            <a href="#beranda">
                <img src="images/wargasimpel.png" class="w-40 lg:w-64 h-auto">
            </a>
            <button id="menu-btn" class="lg:hidden text-green-950 focus:outline-none z-50 relative">☰</button>
            <ul id="menu" class="hidden lg:flex space-x-4 ml-auto">
                <li><a href="#beranda" class="text-green-950 hover:font-semibold">BERANDA</a></li>
                <li><a href="#tentang" class="text-green-950 hover:font-semibold">TENTANG KAMI</a></li>
                <li><a href="#kontak" class="text-green-950 hover:font-semibold">KONTAK</a></li>
                @auth
                    <li><a href="{{ route('profile') }}" class="text-green-950 hover:font-semibold">PROFIL</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-green-950 hover:font-semibold">LOGIN</a></li>
                @endauth

                @auth
                    <li>
                        <a href="{{ route('pengajuan') }}"
                            class="bg-green-800 text-white py-3 px-6 lg:px-8 rounded-lg hover:bg-green-600 transition-all duration-300">
                            PENGAJUAN SURAT
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            onclick="alert('Silakan login terlebih dahulu untuk mengajukan surat.');"
                            class="bg-green-800 text-white py-3 px-6 lg:px-8 rounded-lg hover:bg-green-600 transition-all duration-300">
                            PENGAJUAN SURAT
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>

        <!-- Menu Mobile -->
        <ul id="mobile-menu"
            class="hidden flex-col space-y-4 bg-white shadow-md p-4 fixed top-[4rem] left-0 w-full z-40 transition-all duration-300">
            <li><a href="#beranda" class="block text-green-950 hover:font-semibold">BERANDA</a></li>
            <li><a href="#tentang" class="block text-green-950 hover:font-semibold">TENTANG KAMI</a></li>
            <li><a href="#kontak" class="block text-green-950 hover:font-semibold">KONTAK</a></li>
            @auth
                <li><a href="{{ route('profile') }}" class="block text-green-950 hover:font-semibold">PROFIL</a></li>
            @else
                <li><a href="{{ route('login') }}" class="block text-green-950 hover:font-semibold">LOGIN</a></li>
            @endauth

            @auth
                <li><a href="{{ route('pengajuan') }}" class="block text-green-950 hover:font-semibold">PENGAJUAN SURAT</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" onclick="alert('Silakan login terlebih dahulu untuk mengajukan surat.');"
                        class="block text-green-950 hover:font-semibold">
                        PENGAJUAN SURAT
                    </a>
                </li>
            @endauth
        </ul>
    </header>

    <!-- Beranda -->
    <section id="beranda" class="text-white py-20 px-4 md:px-10 lg:px-20 bg-cover bg-center"
        style="background-image: url('images/banner.png');">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between text-left md:text-left">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-bold italic mb-4 leading-tight">
                    Mau Bikin Surat<br> Tapi Gak Sempet<br> Ke Balai Desa?
                </h1>
                <p class="mb-6 text-lg md:text-xl">
                    Tinggal bikin aja di Website
                    <a href="#" class="font-bold">www.wargasimpel.com</a><br>
                    Bikinnya <b>Mudah, Cepat & Praktis</b>
                </p>
                @auth
                    <a href="{{ route('pengajuan') }}"
                        class="bg-white text-black font-bold text-lg py-4 px-8 rounded-lg border border-black shadow-md hover:shadow-lg hover:border-green-950 transition-all duration-300">
                        Pengajuan Surat</a>

                @else
                    <a href="{{ route('login') }}" onclick="alert('Silakan login terlebih dahulu untuk mengajukan surat.');"
                        class="bg-white text-black font-bold text-lg py-4 px-8 rounded-lg border border-black shadow-md hover:shadow-lg hover:border-green-950 transition-all duration-300">
                        Pengajuan Surat
                    </a>
                @endauth
                <h2 class="mt-6 text-sm md:text-base">
                    *Hanya berlaku bagi penduduk Indonesia yang memiliki Nomor Induk Kewarganegaraan
                </h2>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="tentang" class="bg-gray-100 py-20 px-4">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center items-center gap-6 md:gap-12 px-4 py-10">
                <div class="flex flex-col justify-center items-center md:items-start max-w-xl text-center md:text-left">
                    <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold text-black mb-4">Tentang Kami</h2>
                    <p class="text-5xl sm:text-6xl md:text-8xl font-bold text-green-800 mb-6 italic">Warga<br>Simpel</p>
                </div>
                <div
                    class="flex items-center justify-center md:justify-start max-w-2xl text-center px-6 py-8 md:py-2 sm:py-2">
                    <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl text-black leading-relaxed">
                        Website yang dirancang untuk mendukung dan mempermudah Pelayanan Masyarakat Desa,
                        <b class="italic">WargaSimpel</b> hadir dalam bentuk Website dengan mengusung semangat
                        digitalisasi,
                        partisipatif, dan mandiri.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6">
                <div class="bg-white p-6 rounded-lg border-2 border-green-950 shadow-lg">
                    <h3 class="text-green-950 font-bold text-2xl md:text-3xl mb-2 pb-3">01<br>Digitalisasi</h3>
                    <p class="text-black text-base md:text-lg">Layanan administrasi dan publik berbasis web untuk
                        kemudahan
                        warga.</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-2 border-green-950 shadow-lg">
                    <h3 class="text-green-950 font-bold text-2xl md:text-3xl mb-2 pb-3">02<br>Terbuka</h3>
                    <p class="text-black text-base md:text-lg">Mendukung Pemerintah Desa dalam memberikan layanan
                        terbaik
                        dengan lebih efisien.</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-2 border-green-950 shadow-lg">
                    <h3 class="text-green-950 font-bold text-2xl md:text-3xl mb-2 pb-3">03<br>Transparansi</h3>
                    <p class="text-black text-base md:text-lg">Membangun kepercayaan melalui keterbukaan informasi
                        antara
                        desa dan warga.</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-2 border-green-950 shadow-lg">
                    <h3 class="text-green-950 font-bold text-2xl md:text-3xl mb-2 pb-3">04<br>Melayani</h3>
                    <p class="text-black text-base md:text-lg">Mempermudah kinerja Pemerintah Desa dalam melayani segala
                        kebutuhan masyarakat desa.</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-2 border-green-950 shadow-lg">
                    <h3 class="text-green-950 font-bold text-2xl md:text-3xl mb-2 pb-3">05<br>BUMDes</h3>
                    <p class="text-black text-base md:text-lg">Mendorong unit usaha digital desa dan kerja sama yang
                        menguntungkan.</p>
                </div>
                <div class="bg-white p-6 rounded-lg border-2 border-green-950 shadow-lg">
                    <h3 class="text-green-950 font-bold text-2xl md:text-3xl mb-2 pb-3">06<br>Efisiensi</h3>
                    <p class="text-black text-base md:text-lg">Mendukung Pemerintah Desa memberikan layanan terbaik
                        dengan
                        lebih efisien dan cepat.</p>
                </div>
            </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="bg-green-950 text-white py-20 px-4">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Anda punya pertanyaan lain?</h2>
                    <p class="text-xl sm:text-2xl mb-6">Silahkan kirim pertanyaan Anda di sini</p>
                    <div class="mb-4">
                        <p class="font-bold text-xl sm:text-2xl">Kontak</p>
                        <p class="text-sm sm:text-base">Telepon / WhatsApp: 0987654321</p>
                    </div>
                    <div>
                        <p class="font-bold text-xl sm:text-2xl">Alamat</p>
                        <p class="text-sm sm:text-base">Purwokerto, Jawa Tengah, Indonesia</p>
                    </div>
                </div>
                <form action="#" id="contactForm" class="space-y-4">
                    <input type="text" id="nama" name="nama"
                        class="w-full px-4 py-3 rounded-lg bg-green-950 border border-black placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="Nama Lengkap" required style="background-color: rgba(169, 169, 169, 0.5);">

                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 rounded-lg bg-green-950 border border-black placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="Email" required style="background-color: rgba(169, 169, 169, 0.5);">

                    <input type="text" id="notelp" name="notelp"
                        class="w-full px-4 py-3 rounded-lg bg-green-950 border border-black placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="No. Telepon" required style="background-color: rgba(169, 169, 169, 0.5);">

                    <input type="text" id="kategori" name="kategori"
                        class="w-full px-4 py-3 rounded-lg bg-green-950 border border-black placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="Kategori" required style="background-color: rgba(169, 169, 169, 0.5);">

                    <textarea id="keterangan" name="keterangan" rows="4"
                        class="w-full px-4 py-3 rounded-lg bg-green-950 border border-black placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="Keterangan" required
                        style="background-color: rgba(169, 169, 169, 0.5);"></textarea>
                    <button type="submit" id="sendMessageButton"
                        class="w-full bg-white text-green-950 font-bold py-3 px-6 rounded-lg hover:bg-gray-300">Kirim</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-300 py-8 mt-auto">
        <div class="mx-auto w-full px-10">
            <div class="flex flex-col lg:flex-row justify-between items-center text-center lg:text-left mb-6">
                <div class="mb-6 lg:mb-0 lg:w-1/2">
                    <div class="flex items-center justify-center lg:justify-start mb-2">
                        <img src="images/wargasimpel.png" alt="simpeldesa logo" class="h-12">
                    </div>
                    <p class="text-gray-500 text-sm">
                        Untuk urusan Administrasi, Pelayanan, dan Ekonomi Desa lebih simpel dengan interaksi digital
                        Pemdes dengan warga
                    </p>
                </div>
                <div class="lg:w-1/2 text-black text-sm text-center lg:text-right">
                    <p class="font-bold">KONTAK EMAIL</p>
                    <p><a href="mailto:cs@wargasimpel.com" class="text-blue-500 hover:underline">cs@wargasimpel.com</a>
                    </p>
                    <p>Purwokerto, Jawa Tengah, Indonesia</p>
                </div>
            </div>
            <div class="flex justify-center space-x-4 mb-6">
                <a href="#tentang" class="text-black hover:text-blue-500 text-sm">Tentang Kami</a>
                <a href="#kontak" class="text-black hover:text-blue-500 text-sm">Kontak</a>
                @auth
                    <a href="{{ route('pengajuan') }}" class="text-black hover:text-blue-500 text-sm">Pengajuan Surat
                @else
                    <a href="{{ route('login') }}"
                        onclick="alert('Silakan login terlebih dahulu untuk mengajukan surat.');"
                        class="text-black hover:text-blue-500 text-sm">Pengajuan Surat
                    </a>
                @endauth
                    <a href="#kontak" class="text-black hover:text-blue-500 text-sm">Pertanyaan</a>
                    <button onclick="openModal()"
                        class="text-black hover:text-blue-500 text-sm focus:outline-none">Privacy
                        Policy</button>
            </div>
            <div id="privacyModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full relative">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Privacy Policy</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Possimus cumque vitae rem ipsa molestiae officiis itaque quo quas qui aliquam,
                        culpa laboriosam enim! Reprehenderit, molestiae in aut deleniti eum dolorum assumenda maxime
                        aliquid quas unde sequi saepe fugiat modi consectetur autem culpa illum necessitatibus repellat
                        vero tempore ullam, quibusdam accusamus, nobis pariatur. Consequuntur assumenda tempora
                        possimus, at molestiae dolore pariatur vero necessitatibus culpa dolores nisi id, perferendis
                        numquam quae amet. Nobis, reprehenderit. Repellat architecto, tempore id dignissimos quasi rerum
                        itaque consectetur veniam atque dolorem. Culpa corporis vel neque, fuga quibusdam voluptatibus
                        recusandae nihil enim quas cumque, quae dolorem reprehenderit quod!</p>
                    <div class="flex justify-center">
                        <button onclick="closeModal()"
                            class="px-6 py-3 bg-green-800 text-white rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none w-full sm:w-auto">
                            Saya Mengerti
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-300 pt-4 text-center text-black text-xs">
            <div class="flex flex-col items-center justify-center">
                <div class="flex items-center justify-center mb-2">
                    <img src="images/wargasimpel.png" alt="simpeldesa logo" class="h-5 mr-2">
                    <span>&copy; 2025 WargaSimpel, Web. All rights reserved.</span>
                </div>
                <p class="text-xs text-black">Mendukung interaksi digital antara Pemdes dan warga.</p>
            </div>
        </div>
    </footer>

    <!-- Tombol Kirim WhatsApp -->
    <script>
        document.getElementById('sendMessageButton').addEventListener('click', function () {
            var name = document.getElementById('nama').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('notelp').value;
            var category = document.getElementById('kategori').value;
            var information = document.getElementById('keterangan').value;
            var whatsappMessage = "Nama: " + name + "%0AEmail: " + email + "%0ANomor Telepon: " + phone + "%0AKategori: " + category + "%0AKeterangan: " + information;
            var whatsappUrl = "https://wa.me/+6285155401108?text=" + whatsappMessage;
            window.open(whatsappUrl, "_blank");
        });
    </script>

    <!-- Modal Privacy Policy -->
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

    <!-- Hamburger -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById("menu-btn");
            const mobileMenu = document.getElementById("mobile-menu");

            menuBtn.addEventListener("click", function () {
                mobileMenu.classList.toggle("hidden");
            });
            function checkScreenSize() {
                if (window.innerWidth >= 1024) {
                    mobileMenu.classList.add("hidden");
                }
            }
            window.addEventListener("resize", checkScreenSize);
            checkScreenSize();
        });
    </script>
</body>
</html>