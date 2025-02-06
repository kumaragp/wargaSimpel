document.addEventListener('DOMContentLoaded', function() {
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

        doc.text(`Tempat, ${tempatTanggal}`, 140, yPos);
        yPos += 10;
        doc.text('Lurah/Kepala Desa', 140, yPos);
        yPos += 30;
        doc.text('(Nama Pejabat)', 140, yPos);

        doc.save('Surat_Keterangan_Usaha.pdf');
    });
});
