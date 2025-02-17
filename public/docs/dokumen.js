document.addEventListener('DOMContentLoaded', function() {
    const { jsPDF } = window.jspdf;

    // Fungsi untuk memastikan hanya huruf yang bisa dimasukkan (mendukung unicode)
    function hanyaHuruf(input) {
        input.value = input.value.replace(/[^\p{L}\s]/gu, ''); // Hanya huruf dan spasi
    }

    // Daftar ID input yang hanya boleh berisi huruf
    const hanyaHurufFields = ['nama', 'tempatLahir', 'jenisUsaha', 'namaBayi', 'namaAyahBayi', 'namaIbuBayi','tempatLahirBayi',
        'namaAhliWaris', 'tempatLahirAhliWaris', 'namaAlmarhumAlmarhumahAhliWaris', 'namaJandaDuda', 'tempatLahirJandaDuda', 'namaAlmarhumAlmarhumahJandaDuda', 
        'namaSKTM', 'tempatLahirSKTM', 'agamaSKTM', 'namaSKK', 'tempatLahirSKK', 'agamaSKK', 'namaSKPP', 'tempatLahirSKPP', 'agamaSKPP', 'provinsiSKPP',
        'namaSP', 'tempatLahirSP', 'keperluanSP', 'namaSD', 'tempatLahirSD', 'agamaSD' ];

    // Tambahkan event listener hanya jika elemen ditemukan
    hanyaHurufFields.forEach(id => {
        let field = document.getElementById(id);
        if (field) field.addEventListener('input', function() { hanyaHuruf(this); });
    });

    // Fungsi untuk memastikan hanya angka yang bisa dimasukkan
    function formatAngka(input) {
        input.value = input.value.replace(/\D/g, ''); // Menghapus karakter non-angka
    }

    // Daftar ID input yang hanya boleh berisi angka
    const hanyaAngkaFields = [ 'nik', 'anakKe','nikJandaDuda','nikSKPP', 'nikSKTM', 'nikSP', 'nikSD'];

    // Tambahkan event listener hanya jika elemen ditemukan
    hanyaAngkaFields.forEach(id => {
        let field = document.getElementById(id);
        if (field) field.addEventListener('input', function() { formatAngka(this); });
    });
    
    // Surat Keterangan Usaha
    document.getElementById('btnBuatSuratUsaha').addEventListener('click', function() {
        const nik = document.getElementById('nik').value;
        const nama = document.getElementById('nama').value;
        const tanggalLahir = document.getElementById('tanggalLahir').value;
        const tempatLahir = document.getElementById('tempatLahir').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const alamat = document.getElementById('alamat').value;
        const namaUsaha = document.getElementById('namaUsaha').value;
        const jenisUsaha = document.getElementById('jenisUsaha').value;
        const alamatUsaha = document.getElementById('alamatUsaha').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuan').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !tanggalPengajuan || !alamat || !namaUsaha || !jenisUsaha || !alamatUsaha) {
            alert('Harap isi semua kolom!');
            return;
        }

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)
            
            // Teks header
            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN [Nama Kabupaten]', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('DESA [Nama Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN USAHA', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;

            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40;

            doc.setFont('times', 'normal');

            doc.text('Nama', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('NIK', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nik, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamat, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 10;

            doc.text('Berdasarkan pengamatan kami, bahwa yang bersangkutan benar telah membuka usaha sebagai berikut :', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.setFont('times', 'normal');

            doc.text('Nama Usaha', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(namaUsaha, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Usaha', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisUsaha, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat Usaha', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamatUsaha, 20 + labelWidth + 5, yPos);
            yPos += 7;
            
            yPos += 20;

            doc.text('Demikian keterangan ini dibuat untuk digunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Usaha.pdf');
        };
    });

    // Surat Keterangan Lahir
    document.getElementById('btnBuatSuratLahir').addEventListener('click', function() {
        const namaBayi = document.getElementById('namaBayi').value;
        const tanggalLahir = document.getElementById('tanggalLahirBayi').value;
        const tempatLahir = document.getElementById('tempatLahirBayi').value;
        const jenisKelamin = document.getElementById('jenisKelaminBayi').value;
        const namaAyah = document.getElementById('namaAyahBayi').value;
        const namaIbu = document.getElementById('namaIbuBayi').value;
        const anakKe = document.getElementById('anakKe').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanBayi').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        // Validasi Input
        if (!nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !namaAyah || !namaIbu || !anakKe || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }        

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)

            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN LAHIR', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;

            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');
        
            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(namaBayi, 20 + labelWidth + 5, yPos);
            yPos += 7;
            
            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 10;

            doc.text('Adalah anak dari :', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.setFont('times', 'normal');

            doc.text('Nama Ayah', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(namaAyah, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Nama Ibu', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(namaIbu, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Anak Ke', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(anakKe, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 20;

            doc.text('Surat Keterangan Lahir ini dibuat untuk menerangkan bahwa bayi yang disebutkan di atas benar-benar telah lahir di tempat dan tanggal yang tertera. Surat ini digunakan sebagai syarat administrasi pencatatan sipil.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Lahir.pdf');

        };
    });

    // Surat Keterangan Ahli Waris
    document.getElementById('btnBuatSuratAhliWaris').addEventListener('click', function() {
        const nama = document.getElementById('namaAhliWaris').value;
        const tanggalLahir = document.getElementById('tanggalLahirAhliWaris').value;
        const tempatLahir = document.getElementById('tempatLahirAhliWaris').value;
        const jenisKelamin = document.getElementById('jenisKelaminAhliWaris').value;
        const namaAlmarhumAlmarhumah = document.getElementById('namaAlmarhumAlmarhumahAhliWaris').value;
        const tahunMeninggalDunia = document.getElementById('tahunMeninggalDuniaAhliWaris').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanAhliWaris').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !namaAlmarhumAlmarhumah || !tahunMeninggalDunia || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)

            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN AHLI WARIS', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;

            doc.text(`Kami yang bertanda tangan di bawah ini ahli waris dari Almarhum/Almarhumah ${namaAlmarhumAlmarhumah}`, 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;
            doc.text(`Menerangkan bahwa dengan sesungguhnya almarhum bertempat tinggal di Desa ......., Kecamatan ....., Kabupaten ...... dan pada tahun ${formatTanggal(tahunMeninggalDunia)}`, 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;
            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');

            doc.text('Nama', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;
            
            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 20;

            doc.text('Demikian keterangan ini dibuat kami para ahli waris dari almarhum / almarhumah.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Ahli_Waris.pdf');

        };
    });

    // Surat Keterangan Janda / Duda
    document.getElementById('btnBuatSuratJandaDuda').addEventListener('click', function() {
        const nik = document.getElementById('nikJandaDuda').value;
        const nama = document.getElementById('namaJandaDuda').value;
        const tanggalLahir = document.getElementById('tanggalLahirJandaDuda').value;
        const tempatLahir = document.getElementById('tempatLahirJandaDuda').value;
        const alamat = document.getElementById('alamatJandaDuda').value;
        const namaAlmarhumAlmarhumah = document.getElementById('namaAlmarhumAlmarhumahJandaDuda').value;
        const tahunMeninggalDunia = document.getElementById('tahunMeninggalDuniaJandaDuda').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanJandaDuda').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nama || !tanggalLahir || !tempatLahir || !alamat || !namaAlmarhumAlmarhumah || !tahunMeninggalDunia || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)

            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN JANDA / DUDA', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;

            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 60; 

            doc.setFont('times', 'normal');

            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('NIK', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nik, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamat, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 10;

            doc.text('Memang benar yang bersangkutan diatas warga Desa ........... Kecamatan ............. Kabupaten ............ dan sesuai catatan pada kartu keluarga hingga saat ini berstatus sebagai Janda /  Duda yang sah dari :', 20, yPos, { maxWidth: 165, align: 'justify' });

            yPos += 20;

            doc.setFont('times', 'normal');

            doc.text('Nama Almarhum/Almarhumah', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(namaAlmarhumAlmarhumah, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Meninggal Dunia', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tahunMeninggalDunia), 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 10;

            doc.text('Demikian surat keterangan janda / duda ini dibuat dengan sebenarnya agar dapat digunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Janda_Duda.pdf');

        };
    });

    // Surat Keterangan Tidak Mampu
    document.getElementById('btnBuatSKTM').addEventListener('click', function() {
        const nik = document.getElementById('nikSKTM').value;
        const nama = document.getElementById('namaSKTM').value;
        const tanggalLahir = document.getElementById('tanggalLahirSKTM').value;
        const tempatLahir = document.getElementById('tempatLahirSKTM').value;
        const jenisKelamin = document.getElementById('jenisKelaminSKTM').value;
        const pekerjaan = document.getElementById('pekerjaanSKTM').value;
        const agama = document.getElementById('agamaSKTM').value;
        const alamat = document.getElementById('alamatSKTM').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanSKTM').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nik || !nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !pekerjaan || !agama || !alamat || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)

            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN TIDAK MAMPU', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;

            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');

            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('NIK', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nik, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Pekerjaan', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(pekerjaan, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Agama', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(agama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamat, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos +=10;

            doc.text('Bahwa nama yang tercantum diatas adalah benar-benar berdomisili di Desa ......., Kecamatan ........ Sepanjang pengamatan kami dan sesuai data yang ada dalam catatan kependudukan orang tersebut diatas benar tergolong dalam keluarga prasejahtera (Keluarga Berpenghasilan Rendah). Surat Keterangan ini diberikan untuk mendapatkan bantuan berupa rehab/perbaikan rumah tempat tinggal.', 20, yPos, { maxWidth: 165, align: 'justify' });

            yPos += 30;

            doc.text('Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Tidak_Mampu.pdf');

        };
    });

    // Surat Keterangan Kematian
    document.getElementById('btnBuatSuratKematian').addEventListener('click', function() {
        const nama = document.getElementById('namaSKK').value;
        const tanggalLahir = document.getElementById('tanggalLahirSKK').value;
        const tempatLahir = document.getElementById('tempatLahirSKK').value;
        const jenisKelamin = document.getElementById('jenisKelaminSKK').value;
        const pekerjaan = document.getElementById('pekerjaanSKK').value;
        const agama = document.getElementById('agamaSKK').value;
        const alamat = document.getElementById('alamatSKK').value;
        const tahunMeninggalDunia = document.getElementById('tahunMeninggalDuniaSKK').value;
        const penyebabKematian = document.getElementById('penyebabKematianSKK').value;
        const tempat = document.getElementById('tempatSKK').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanSKK').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !pekerjaan || !agama || !alamat || !tahunMeninggalDunia || !penyebabKematian || !tempat || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)

            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN KEMATIAN', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');

            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Pekerjaan', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(pekerjaan, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Agama', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(agama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamat, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 10;

            doc.text(`Memang benar yang bersangkutan diatas warga Desa ........, Kecamatan ........, Kabupaten ............., telah meninggal dunia pada waktu : ${formatTanggal(tahunMeninggalDunia)}`, 20, yPos, { maxWidth: 165, align: 'justify' });

            yPos += 20;

            doc.setFont('times', 'normal');
            
            doc.text('Hari/Tanggal', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tahunMeninggalDunia), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Penyebab Kematian', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(penyebabKematian, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempat, 20 + labelWidth + 5, yPos);

            yPos += 20;

            doc.text('Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;

            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Kematian.pdf');

        };
    });

    // Surat Keterangan Pindah Penduduk
    document.getElementById('btnBuatSuratPindahPenduduk').addEventListener('click', function() {
        const nik = document.getElementById('nikSKPP').value;
        const nama = document.getElementById('namaSKPP').value;
        const tanggalLahir = document.getElementById('tanggalLahirSKPP').value;
        const tempatLahir = document.getElementById('tempatLahirSKPP').value;
        const jenisKelamin = document.getElementById('jenisKelaminSKPP').value;
        const pekerjaan = document.getElementById('pekerjaanSKPP').value;
        const agama = document.getElementById('agamaSKPP').value;
        const alamatAsal = document.getElementById('alamatAsalSKPP').value;
        const statusKawin = document.getElementById('statusKawinSKPP').value;
        const desa = document.getElementById('desaSKPP').value;
        const kecamatan = document.getElementById('kecamatanSKPP').value;
        const kabupaten = document.getElementById('kabupatenSKPP').value;
        const provinsi = document.getElementById('provinsiSKPP').value;
        const alasanPindah = document.getElementById('alasanPindahSKPP').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanSKPP').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !pekerjaan || !agama || !alamatAsal || !statusKawin || !desa || !kecamatan || !kabupaten || !provinsi || !alasanPindah || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }
    
        const doc = new jsPDF();
    
        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';
    
        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)
    
            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });
    
            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN PINDAH PENDUDUK', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });
    
            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;

            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');
    
            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('NIK', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nik, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Pekerjaan', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(pekerjaan, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Agama', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(agama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Status Kawin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(statusKawin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat Asal', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamatAsal, 20 + labelWidth + 5, yPos);
            yPos += 7;

            yPos += 10;

            doc.text('Telah pindah ke alamat berikut:', 20, yPos);
            yPos += 10;

            doc.setFont('times', 'normal');

            doc.text('• Desa / Kelurahan', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(desa, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('• Kecamatan', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(kecamatan, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('• Kota / Kabupaten', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(kabupaten, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('• Provinsi', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(provinsi, 20 + labelWidth + 5, yPos);
            yPos += 10;

            doc.text('Alasan Pindah', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alasanPindah, 20 + labelWidth + 5, yPos);
            yPos += 20;
    
            doc.text('Demikian surat keterangan pindah ini dibuat untuk dapat dipergunakan seperlunya.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;
    
            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);
    
            doc.save('Surat_Keterangan_Pindah.pdf');
        };
    });

    // Surat Pengantar
    document.getElementById('btnBuatSuratPengantar').addEventListener('click', function() {
        const nik = document.getElementById('nikSP').value;
        const nama = document.getElementById('namaSP').value;
        const tanggalLahir = document.getElementById('tanggalLahirSP').value;
        const tempatLahir = document.getElementById('tempatLahirSP').value;
        const jenisKelamin = document.getElementById('jenisKelaminSP').value;
        const alamat = document.getElementById('alamatSP').value;
        const statusKawin = document.getElementById('statusKawinSP').value;
        const keperluan = document.getElementById('keperluanSP').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanSP').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nik || !nama || !tanggalLahir || !tempatLahir || !jenisKelamin || !alamat || !statusKawin || !keperluan || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }
    
        const doc = new jsPDF();
    
        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';
    
        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)
    
            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });
    
            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT PENGANTAR', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });
    
            let yPos = 70;

            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;
    
            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');
    
            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Status Kawin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(statusKawin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('NIK', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nik, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamat, 20 + labelWidth + 5, yPos);
            yPos += 10;

            doc.text('Keperluan', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(keperluan, 20 + labelWidth + 5, yPos);
            yPos += 20;

            doc.text('Demikian surat pengantar ini dibuat untuk dapat dipergunakan seperlunya.', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;
    
            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);
    
            doc.save('Surat_Pengantar.pdf');
        };
    });

    // Surat Domisili
    document.getElementById('btnBuatSuratDomisili').addEventListener('click', function() {
        const nik = document.getElementById('nikSD').value;
        const nama = document.getElementById('namaSD').value;
        const tanggalLahir = document.getElementById('tanggalLahirSD').value;
        const tempatLahir = document.getElementById('tempatLahirSD').value;
        const statusKawin = document.getElementById('statusKawinSD').value;
        const jenisKelamin = document.getElementById('jenisKelaminSD').value;
        const agama = document.getElementById('agamaSD').value;
        const alamat = document.getElementById('alamatSD').value;
        const tanggalPengajuan = document.getElementById('tanggalPengajuanSD').value;

        function formatTanggal(tanggal) {
            const [year, month, day] = tanggal.split('-');
            return `${day}-${month}-${year}`;
        }

        if (!nama || !tanggalLahir || !tempatLahir || !statusKawin || !jenisKelamin || !agama || !alamat || !tanggalPengajuan) {
            alert('Harap isi semua kolom!');
            return;
        }
    
        const doc = new jsPDF();
    
        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';
    
        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)
    
            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN/KOTA', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('KELURAHAN/DESA [Nama Kelurahan/Desa]', 105, 34, { align: 'center' });
    
            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('', 105, 41, { align: 'center' });
            doc.text('SURAT DOMISILI', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });
    
            let yPos = 70;

            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 10;
    
            doc.text('Dengan ini menerangkan bahwa:', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            const labelWidth = 40; 

            doc.setFont('times', 'normal');
    
            doc.text('Nama Lengkap', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nama, 20 + labelWidth + 5, yPos);
            yPos += 7;
            
            doc.text('NIK', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(nik, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tempat Lahir', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(tempatLahir, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Tanggal Lahir', 20 , yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(formatTanggal(tanggalLahir), 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Jenis Kelamin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(jenisKelamin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Status Kawin', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(statusKawin, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Agama', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(agama, 20 + labelWidth + 5, yPos);
            yPos += 7;

            doc.text('Alamat', 20, yPos);
            doc.text(':', 20 + labelWidth, yPos);
            doc.text(alamat, 20 + labelWidth     + 5, yPos);
            yPos += 20;

            doc.text('Demikian surat keterangan pindah ini dibuat untuk dapat dipergunakan seperlunya. ', 20, yPos, { maxWidth: 165, align: 'justify' });
            yPos += 20;
    
            doc.text(`Tempat, ${formatTanggal(tanggalPengajuan)}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);
    
            doc.save('Surat_Domisili.pdf');
        };
    });
});