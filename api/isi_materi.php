<?php
// Mengambil nilai 'bab' dari URL (default ke bab 1 jika kosong)
$bab = isset($_GET['bab']) ? (int)$_GET['bab'] : 1;

$judul = "";
$deskripsi = "";
$konten = "";

switch ($bab) {
    case 1:
        $judul = "Bab 1: Mengenal Bentuk Aljabar secara Mendalam";
        $deskripsi = "Komprehensif: Struktur Anatomi Ekspresi Aljabar, Klasifikasi Polinomial, dan Derajat Suku.";
        $konten = "
            <div class='sub-bab'>
                <h3>Sub-Bab A: Hakikat Filosofis Aljabar</h3>
                <p>Aljabar (berasal dari bahasa Arab <i>\"al-jabr\"</i> yang berarti penggabungan atau pemulihan) adalah cabang matematika yang menggeneralisasi operasi aritmatika dengan menggunakan simbol berupa huruf atau parameter. Jika dalam aritmatika kita bekerja dengan angka pasti (misal: 2 + 3 = 5), maka dalam aljabar kita bekerja dengan entitas abstrak abstrak untuk menemukan pola universal atau nilai tersembunyi.</p>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab B: Anatomi Makroskopis Bentuk Aljabar</h3>
                <p>Setiap ekspresi aljabar dibangun oleh komponen-komponen diskret yang memiliki fungsi matematis spesifik. Perhatikan bentuk formal berikut: <span class='highlight'>-7x&sup2; + 4x - 9</span>. Mari kita bedah anatominya:</p>
                <ul>
                    <li><strong>1. Variabel (Peubah):</strong> Lambang atau simbol (biasanya huruf kecil seperti x, y, z, a, b) yang merepresentasikan suatu nilai yang belum diketahui atau dapat berubah-ubah nilainya. Pada contoh di atas, variabelnya adalah <i>x</i>.</li>
                    <li><strong>2. Koefisien:</strong> Faktor pengali berupa bilangan numerik yang terletak langsung di depan variabel. Koefisien menentukan bobot magnitudo dari variabel tersebut. Pada suku pertama (-7x&sup2;), koefisiennya adalah <b>-7</b>. Pada suku kedua (4x), koefisiennya adalah <b>4</b>.</li>
                    <li><strong>3. Konstanta:</strong> Suku yang berupa bilangan tetap (absolut) yang tidak terikat oleh variabel apa pun. Nilainya bersifat permanen dalam sistem persamaan tersebut. Pada contoh di atas, konstantanya adalah <b>-9</b> (tanda minus wajib diikutkan).</li>
                </ul>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab C: Teori Suku (Terms) dan Klasifikasi Polinomial</h3>
                <p>Suku adalah bagian dari bentuk aljabar yang dipisahkan oleh operasi penjumlahan (+) atau pengurangan (-). Berdasarkan jumlah sukunya, ekspresi aljabar diklasifikasikan menjadi:</p>
                <div class='table-container'>
                    <table>
                        <tr><th>Klasifikasi</th><th>Definisi</th><th>Contoh Konkret</th></tr>
                        <tr><td><b>Monomial</b></td><td>Ekspresi yang hanya terdiri dari satu suku tunggal.</td><td>5x, -3a&sup2;b, 12</td></tr>
                        <tr><td><b>Binomial</b></td><td>Ekspresi suku dua yang dihubungkan satu operasi.</td><td>2x + 5, a&sup2; - b&sup2;</td></tr>
                        <tr><td><b>Trinomial</b></td><td>Ekspresi suku tiga yang dihubungkan dua operasi.</td><td>x&sup2; + 5x + 6</td></tr>
                        <tr><td><b>Polinomial</b></td><td>Suku banyak (secara umum untuk suku lebih dari tiga).</td><td>x&sup3; - 4x&sup2; + 2x - 7</td></tr>
                    </table>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab D: Konsep Derajat (Degree) Aljabar</h3>
                <p>Derajat suatu bentuk aljabar adalah pangkat tertinggi dari variabel-variabelnya. Mengetahui derajat sangat krusial untuk menentukan karakteristik grafik dan jumlah akar penyelesaian.</p>
                <ul>
                    <li>Pada suku tunggal tunggal bernilai banyak variabel seperti <b>5x&sup2;y&sup3;</b>, derajatnya adalah hasil penjumlahan pangkat variabelnya: 2 + 3 = <b>derajat 5</b>.</li>
                    <li>Pada polinomial berantai seperti <b>x&sup4; - 3x&sup2; + 5</b>, derajatnya diambil dari pangkat tertinggi komponen tunggalnya, yaitu <b>derajat 4</b>.</li>
                </ul>
            </div>
        ";
        break;

    case 2:
        $judul = "Bab 2: Operasi Hitung Aljabar Kompleks";
        $deskripsi = "Komprehensif: Hukum Komutatif, Asosiatif, Distributif, dan Manipulasi Suku Sejenis Multi-Variabel.";
        $konten = "
            <div class='sub-bab'>
                <h3>Sub-Bab A: Doktrin Suku Sejenis (Like Terms)</h3>
                <p>Aturan mutlak dalam penjumlahan dan pengurangan aljabar menyatakan bahwa <b>dua suku atau lebih hanya dapat dioperasikan secara numerik jika dan hanya jika suku-suku tersebut SEJENIS</b>.</p>
                <blockquote>
                    <b>Syarat Suku Sejenis:</b> Memiliki variabel yang sama PERSIS, dan setiap variabel tersebut memiliki pangkat yang sama PERSIS pula.
                </blockquote>
                <div class='example-box visual-bad'>
                    <b>SALAH (Miskonsepsi Umum):</b> 3x + 2x&sup2; = 5x&sup3; &times; (Ini salah besar! x dan x&sup2; tidak sejenis karena pangkatnya berbeda. Bentuk ini tidak bisa dijumlahkan lebih lanjut).
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab B: Aksioma Hukum Aljabar</h3>
                <p>Dalam memanipulasi ekspresi aljabar yang panjang, kita bersandar pada tiga hukum formal matematika:</p>
                <ol>
                    <li><strong>Hukum Komutatif (Pertukaran):</strong> a + b = b + a (Posisi suku boleh ditukar beserta tanda operasinya).</li>
                    <li><strong>Hukum Asosiatif (Pengelompokan):</strong> (a + b) + c = a + (b + c).</li>
                    <li><strong>Hukum Distributif (Penyebaran):</strong> a(b + c) = ab + ac.</li>
                </ol>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab C: Lembar Kerja Langkah Demi Langkah (Kasus Multi-Variabel)</h3>
                <p>Mari kita selesaikan penyederhanaan tingkat lanjut dari ekspresi berikut:</p>
                <div class='formula-box'>Soal: Sederhanakan bentuk dari: 4x - 3y + 7 + 2y - 5x - 10</div>
                
                <div class='example-box'>
                    <h4>Algoritma Penyelesaian:</h4>
                    <p><b>Langkah 1 (Pengelompokkan Suku Sejenis):</b> Dekatkan suku-suku yang memiliki variabel sama dengan hukum komutatif.</p>
                    <p>&rarr; (4x - 5x) + (-3y + 2y) + (7 - 10)</p>
                    <br>
                    <p><b>Langkah 2 (Ekstraksi Koefisien):</b> Operasikan koefisien angka di depan variabelnya.</p>
                    <p>&rarr; (4 - 5)x + (-3 + 2)y + (7 - 10)</p>
                    <p>&rarr; (-1)x + (-1)y + (-3)</p>
                    <br>
                    <p><b>Langkah 3 (Finalisasi Notasi):</b> Sederhanakan penulisan tanda (koefisien 1 atau -1 tidak perlu ditulis angkanya).</p>
                    <p>&rarr; <b>-x - y - 3</b> (Jawaban Akhir)</p>
                </div>
            </div>
        ";
        break;

    case 3:
        $judul = "Bab 3: Teori Perkalian dan Pembagian Aljabar Lanjut";
        $deskripsi = "Komprehensif: Metode FOIL Suku Dua, Pola Kuadrat Istimewa, dan Pembagian Polinomial Bersusun (Porogapit).";
        $konten = "
            <div class='sub-bab'>
                <h3>Sub-Bab A: Perkalian Monomial ke Polinomial</h3>
                <p>Ketika mengalikan suku aljabar, koefisien dikalikan dengan koefisien, sedangkan variabel dikalikan menggunakan hukum eksponen dasar: <span class='highlight'>a<sup>m</sup> &times; a<sup>n</sup> = a<sup>m+n</sup></span>.</p>
                <div class='example-box'>
                    <h4>Contoh Tunggal:</h4>
                    <p>2x &times; 4x = (2 &times; 4)(x &times; x) = <b>8x&sup2;</b></p>
                    <p>3x&sup2;(2x - 4) = (3x&sup2; &times; 2x) - (3x&sup2; &times; 4) = <b>6x&sup3; - 12x&sup2;</b></p>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab B: Perkalian Binomial (Metode FOIL / Skema Pelangi)</h3>
                <p>Untuk mengalikan bentuk (a + b)(c + d), digunakan metode FOIL (First, Outer, Inner, Last):</p>
                <ul>
                    <li><b>F</b>irst: Kalikan suku pertama &rarr; a &times; c = ac</li>
                    <li><b>O</b>uter: Kalikan suku luar &rarr; a &times; d = ad</li>
                    <li><b>I</b>nner: Kalikan suku dalam &rarr; b &times; c = bc</li>
                    <li><b>L</b>ast: Kalikan suku terakhir &rarr; b &times; d = bd</li>
                </ul>
                <div class='example-box'>
                    <h4>Pembuktian Kasus: (x + 2)(x + 3)</h4>
                    <p>&rarr; (x &times; x) + (x &times; 3) + (2 &times; x) + (2 &times; 3)</p>
                    <p>&rarr; x&sup2; + 3x + 2x + 6  <i>(Sederhanakan suku sejenis di tengah)</i></p>
                    <p>&rarr; <b>x&sup2; + 5x + 6</b></p>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab C: Tiga Pola Kuadrat Istimewa Wajib</h3>
                <p>Terdapat rumus cepat aljabar yang wajib dihafal karena sangat sering muncul pada kuis tingkat lanjut dan pemfaktoran:</p>
                <div class='formula-box'>
                    1. Kuadrat Penjumlahan: (a + b)&sup2; = a&sup2; + 2ab + b&sup2;<br>
                    2. Kuadrat Pengurangan: (a - b)&sup2; = a&sup2; - 2ab + b&sup2;<br>
                    3. Selisih Dua Kuadrat: (a - b)(a + b) = a&sup2; - b&sup2;
                </div>
                <p>Contoh aplikasi rumus nomor 3: Hasil dari <span class='highlight'>(x - 5)(x + 5)</span> tanpa perlu menjabarkan satu per satu langsung didapat <span class='highlight'>x&sup2; - 25</span>.</p>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab D: Algoritma Pembagian Polinomial Bersusun (Long Division)</h3>
                <p>Pembagian bentuk aljabar dengan derajat tinggi dapat diselesaikan menggunakan cara bersusun pembagian angka (porogapit). Konsep dasarnya adalah mengeliminasi suku berderajat tertinggi secara bertahap.</p>
                <div class='example-box'>
                    <h4>Contoh Kasus: Hitunglah (x&sup2; + 5x + 6) &divide; (x + 2)</h4>
                    <p><b>Langkah 1:</b> Bagi suku pertama pembilang dengan suku pertama penyebut: x&sup2; &divide; x = <b>x</b>. Letakkan x di atas sebagai hasil sementara.</p>
                    <p><b>Langkah 2:</b> Kalikan x tersebut dengan pembagi: x(x + 2) = <b>x&sup2; + 2x</b>. Tulis di bawah suku awal lalu kurangkan.</p>
                    <p><b>Langkah 3:</b> Hasil pengurangannya: (x&sup2; + 5x + 6) - (x&sup2; + 2x) = <b>3x + 6</b>.</p>
                    <p><b>Langkah 4:</b> Ulangi proses: Bagi 3x dengan x: 3x &divide; x = <b>3</b>. Tambahkan angka +3 di hasil atas.</p>
                    <p><b>Langkah 5:</b> Kalikan kembali: 3(x + 2) = 3x + 6. Kurangkan lagi, menyisakan sisa <b>0</b>.</p>
                    <p>Maka hasil mutlaknya adalah: <b>x + 3</b></p>
                </div>
            </div>
        ";
        break;

    case 4:
        $judul = "Bab 4: Persamaan Linear Satu Variabel (PLSV) & Pemodelan";
        $deskripsi = "Komprehensif: Sifat Ekuivalensi Karakter, Teknik Transposisi Multi-Langkah, dan Pemodelan Soal Cerita Nyata.";
        $konten = "
            <div class='sub-bab'>
                <h3>Sub-Bab A: Filosofi Keseimbangan (Ekuivalensi)</h3>
                <p>Persamaan Linear Satu Variabel (PLSV) ditandai dengan relasi tanda sama dengan (=) dan pangkat tertinggi variabelnya adalah satu. Sifat dasar persamaan mengadopsi prinsip neraca timbangan klasik:</p>
                <blockquote>
                    Apapun aksi manipulasi matematika (ditambah, dikurang, dikali, dibagi) yang kamu berlakukan pada <b>Ruas Kiri</b>, wajib hukumnya diberlakukan hal yang sama persis pada <b>Ruas Kanan</b> demi menjaga ekuivalensi (keseimbangan nilai).
                </blockquote>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab B: Teknik Transposisi (Aturan Pindah Ruas)</h3>
                <p>Untuk mempercepat pencarian nilai variabel, digunakan shortcut bernama Transposisi Ruas. Setiap komponen yang melompati pagar tanda '=' akan mengalami inversi (operasi kebalikannya):</p>
                <div class='table-container'>
                    <table>
                        <tr><th>Operasi Awal</th><th>Inversi Pindah Ruas</th></tr>
                        <tr><td>Penjumlahan (+)</td><td>Pengurangan (-)</td></tr>
                        <tr><td>Pengurangan (-)</td><td>Penjumlahan (+)</td></tr>
                        <tr><td>Perkalian (&times;)</td><td>Pembagian (&divide;)</td></tr>
                        <tr><td>Pembagian (&divide;)</td><td>Perkalian (&times;)</td></tr>
                    </table>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab C: Studi Kasus Penyelesaian PLSV Fraksional Kompleks</h3>
                <p>Mari kita memecahkan persamaan rumit yang memiliki variabel di kedua sisi:</p>
                <div class='formula-box'>Soal: Tentukan nilai x yang memenuhi persamaan: 7x - 4 = 3x + 16</div>
                
                <div class='example-box'>
                    <h4>Langkah Penyelesaian Sistematis:</h4>
                    <p><b>Langkah 1 (Isolasi Variabel):</b> Pindahkan semua komponen yang mengandung variabel ke ruas kiri, dan seluruh konstanta murni ke ruas kanan.</p>
                    <p>&rarr; 7x - 3x = 16 + 4  <i>(Perhatikan: 3x menjadi -3x, dan -4 menjadi +4)</i></p>
                    <br>
                    <p><b>Langkah 2 (Penyederhanaan Suku):</b> Hitung hasil operasi masing-masing ruas.</p>
                    <p>&rarr; 4x = 20</p>
                    <br>
                    <p><b>Langkah 3 (Ekstraksi Akhir):</b> Pindahkan koefisien angka 4 (perkalian) menjadi pembagi di sisi kanan.</p>
                    <p>&rarr; x = 20 / 4</p>
                    <p>&rarr; <b>x = 5</b> (Ditemukan! Nilai kebenaran sistem adalah x sama dengan 5).</p>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab D: Konstruksi Pemodelan dari Soal Cerita Dunia Nyata</h3>
                <p>Kemampuan sejati aljabar adalah merubah narasi bahasa manusia menjadi kalimat matematika murni.</p>
                <p><b>Contoh Masalah:</b> Tiga buah bilangan bulat berurutan jika dijumlahkan menghasilkan nilai total 45. Tentukan bilangan pertamanya!</p>
                <div class='example-box'>
                    <h4>Langkah Pemodelan:</h4>
                    <p>Misalkan bilangan pertama = <b>x</b></p>
                    <p>Karena berurutan, bilangan kedua pasti = <b>x + 1</b></p>
                    <p>Dan bilangan ketiga pasti = <b>x + 2</b></p>
                    <br>
                    <p>Susun Model Matematikanya:</p>
                    <p>&rarr; Bilangan 1 + Bilangan 2 + Bilangan 3 = 45</p>
                    <p>&rarr; x + (x + 1) + (x + 2) = 45</p>
                    <p>&rarr; 3x + 3 = 45 <i>(Sederhanakan suku sejenis)</i></p>
                    <p>&rarr; 3x = 45 - 3 &rarr; 3x = 42</p>
                    <p>&rarr; x = 42 / 3 &rarr; <b>x = 14</b></p>
                    <p>Jadi, bilangan pertama dari susunan tersebut adalah <b>14</b> (Urutan angkanya: 14, 15, 16).</p>
                </div>
            </div>
        ";
        break;

    case 5:
        $judul = "Bab 5: Sistem Persamaan Linear Dua Variabel (SPLDV) Terpadu";
        $deskripsi = "Komprehensif: Metode Eliminasi, Substitusi, Grafik, dan Penerapan Dunia Nyata.";
        $konten = "
            <div class='sub-bab'>
                <h3>Sub-Bab A: Konsep Dasar Sistem Persamaan Linear Dua Variabel</h3>
                <p>Sistem Persamaan Linear Dua Variabel (SPLDV) adalah dua atau lebih persamaan linear yang memiliki dua variabel yang sama dan harus diselesaikan secara bersamaan untuk menemukan nilai kedua variabel tersebut.</p>
                <blockquote>
                    <b>Bentuk Umum SPLDV:</b><br>
                    a₁x + b₁y = c₁<br>
                    a₂x + b₂y = c₂<br>
                    <br>
                    Dimana: a₁, b₁, c₁, a₂, b₂, c₂ adalah konstanta, dan x, y adalah variabel yang dicari.
                </blockquote>
                <p>Perbedaan signifikan dengan PLSV (Persamaan Linear Satu Variabel) adalah pada SPLDV kita memiliki <strong>dua variabel berbeda</strong> yang saling berhubungan dalam dua persamaan sekaligus. Solusi SPLDV adalah pasangan terurut (x, y) yang memenuhi kedua persamaan secara bersamaan.</p>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab B: Metode Substitusi (Penggantian Variabel)</h3>
                <p>Metode substitusi bekerja dengan mengganti salah satu variabel menggunakan ekspresi dari persamaan pertama, kemudian menyubtitusikannya ke persamaan kedua.</p>
                <div class='formula-box'>
                    Contoh Soal:<br>
                    2x + y = 5  ... (Persamaan 1)<br>
                    x - y = 1   ... (Persamaan 2)
                </div>
                
                <div class='example-box'>
                    <h4>Algoritma Penyelesaian:</h4>
                    <p><b>Langkah 1 (Ubah Salah Satu Persamaan):</b> Pilih persamaan yang paling sederhana dan isolasi salah satu variabel. Dari Persamaan 2:</p>
                    <p>&rarr; x - y = 1</p>
                    <p>&rarr; x = y + 1 <i>(Isolasi x)</i></p>
                    <br>
                    <p><b>Langkah 2 (Substitusi ke Persamaan Lain):</b> Ganti x dalam Persamaan 1 dengan ekspresi (y + 1):</p>
                    <p>&rarr; 2(y + 1) + y = 5</p>
                    <p>&rarr; 2y + 2 + y = 5 <i>(Buka kurung)</i></p>
                    <p>&rarr; 3y + 2 = 5 <i>(Sederhanakan)</i></p>
                    <p>&rarr; 3y = 3 &rarr; <b>y = 1</b></p>
                    <br>
                    <p><b>Langkah 3 (Temukan Variabel Kedua):</b> Substitusi nilai y = 1 ke persamaan x = y + 1:</p>
                    <p>&rarr; x = 1 + 1 &rarr; <b>x = 2</b></p>
                    <br>
                    <p><b>Langkah 4 (Verifikasi):</b> Periksa apakah (x, y) = (2, 1) memenuhi kedua persamaan:</p>
                    <p>&rarr; Persamaan 1: 2(2) + 1 = 5 ✓ (Benar)</p>
                    <p>&rarr; Persamaan 2: 2 - 1 = 1 ✓ (Benar)</p>
                    <p><b>Solusi: (x, y) = (2, 1)</b></p>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab C: Metode Eliminasi (Penghapusan Variabel)</h3>
                <p>Metode eliminasi menghilangkan salah satu variabel dengan cara mengoperasikan (menambah atau mengurangi) dua persamaan setelah koefisien salah satu variabel disamakan.</p>
                <div class='formula-box'>
                    Contoh Soal (sama seperti sebelumnya):<br>
                    2x + y = 5  ... (Persamaan 1)<br>
                    x - y = 1   ... (Persamaan 2)
                </div>
                
                <div class='example-box'>
                    <h4>Algoritma Penyelesaian:</h4>
                    <p><b>Langkah 1 (Identifikasi Koefisien):</b> Amati koefisien setiap variabel. Untuk mengeliminasi y, kita lihat bahwa koefisien y sudah sama besar tapi berlawanan tanda (Pers 1: +y, Pers 2: -y).</p>
                    <br>
                    <p><b>Langkah 2 (Jumlahkan Persamaan):</b> Karena koefisien y sudah saling menghilangkan, langsung jumlahkan kedua persamaan:</p>
                    <p>&rarr; (2x + y) + (x - y) = 5 + 1</p>
                    <p>&rarr; 3x = 6 &rarr; <b>x = 2</b></p>
                    <br>
                    <p><b>Langkah 3 (Temukan Variabel Kedua):</b> Substitusi x = 2 ke salah satu persamaan awal (misal Pers 1):</p>
                    <p>&rarr; 2(2) + y = 5</p>
                    <p>&rarr; 4 + y = 5 &rarr; <b>y = 1</b></p>
                    <br>
                    <p><b>Solusi: (x, y) = (2, 1)</b></p>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab D: Metode Grafik (Visualisasi Geometris)</h3>
                <p>Metode grafik menyelesaikan SPLDV dengan menggambar kedua garis linear di koordinat Kartesius. Titik potong kedua garis adalah solusi SPLDV.</p>
                <p><b>Langkah Umum:</b></p>
                <ol>
                    <li>Ubah setiap persamaan menjadi bentuk y = mx + c</li>
                    <li>Gambar kedua garis pada grafik yang sama</li>
                    <li>Temukan koordinat titik potong kedua garis</li>
                    <li>Koordinat tersebut adalah solusi (x, y)</li>
                </ol>
                <div class='example-box'>
                    <h4>Transformasi Persamaan ke Bentuk y = mx + c:</h4>
                    <p>Dari: 2x + y = 5 &rarr; <b>y = -2x + 5</b></p>
                    <p>Dari: x - y = 1 &rarr; <b>y = x - 1</b></p>
                    <p>Kedua garis akan berpotongan di titik (2, 1), yang merupakan solusi SPLDV.</p>
                </div>
            </div>

            <div class='sub-bab'>
                <h3>Sub-Bab E: Penerapan SPLDV dalam Konteks Dunia Nyata</h3>
                <p>SPLDV sangat berguna untuk memecahkan masalah bisnis, ilmu alam, dan kehidupan sehari-hari yang melibatkan dua hubungan linier.</p>
                <div class='example-box'>
                    <h4>Studi Kasus: Toko Bunga Siti</h4>
                    <p>Siti mengoperasikan toko bunga. Harga 3 tangkai bunga mawar dan 2 tangkai bunga lili adalah Rp 50.000. Harga 1 tangkai bunga mawar dan 4 tangkai bunga lili adalah Rp 40.000. Tentukan harga per tangkai masing-masing bunga!</p>
                    <br>
                    <p><b>Pemodelan Matematis:</b></p>
                    <p>Misalkan: x = harga bunga mawar per tangkai, y = harga bunga lili per tangkai</p>
                    <p>Persamaan 1: 3x + 2y = 50.000</p>
                    <p>Persamaan 2: x + 4y = 40.000</p>
                    <br>
                    <p><b>Solusi (menggunakan metode eliminasi):</b></p>
                    <p>Kalikan Persamaan 2 dengan 3: 3x + 12y = 120.000</p>
                    <p>Kurangkan dari Persamaan 1: (3x + 2y) - (3x + 12y) = 50.000 - 120.000</p>
                    <p>&rarr; -10y = -70.000 &rarr; y = 7.000</p>
                    <p>Substitusi ke Persamaan 2: x + 4(7.000) = 40.000 &rarr; x = 12.000</p>
                    <br>
                    <p><b>Jawaban:</b> Harga bunga mawar = Rp 12.000/tangkai, Harga bunga lili = Rp 7.000/tangkai</p>
                </div>
            </div>
        ";
        break;

    default:
        $judul = "Materi Tidak Tersedia";
        $deskripsi = "Error 404";
        $konten = "<p>Silakan pilih nomor sub-bab yang valid.</p>";
        break;

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?> - Learnify Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: #f8fafc; color: #334155; padding: 50px 20px; line-height: 1.8; }
        
        .content-card {
            background: #ffffff;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 50px 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
            border: 1px solid #e2e8f0;
        }

        .header-materi { border-bottom: 3px solid #3b82f6; padding-bottom: 25px; margin-bottom: 40px; }
        .header-materi h1 { color: #1e293b; font-size: 30px; font-weight: 700; letter-spacing: -0.5px; }
        .header-materi p { color: #64748b; font-size: 16px; margin-top: 8px; }

        /* Styling Sub Bab */
        .sub-bab { margin-bottom: 45px; }
        .sub-bab h3 { color: #1e293b; font-size: 20px; margin-bottom: 15px; font-weight: 600; padding-bottom: 5px; border-bottom: 1px dashed #cbd5e1; }
        
        h4 { color: #1e293b; font-size: 16px; margin-bottom: 10px; font-weight: 600; }
        p { font-size: 15.5px; color: #475569; margin-bottom: 15px; text-align: justify; }
        ul, ol { margin-left: 25px; margin-bottom: 20px; color: #475569; font-size: 15px; }
        li { margin-bottom: 10px; }

        /* Komponen Blok Edukasi */
        .formula-box {
            background: #1e293b; color: #38bdf8; border-radius: 10px;
            padding: 20px; margin: 25px 0; font-family: 'Courier New', Courier, monospace;
            font-size: 16px; box-shadow: inset 0 2px 8px rgba(0,0,0,0.2); line-height: 1.6;
        }
        .example-box {
            background: #f0fdf4; border-left: 5px solid #22c55e; border-radius: 4px;
            padding: 20px; margin: 25px 0;
        }
        .visual-bad { background: #fef2f2; border-left-color: #ef4444; color: #991b1b; }
        
        blockquote {
            background: #f0f9ff; border-left: 5px solid #0284c7;
            padding: 15px 20px; font-style: italic; margin: 20px 0; color: #0369a1; border-radius: 4px;
        }
        .highlight { background: #fef08a; padding: 2px 6px; border-radius: 4px; font-weight: 600; color: #854d0e; }

        /* Tabel Data Klasifikasi */
        .table-container { overflow-x: auto; margin: 25px 0; border-radius: 8px; border: 1px solid #e2e8f0; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 14.5px; }
        th { background: #f1f5f9; color: #1e293b; padding: 12px 15px; font-weight: 600; }
        td { padding: 12px 15px; border-top: 1px solid #e2e8f0; color: #475569; }
        tr:hover { background: #f8fafc; }

        /* Tombol Navigasi */
        .action-buttons { display: flex; justify-content: space-between; margin-top: 50px; border-top: 2px solid #e2e8f0; padding-top: 30px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 12px 25px; border-radius: 10px; font-weight: 600; text-decoration: none; transition: 0.2s; font-size: 15px; border: none; cursor: pointer; }
        .btn-back { background: #cbd5e1; color: #334155; }
        .btn-back:hover { background: #94a3b8; color: #0f172a; }
        .btn-next { background: #3b82f6; color: #ffffff; box-shadow: 0 4px 12px rgba(59,130,246,0.3); }
        .btn-next:hover { background: #1d4ed8; box-shadow: 0 4px 16px rgba(29,78,216,0.4); }
        .btn i { margin: 0 8px; }
    </style>
</head>
<body>

    <div class="content-card">
        <div class="header-materi">
            <h1><?php echo $judul; ?></h1>
            <p><?php echo $deskripsi; ?></p>
        </div>

        <div class="materi-body">
            <?php echo $konten; ?>
        </div>

       <div class="action-buttons" style="justify-content: center;">
            <a href="materi.php" class="btn btn-back" style="padding: 12px 30px; font-size: 16px;">
                <i class="fas fa-arrow-left"></i> Kembali ke Pilihan Bab
            </a>
        </div>
    </div>

</body>
</html>