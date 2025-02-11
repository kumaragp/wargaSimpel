document.addEventListener('DOMContentLoaded', function() {
    const { jsPDF } = window.jspdf;

    // Surat Keterangan Usaha
    document.getElementById('btnBuatSuratUsaha').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const tempatTanggal = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

        const doc = new jsPDF();

        // Tambahkan gambar header
        const img = new Image();
        img.src = 'images/l.jpg';

        img.onload = function() { 
            doc.addImage(img, 'PNG', 15, 10, 30, 30); // (src, type, x, y, width, height)
            
            // Tambahkan teks header
            doc.setFont('times', 'normal');
            doc.setFontSize(12);
            doc.text('PEMERINTAH KABUPATEN [Nama Kabupaten]', 105, 20, { align: 'center' });
            doc.text('KECAMATAN [Nama Kecamatan]', 105, 27, { align: 'center' });
            doc.text('DESA [Nama Desa]', 105, 34, { align: 'center' });

            doc.setFont('times', 'bold');
            doc.setFontSize(14);
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN USAHA', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text(`Nama                  : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir  : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin         : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            
            doc.text('Demikian keterangan ini dibuat kami para ahli waris dari almarhum / almarhumah. ', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Tempat, ${tempatTanggal}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Usaha.pdf');
        };
    });

    // Surat Keterangan Lahir
    document.getElementById('btnBuatSuratLahir').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const pekerjaan = document.getElementById('pekerjaan').value;
        const alamat = document.getElementById('alamat').value;
        const namaAyah = document.getElementById('namaAyah').value;
        const namaIbu = document.getElementById('namaIbu').value;
        const anakKe = document.getElementById('anakKe').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN LAHIR', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text(`Nama                  : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir  : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin        : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            doc.text(`Pekerjaan            : ${pekerjaan}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat                : ${alamat}`, 20, yPos);
            yPos += 12;

            doc.text('Adalah anak dari :', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Nama Ayah             : ${namaAyah}`, 20, yPos);
            yPos += 7;
            doc.text(`Nama Ibu              : ${namaIbu}`, 20, yPos);
            yPos += 7;
            doc.text(`Anak Ke               : ${anakKe}`, 20, yPos);
            yPos += 12;

            doc.text('Surat Keterangan Lahir ini dibuat untuk menerangkan bahwa bayi yang disebutkan di atas benar-benar telah lahir di tempat dan tanggal yang tertera. Surat ini digunakan sebagai syarat administrasi pencatatan sipil.', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Lahir.pdf');

        };
    });

    // Surat Keterangan Ahli Waris
    document.getElementById('btnBuatSuratAhliWaris').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const namaAlmarhumAlmarhumah = document.getElementById('namaAlmarhumAlmarhumah').value;
        const tahunMeninggalDunia = document.getElementById('tahunMeninggalDunia').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN AHLI WARIS', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;

            doc.text(`Kami yang bertanda tangan di bawah ini ahli waris dari Almarhum/Almarhumah ${namaAlmarhumAlmarhumah}`, 20, yPos, { maxWidth: 165 });
            yPos += 20;
            doc.text(`Menerangkan bahwa dengan sesungguhnya almarhum bertempat tinggal di Desa ......., Kecamatan ....., Kabupaten ...... dan pada tahun ${tahunMeninggalDunia}`, 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Nama                  : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir  : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin        : ${jenisKelamin}`, 20, yPos);
            yPos += 7;

            doc.text('Demikian keterangan ini dibuat kami para ahli waris dari almarhum / almarhumah.', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Ahli_Waris.pdf');

        };
    });

    // Surat Keterangan Janda / Duda
    document.getElementById('btnBuatSuratJandaDuda').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const alamat = document.getElementById('alamat').value;
        const namaAlmarhumAlmarhumah = document.getElementById('namaAlmarhumAlmarhumah').value;
        const tahunMeninggalDunia = document.getElementById('tahunMeninggalDunia').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN JANDA / DUDA', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text(`Dengan ini menerangkan bahwa`, 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Nama                      : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir      : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat                    : ${alamat}`, 20, yPos);
            yPos += 7;

            doc.text('Memang benar yang bersangkutan diatas warga Desa ........... Kecamatan ............. Kabupaten ............ dan sesuai catatan pada kartu keluarga hingga saat ini berstatus sebagai Janda /  Duda yang sah dari :', 20, yPos, { maxWidth: 165 });

            doc.text(`Nama Almarhum/Almarhumah  : ${namaAlmarhumAlmarhumah}`, 20, yPos);
            yPos += 7;
            doc.text(`Tanggal Meninggal Dunia   : ${tahunMeninggalDunia}`, 20, yPos);
            yPos += 7;

            doc.text('Demikian surat keterangan janda / duda ini dibuat dengan sebenarnya agar dapat digunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Janda_Duda.pdf');

        };
    });

    // Surat Keterangan Tidak Mampu
    document.getElementById('btnBuatSKTM').addEventListener('click', function() {
        const nik = document.getElementById('nik').value;
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const pekerjaan = document.getElementById('pekerjaan').value;
        const agama = document.getElementById('agama').value;
        const alamat = document.getElementById('alamat').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN TIDAK MAMPU', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text(`Dengan ini menerangkan bahwa:`, 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Nama Lengkap              : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir      : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin             : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            doc.text(`NIK                       : ${nik}`, 20, yPos);
            yPos += 7;
            doc.text(`Pekerjaan                 : ${pekerjaan}`, 20, yPos);
            yPos += 7;
            doc.text(`Agama                     : ${agama}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat                    : ${alamat}`, 20, yPos);
            yPos += 7;

            doc.text('Bahwa nama yang tercantum diatas adalah benar-benar berdomisili di Desa ......., Kecamatan ........ Sepanjang pengamatan kami dan sesuai data yang ada dalam catatan kependudukan orang tersebut diatas benar tergolong dalam keluarga prasejahtera (Keluarga Berpenghasilan Rendah). Surat Keterangan ini diberikan untuk mendapatkan bantuan berupa rehab/perbaikan rumah tempat tinggal.', 20, yPos, { maxWidth: 165 });


            doc.text('Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Tidak_Mampu.pdf');

        };
    });

    // Surat Keterangan Kematian
    document.getElementById('btnBuatSuratKematian').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const pekerjaan = document.getElementById('pekerjaan').value;
        const agama = document.getElementById('agama').value;
        const alamat = document.getElementById('alamat').value;
        const tahunMeninggalDunia = document.getElementById('tahunMeninggalDunia').value;
        const penyebabKematian = document.getElementById('penyebabKematian').value;
        const tempat = document.getElementById('tempat').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN KEMATIAN', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });

            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text(`Dengan ini menerangkan bahwa:`, 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Nama Lengkap              : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir      : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin             : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            doc.text(`Pekerjaan                 : ${pekerjaan}`, 20, yPos);
            yPos += 7;
            doc.text(`Agama                     : ${agama}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat                    : ${alamat}`, 20, yPos);
            yPos += 7;

            doc.text('Memang benar yang bersangkutan diatas warga Desa ........,Kecamatan ........,Kabupaten .............,telah meninggal dunia pada waktu :', 20, yPos, { maxWidth: 165 });

            doc.text(`Hari/Tanggal              : ${tahunMeninggalDunia}`, 20, yPos);
            yPos += 7;
            doc.text(`Penyebab Kematian         : ${penyebabKematian}`, 20, yPos);
            yPos += 7;
            doc.text(`tempat                    : ${tempat}`, 20, yPos);

            doc.text('Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.', 20, yPos, { maxWidth: 165 });
            yPos += 20;

            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);

            doc.save('Surat_Keterangan_Kematian.pdf');

        };
    });

    // Surat Keterangan Pindah Penduduk
    document.getElementById('btnBuatSuratPindahPenduduk').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const pekerjaan = document.getElementById('pekerjaan').value;
        const agama = document.getElementById('agama').value;
        const alamatAsal = document.getElementById('alamatAsal').value;
        const statusKawin = document.getElementById('statusKawin').value;
        const desa = document.getElementById('desa').value;
        const kecamatan = document.getElementById('kecamatan').value;
        const kabupaten = document.getElementById('kabupaten').value;
        const provinsi = document.getElementById('provinsi').value;
        const alasanPindah = document.getElementById('alasanPindah').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
    
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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT KETERANGAN PINDAH PENDUDUK', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });
    
            let yPos = 70;
            
            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;

            doc.text(`Dengan ini menerangkan bahwa:`, 20, yPos, { maxWidth: 165 });
            yPos += 10;
    
            doc.text(`Nama Lengkap              : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir      : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin             : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            doc.text(`Pekerjaan                 : ${pekerjaan}`, 20, yPos);
            yPos += 7;
            doc.text(`Agama                     : ${agama}`, 20, yPos);
            yPos += 7;
            doc.text(`Status Kawin              : ${statusKawin}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat Asal               : ${alamatAsal}`, 20, yPos);
            yPos += 10;
    
            doc.text('Telah pindah ke alamat berikut:', 20, yPos);
            yPos += 10;
            doc.text(`• Desa / Kelurahan       : ${desa}`, 20, yPos);
            yPos += 7;
            doc.text(`• Kecamatan             : ${kecamatan}`, 20, yPos);
            yPos += 7;
            doc.text(`• Kota / Kabupaten      : ${kabupaten}`, 20, yPos);
            yPos += 7;
            doc.text(`• Provinsi              : ${provinsi}`, 20, yPos);
            yPos += 10;
            doc.text(`Alasan Pindah           : ${alasanPindah}`, 20, yPos);
            yPos += 20;
    
            doc.text('Demikian surat keterangan pindah ini dibuat untuk dapat dipergunakan seperlunya.', 20, yPos, { maxWidth: 165 });
            yPos += 20;
    
            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);
    
            doc.save('Surat_Keterangan_Pindah.pdf');
        };
    });

    // Surat Pengantar
    document.getElementById('btnBuatSuratPengantar').addEventListener('click', function() {
        const nik = document.getElementById('nik').value;
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const pekerjaan = document.getElementById('pekerjaan').value;
        const agama = document.getElementById('agama').value;
        const alamatAsal = document.getElementById('alamatAsal').value;
        const statusKawin = document.getElementById('statusKawin').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
    
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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT PENGANTAR', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });
    
            let yPos = 70;

            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;
    
            doc.text(`Dengan ini menerangkan bahwa:`, 20, yPos, { maxWidth: 165 });
            yPos += 10;
    
            doc.text(`Nama Lengkap              : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir      : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin             : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            doc.text(`Status Kawin              : ${statusKawin}`, 20, yPos);
            yPos += 7;
            doc.text(`Pekerjaan                 : ${pekerjaan}`, 20, yPos);
            yPos += 7;
            doc.text(`NIK                       : ${nik}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat Asal               : ${alamatAsal}`, 20, yPos);
            yPos += 10;

            doc.text('Demikian surat pengantar ini dibuat untuk dapat dipergunakan seperlunya.', 20, yPos, { maxWidth: 165 });
            yPos += 20;
    
            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);
    
            doc.save('Surat_Pengantar.pdf');
        };
    });

    // Surat Domisili
    document.getElementById('btnBuatSuratDomisili').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const ttl = document.getElementById('ttl').value;
        const jenisKelamin = document.getElementById('jenisKelamin').value;
        const pekerjaan = document.getElementById('pekerjaan').value;
        const agama = document.getElementById('agama').value;
        const alamatAsal = document.getElementById('alamatAsal').value;
        const statusKawin = document.getElementById('statusKawin').value;
        const tanggalSurat = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
    
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
            doc.text('__________________________________________________________________________', 105, 41, { align: 'center' });
            doc.text('SURAT DOMISILI', 105, 50, { align: 'center' });
            doc.setFontSize(12);
            doc.setFont('times', 'normal');
            doc.text('Nomor: ........../......../........', 105, 57, { align: 'center' });
    
            let yPos = 70;

            doc.text('Yang bertanda tangan dibawah ini Kepala Desa ........,Kecamatan ..........,Kabupaten ................', 20, yPos, { maxWidth: 165 });
            yPos += 10;
    
            doc.text(`Dengan ini menerangkan bahwa:`, 20, yPos, { maxWidth: 165 });
            yPos += 10;
    
            doc.text(`Nama Lengkap              : ${nama}`, 20, yPos);
            yPos += 7;
            doc.text(`Tempat/Tanggal Lahir      : ${ttl}`, 20, yPos);
            yPos += 7;
            doc.text(`Jenis Kelamin             : ${jenisKelamin}`, 20, yPos);
            yPos += 7;
            doc.text(`Status Kawin              : ${statusKawin}`, 20, yPos);
            yPos += 7;
            doc.text(`Pekerjaan                 : ${pekerjaan}`, 20, yPos);
            yPos += 7;
            doc.text(`Alamat Asal               : ${alamatAsal}`, 20, yPos);
            yPos += 10;

            doc.text('Demikian surat keterangan pindah ini dibuat untuk dapat dipergunakan seperlunya. ', 20, yPos, { maxWidth: 165 });
            yPos += 20;
    
            doc.text(`Tempat, ${tanggalSurat}`, 140, yPos);
            yPos += 10;
            doc.text('Lurah/Kepala Desa', 140, yPos);
            yPos += 30;
            doc.text('(Nama Kades)', 140, yPos);
    
            doc.save('Surat_Pengantar.pdf');
        };
    });
});
