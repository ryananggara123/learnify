<?php
session_start();
if(!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit; 
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="css/bantuan.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container">
        <div class="card">
            
            <div class="header-bantuan">
                <h1><i class="fas fa-question-circle"></i> Pusat Bantuan Learnify</h1>
                <p>Panduan lengkap penggunaan sistem, regulasi poin gamifikasi, dan pusat resolusi kendala</p>
            </div>
            
            <div class="content">
                
                <div class="kategori-section">
                    <h2 class="kategori-title"><i class="fas fa-user-shield"></i> 1. Pengaturan & Keamanan Akun</h2>
                    
                    <div class="faq-item">
                        <h3>Bagaimana jika terdapat kesalahan penulisan nama atau NISN?</h3>
                        <p>Data nama dan NISN ditarik langsung dari database sekolah saat pembuatan akun pertama kali. Jika terdapat kekeliruan data, silakan klik tombol "Hubungi Admin" di bawah untuk pengajuan perbaikan data administratif.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Apakah akun Learnify saya bisa diakses di beberapa perangkat sekaligus?</h3>
                        <p>Bisa, namun demi keamanan data poin belajar (XP) kamu, sangat disarankan untuk melakukan <strong>Logout</strong> dari perangkat lain sebelum berpindah agar sistem pencatatan poin kuis tidak mengalami sinkronisasi ganda.</p>
                    </div>
                </div>

                <div class="kategori-section">
                    <h2 class="kategori-title"><i class="fas fa-graduation-cap"></i> 2. Aktivitas Belajar & Sistem Gamifikasi</h2>
                    
                    <div class="faq-item">
                        <h3>📊 Apa itu XP, Streak, Badge, dan Target Mingguan?</h3>
                        <p><strong>XP (Experience Points)</strong> adalah poin pengalaman yang kamu kumpulkan setiap kali melakukan aktivitas belajar. Semakin banyak aktivitas belajar, semakin tinggi XP kamu dan semakin tinggi Grade (peringkat) kamu.</p>
                        <p class="faq-para-spacing"><strong>Streak</strong> adalah seri/konsistensi belajarmu - berapa hari berturut-turut kamu aktif belajar. Semakin panjang streak, semakin menunjukkan dedikasi belajarmu. Jika tidak belajar dalam 1 hari, streak akan reset ke 0.</p>
                        <p class="faq-para-spacing"><strong>Badge</strong> adalah lencana prestasi yang kamu dapatkan saat mencapai pencapaian tertentu, seperti "Pemula", "Penggiat Belajar", atau "Master". Badge ditampilkan di profil kamu sebagai bukti dedikasi dan pencapaian.</p>
                        <p class="faq-para-spacing"><strong>Target Mingguan</strong> adalah tujuan belajar kamu setiap minggu. Jika kamu berhasil mencapai target mingguan (misalnya mengumpulkan 500 XP per minggu), kamu akan mendapatkan bonus poin dan badge khusus!</p>
                    </div>

                    <div class="faq-item">
                        <h3>Berapa poin XP yang didapatkan dari setiap aktivitas belajar?</h3>
                        <p>Sistem gamifikasi Learnify menghargai setiap detiknya waktu belajarmu dengan skema pembagian poin sebagai berikut:</p>
                        <table class="tabel-grade">
                            <thead>
                                <tr>
                                    <th>Aktivitas Belajar</th>
                                    <th>Poin XP Didapat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Membaca Modul Capaian</td>
                                    <td>+50 XP</td>
                                    <td>Satu kali klaim per materi</td>
                                </tr>
                                <tr>
                                    <td>Menonton Video Pembelajaran</td>
                                    <td>+100 XP</td>
                                    <td>Poin masuk jika video selesai diputar</td>
                                </tr>
                                <tr>
                                    <td>Menjawab Benar pada Kuis/Evaluasi</td>
                                    <td>+25 XP / Soal</td>
                                    <td>Berlaku kelipatan jawaban benar</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="faq-item">
                        <h3>Berapa batas poin minimum untuk menaikkan peringkat Grade?</h3>
                        <p>Tingkatan peringkat belajar (Grade) kamu di halaman profil akan berubah secara otomatis sesuai batas akumulasi berikut: <strong>Grade E</strong> (0 - 200 XP), <strong>Grade C</strong> (201 - 600 XP), <strong>Grade B</strong> (601 - 1200 XP), dan <strong>Grade A+</strong> (Di atas 1200 XP).</p>
                    </div>

                    <div class="faq-item">
                        <h3>Apakah kuis evaluasi yang gagal bisa diulang kembali?</h3>
                        <p>Bisa. Kamu diberi kesempatan mengulang kuis di menu Evaluasi sebanyak yang kamu butuhkan untuk memperbaiki pemahaman materi, namun penambahan bonus XP hanya diambil dari skor tertinggi yang pernah kamu raih.</p>
                    </div>
                </div>

                <div class="kategori-section">
                    <h2 class="kategori-title"><i class="fas fa-tools"></i> 3. Pusat Resolusi Masalah Teknis</h2>
                    
                    <div class="faq-item">
                        <h3>Video pembelajaran tidak berputar atau loading terus-menerus?</h3>
                        <p>Kendala ini umumnya disebabkan oleh kualitas koneksi internet atau sisa berkas sampah di browser (*cache*). Solusinya: Pastikan jaringan internet stabil, atau gunakan kombinasi tombol <strong>CTRL + F5</strong> di keyboard untuk membersihkan memori browser.</p>
                    </div>

                   

                <div class="kontak-admin">
                    <h4>Masih menemukan kendala atau sistem error?</h4>
                    <p>Tim dukungan teknis Learnify siap membantu menyelesaikan kendala seputar aplikasi pembelajaranmu.</p>
                    <a href="https://wa.me/6282176880877" target="_blank" class="btn-wa">
                        <i class="fab fa-whatsapp"></i> Hubungi Layanan IT Support
                    </a>
                </div>
            </div>

            <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard Utama</a>
        </div>
    </div>

</body>
</html>