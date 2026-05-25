<?php
// Bank Soal Terpisah - Learnify
$bank_kuis = [
    'kuis1' => [
        'judul' => 'Kuis 1: Operasi Dasar Aljabar',
        'soal' => [
            ['t' => 'Bentuk paling sederhana dari 2a + 3a adalah...', 'o' => ['a' => '5a', 'b' => '6a', 'c' => '5a²', 'd' => '6a²'], 'k' => 'a'],
            ['t' => 'Hasil pengurangan 5x - 2x adalah...', 'o' => ['a' => '7x', 'b' => '3x', 'c' => '-3x', 'd' => '3'], 'k' => 'b'],
            ['t' => 'Hasil penjabaran dari 3(x + 2) adalah...', 'o' => ['a' => '3x + 2', 'b' => 'x + 6', 'c' => '3x + 6', 'd' => '6x'], 'k' => 'c'],
            ['t' => 'Hasil dari (x + 2)(x + 3) adalah...', 'o' => ['a' => 'x² + 6', 'b' => 'x² + 5x + 6', 'c' => 'x² + x + 6', 'd' => '2x + 5'], 'k' => 'b'],
            ['t' => 'Sederhanakan: 4y + 2 - y + 5', 'o' => ['a' => '3y + 7', 'b' => '5y + 7', 'c' => '3y + 3', 'd' => '5y + 3'], 'k' => 'a'],
            ['t' => 'Hasil perkalian 2x(x - 4) adalah...', 'o' => ['a' => '2x² - 4', 'b' => '2x² - 4x', 'c' => '2x² - 8x', 'd' => '2 - 8'], 'k' => 'c'],
            ['t' => 'Hasil dari (2a - b) + (a + 3b) adalah...', 'o' => ['a' => '3a + 2b', 'b' => '3a - 2b', 'c' => 'a + 4b', 'd' => '3a + 4b'], 'k' => 'a'],
            ['t' => 'Bentuk sederhana dari 10x / 2 adalah...', 'o' => ['a' => '5', 'b' => '5x', 'c' => '20x', 'd' => '8x'], 'k' => 'b'],
            ['t' => 'Hasil dari (x - 5)(x + 5) adalah...', 'o' => ['a' => 'x² - 25', 'b' => 'x² + 25', 'c' => 'x² - 10x - 25', 'd' => 'x² + 10x + 25'], 'k' => 'a'],
            ['t' => 'Sederhanakan: 3a² + 2a²', 'o' => ['a' => '5a', 'b' => '6a²', 'c' => '5a²', 'd' => '5a⁴'], 'k' => 'c']
        ]
    ],
    'kuis2' => [
        'judul' => 'Kuis 2: Persamaan Linear 1 Variabel',
        'soal' => [
            ['t' => 'Jika x + 5 = 10, maka nilai x adalah...', 'o' => ['a' => '5', 'b' => '15', 'c' => '-5', 'd' => '2'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari 2x = 14 adalah...', 'o' => ['a' => '12', 'b' => '16', 'c' => '7', 'd' => '28'], 'k' => 'c'],
            ['t' => 'Jika 3x - 2 = 10, berapakah nilai x?', 'o' => ['a' => '12', 'b' => '4', 'c' => '6', 'd' => '8'], 'k' => 'b'],
            ['t' => 'Nilai x yang memenuhi x/2 = 6 adalah...', 'o' => ['a' => '3', 'b' => '8', 'c' => '12', 'd' => '4'], 'k' => 'c'],
            ['t' => 'Jika 5x + 1 = 3x + 9, maka nilai x adalah...', 'o' => ['a' => '4', 'b' => '5', 'c' => '8', 'd' => '2'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari 2(x + 3) = 14 adalah...', 'o' => ['a' => '4', 'b' => '7', 'c' => '10', 'd' => '5'], 'k' => 'a'],
            ['t' => 'Jika -3x = 15, maka x sama dengan...', 'o' => ['a' => '5', 'b' => '-5', 'c' => '12', 'd' => '18'], 'k' => 'b'],
            ['t' => 'Berapakah nilai x jika 4 - x = 10?', 'o' => ['a' => '6', 'b' => '-6', 'c' => '14', 'd' => '-14'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari (1/3)x + 2 = 5 adalah...', 'o' => ['a' => '1', 'b' => '3', 'c' => '6', 'd' => '9'], 'k' => 'd'],
            ['t' => 'Jika 7x - 4 = 3x + 16, maka nilai x adalah...', 'o' => ['a' => '5', 'b' => '4', 'c' => '6', 'd' => '20'], 'k' => 'a']
        ]
    ],
    'kuis3' => [
        'judul' => 'Kuis 3: Pertidaksamaan Linear',
        'soal' => [
            ['t' => 'Penyelesaian dari 2x > 8 adalah...', 'o' => ['a' => 'x > 4', 'b' => 'x < 4', 'c' => 'x > 6', 'd' => 'x < 6'], 'k' => 'a'],
            ['t' => 'Jika x - 3 ≤ 5, maka nilai x adalah...', 'o' => ['a' => 'x ≥ 8', 'b' => 'x ≤ 8', 'c' => 'x ≤ 2', 'd' => 'x ≥ 2'], 'k' => 'b'],
            ['t' => 'Himpunan penyelesaian dari -2x < 10 adalah...', 'o' => ['a' => 'x < -5', 'b' => 'x > -5', 'c' => 'x < 5', 'd' => 'x > 5'], 'k' => 'b'],
            ['t' => 'Jika 3x + 2 ≥ 11, maka nilai x adalah...', 'o' => ['a' => 'x ≥ 3', 'b' => 'x ≤ 3', 'c' => 'x ≥ 9', 'd' => 'x ≤ 9'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari 5x - 4 < 3x + 6 adalah...', 'o' => ['a' => 'x < 1', 'b' => 'x > 5', 'c' => 'x < 5', 'd' => 'x > 1'], 'k' => 'c'],
            ['t' => 'Jika 4(x - 1) > 12, maka nilai x adalah...', 'o' => ['a' => 'x > 4', 'b' => 'x > 2', 'c' => 'x < 4', 'd' => 'x < 2'], 'k' => 'a'],
            ['t' => 'Nilai x yang memenuhi x/3 ≥ 2 adalah...', 'o' => ['a' => 'x ≤ 6', 'b' => 'x ≥ 6', 'c' => 'x ≥ 5', 'd' => 'x ≤ 5'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari 7 - 2x ≤ 1 adalah...', 'o' => ['a' => 'x ≤ 3', 'b' => 'x ≥ 3', 'c' => 'x ≤ -3', 'd' => 'x ≥ -3'], 'k' => 'b'],
            ['t' => 'Jika x + 5 > 2x - 1, maka nilai x adalah...', 'o' => ['a' => 'x > 6', 'b' => 'x < 6', 'c' => 'x > -4', 'd' => 'x < -4'], 'k' => 'b'],
            ['t' => 'Himpunan penyelesaian dari -x/2 < 4 adalah...', 'o' => ['a' => 'x < -8', 'b' => 'x > -8', 'c' => 'x < 8', 'd' => 'x > 8'], 'k' => 'b']
        ]
    ],
    'kuis4' => [
        'judul' => 'Kuis 4: Sistem Persamaan Linear Dua Variabel (SPLDV)',
        'soal' => [
            ['t' => 'Diketahui x + y = 6 dan x - y = 2. Nilai x adalah...', 'o' => ['a' => '2', 'b' => '4', 'c' => '6', 'd' => '8'], 'k' => 'b'],
            ['t' => 'Dari persamaan di atas, nilai y adalah...', 'o' => ['a' => '2', 'b' => '4', 'c' => '6', 'd' => '8'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari 2x + y = 7 dan x + y = 4 adalah...', 'o' => ['a' => 'x=3, y=1', 'b' => 'x=1, y=3', 'c' => 'x=2, y=2', 'd' => 'x=4, y=0'], 'k' => 'a'],
            ['t' => 'Jika x = 2y dan x + y = 9, maka nilai y adalah...', 'o' => ['a' => '3', 'b' => '6', 'c' => '4.5', 'd' => '2'], 'k' => 'a'],
            ['t' => 'Jika 3x - y = 5 dan 2x + y = 10, nilai x adalah...', 'o' => ['a' => '3', 'b' => '2', 'c' => '5', 'd' => '4'], 'k' => 'a'],
            ['t' => 'Dari soal sebelumnya, nilai y adalah...', 'o' => ['a' => '2', 'b' => '4', 'c' => '5', 'd' => '6'], 'k' => 'b'],
            ['t' => 'Diketahui harga 2 buku dan 1 pensil adalah Rp 5.000. Harga 1 buku dan 1 pensil Rp 3.000. Harga 1 buku adalah...', 'o' => ['a' => 'Rp 1.000', 'b' => 'Rp 2.000', 'c' => 'Rp 3.000', 'd' => 'Rp 4.000'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari y = x + 2 dan y = 2x adalah...', 'o' => ['a' => 'x=1, y=3', 'b' => 'x=2, y=4', 'c' => 'x=3, y=5', 'd' => 'x=4, y=6'], 'k' => 'b'],
            ['t' => 'Jika 5x + 2y = 12 dan 3x - y = 5, nilai dari x + y adalah...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '5'], 'k' => 'b'],
            ['t' => 'Penyelesaian sistem persamaan x + 2y = 8 dan 2x - y = 6 adalah...', 'o' => ['a' => 'x=4, y=2', 'b' => 'x=2, y=3', 'c' => 'x=3, y=2', 'd' => 'x=5, y=4'], 'k' => 'a']
        ]
    ],
    'kuis5' => [
        'judul' => 'Kuis 5: Sistem Persamaan Linear Tiga Variabel (SPLTV)',
        'soal' => [
            ['t' => 'Diketahui x + y + z = 6, x = 1, y = 2. Maka nilai z adalah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'c'],
            ['t' => 'Jika x+y=3, y+z=5, x+z=4, berapakah nilai x+y+z?', 'o' => ['a' => '6', 'b' => '12', 'c' => '8', 'd' => '10'], 'k' => 'a'],
            ['t' => 'Dari soal sebelumnya, nilai y adalah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'b'],
            ['t' => 'Diketahui 2x + y + z = 7, x + y = 3, z = 2. Nilai x adalah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'b'],
            ['t' => 'Jika x-y=1, y-z=1, x+z=4. Maka nilai x adalah...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '1'], 'k' => 'b'],
            ['t' => 'Diketahui persamaan x+y+z=9, 2x-y+z=6, x+2y-z=2. Jika z=4, maka nilai y adalah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'c'],
            ['t' => 'Pada SPLTV, jumlah minimal persamaan yang dibutuhkan untuk mencari nilai pasti 3 variabel adalah...', 'o' => ['a' => '1 persamaan', 'b' => '2 persamaan', 'c' => '3 persamaan', 'd' => '4 persamaan'], 'k' => 'c'],
            ['t' => 'Jika 3x + 2y + z = 10 dan x + y + z = 6. Maka nilai 2x + y adalah...', 'o' => ['a' => '4', 'b' => '5', 'c' => '6', 'd' => '8'], 'k' => 'a'],
            ['t' => 'Diketahui x=z, x+y=5, y+z=5. Nilai x adalah...', 'o' => ['a' => '2.5', 'b' => '5', 'c' => '10', 'd' => '0'], 'k' => 'a'],
            ['t' => 'Jika xyz = 8, xy = 4. Maka nilai z adalah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'b']
        ]
    ],
    'kuis6' => [
        'judul' => 'Kuis 6: Pemfaktoran Bentuk Kuadrat',
        'soal' => [
            ['t' => 'Faktor dari x² - 9 adalah...', 'o' => ['a' => '(x-3)(x-3)', 'b' => '(x+3)(x+3)', 'c' => '(x-3)(x+3)', 'd' => '(x-9)(x+1)'], 'k' => 'c'],
            ['t' => 'Pemfaktoran dari x² + 5x + 6 adalah...', 'o' => ['a' => '(x+1)(x+6)', 'b' => '(x+2)(x+3)', 'c' => '(x-2)(x-3)', 'd' => '(x+5)(x+1)'], 'k' => 'b'],
            ['t' => 'Faktorkanlah x² - 4x + 4...', 'o' => ['a' => '(x-2)(x-2)', 'b' => '(x+2)(x+2)', 'c' => '(x-4)(x+1)', 'd' => '(x+4)(x-1)'], 'k' => 'a'],
            ['t' => 'Pemfaktoran dari 2x² + 4x adalah...', 'o' => ['a' => '2x(x+2)', 'b' => 'x(2x+4)', 'c' => '2(x²+2)', 'd' => '4x(x+1)'], 'k' => 'a'],
            ['t' => 'Faktor dari x² - 7x + 10 adalah...', 'o' => ['a' => '(x-2)(x-5)', 'b' => '(x+2)(x+5)', 'c' => '(x-1)(x-10)', 'd' => '(x+1)(x+10)'], 'k' => 'a'],
            ['t' => 'Bentuk pemfaktoran dari x² - 16 adalah...', 'o' => ['a' => '(x-4)(x-4)', 'b' => '(x-8)(x+2)', 'c' => '(x-4)(x+4)', 'd' => '(x+4)(x+4)'], 'k' => 'c'],
            ['t' => 'Faktorkan x² + 8x + 16', 'o' => ['a' => '(x+2)(x+8)', 'b' => '(x+4)(x+4)', 'c' => '(x-4)(x-4)', 'd' => '(x+1)(x+16)'], 'k' => 'b'],
            ['t' => 'Pemfaktoran dari 3x² - 12 adalah...', 'o' => ['a' => '3(x-2)(x+2)', 'b' => '3(x-4)(x+1)', 'c' => '3(x²-4x)', 'd' => '(3x-6)(x+2)'], 'k' => 'a'],
            ['t' => 'Faktor dari x² - x - 6 adalah...', 'o' => ['a' => '(x-3)(x+2)', 'b' => '(x+3)(x-2)', 'c' => '(x-6)(x+1)', 'd' => '(x+6)(x-1)'], 'k' => 'a'],
            ['t' => 'Jika pemfaktoran dari x² + px + 12 adalah (x+3)(x+4), nilai p adalah...', 'o' => ['a' => '12', 'b' => '7', 'c' => '1', 'd' => '34'], 'k' => 'b']
        ]
    ],
    'kuis7' => [
        'judul' => 'Kuis 7: Persamaan Kuadrat',
        'soal' => [
            ['t' => 'Akar-akar dari persamaan x² - 25 = 0 adalah...', 'o' => ['a' => '5 saja', 'b' => '-5 saja', 'c' => '5 dan -5', 'd' => '25 dan -25'], 'k' => 'c'],
            ['t' => 'Akar-akar dari persamaan x² - 5x + 6 = 0 adalah...', 'o' => ['a' => '2 dan 3', 'b' => '-2 dan -3', 'c' => '1 dan 6', 'd' => '-1 dan -6'], 'k' => 'a'],
            ['t' => 'Rumus diskriminan (D) pada persamaan kuadrat ax² + bx + c = 0 adalah...', 'o' => ['a' => 'b² - 4ac', 'b' => 'b² + 4ac', 'c' => 'a² - 4bc', 'd' => '4ac - b²'], 'k' => 'a'],
            ['t' => 'Berapakah nilai Diskriminan dari x² - 4x + 4 = 0?', 'o' => ['a' => '16', 'b' => '8', 'c' => '4', 'd' => '0'], 'k' => 'd'],
            ['t' => 'Jika D = 0, maka persamaan kuadrat memiliki...', 'o' => ['a' => 'Dua akar real berbeda', 'b' => 'Satu akar real kembar', 'c' => 'Tidak memiliki akar real', 'd' => 'Akar imajiner'], 'k' => 'b'],
            ['t' => 'Akar-akar dari x² - x - 12 = 0 adalah...', 'o' => ['a' => '4 dan -3', 'b' => '-4 dan 3', 'c' => '6 dan -2', 'd' => '-6 dan 2'], 'k' => 'a'],
            ['t' => 'Jika persamaan x² + 6x + c = 0 memiliki akar kembar, nilai c adalah...', 'o' => ['a' => '6', 'b' => '9', 'c' => '12', 'd' => '36'], 'k' => 'b'],
            ['t' => 'Jumlah akar-akar (x1 + x2) dari persamaan x² - 7x + 10 = 0 adalah...', 'o' => ['a' => '10', 'b' => '-7', 'c' => '7', 'd' => '-10'], 'k' => 'c'],
            ['t' => 'Hasil kali akar-akar (x1 * x2) dari persamaan x² + 5x + 6 = 0 adalah...', 'o' => ['a' => '5', 'b' => '-5', 'c' => '6', 'd' => '-6'], 'k' => 'c'],
            ['t' => 'Persamaan kuadrat yang akar-akarnya 2 dan 5 adalah...', 'o' => ['a' => 'x² - 7x + 10 = 0', 'b' => 'x² + 7x + 10 = 0', 'c' => 'x² - 3x + 10 = 0', 'd' => 'x² + 3x - 10 = 0'], 'k' => 'a']
        ]
    ],
    'kuis8' => [
        'judul' => 'Kuis 8: Fungsi Kuadrat & Grafik',
        'soal' => [
            ['t' => 'Grafik dari fungsi kuadrat berbentuk...', 'o' => ['a' => 'Garis lurus', 'b' => 'Parabola', 'c' => 'Lingkaran', 'd' => 'Gelombang'], 'k' => 'b'],
            ['t' => 'Jika a > 0 pada fungsi f(x) = ax² + bx + c, grafik parabola akan...', 'o' => ['a' => 'Terbuka ke atas', 'b' => 'Terbuka ke bawah', 'c' => 'Mendatar', 'd' => 'Miring ke kanan'], 'k' => 'a'],
            ['t' => 'Titik puncak dari fungsi y = x² adalah...', 'o' => ['a' => '(1, 1)', 'b' => '(0, 0)', 'c' => '(-1, 1)', 'd' => '(0, 1)'], 'k' => 'b'],
            ['t' => 'Sumbu simetri dari fungsi y = x² - 4x + 3 adalah... (Petunjuk: x = -b/2a)', 'o' => ['a' => 'x = 2', 'b' => 'x = -2', 'c' => 'x = 4', 'd' => 'x = -4'], 'k' => 'a'],
            ['t' => 'Titik potong grafik y = x² - 4 dengan sumbu y adalah...', 'o' => ['a' => '(0, 4)', 'b' => '(0, -4)', 'c' => '(4, 0)', 'd' => '(-4, 0)'], 'k' => 'b'],
            ['t' => 'Titik potong grafik y = x² - 9 dengan sumbu x adalah...', 'o' => ['a' => '(3, 0) dan (-3, 0)', 'b' => '(9, 0) dan (-9, 0)', 'c' => '(0, 3) dan (0, -3)', 'd' => '(0, 9) dan (0, -9)'], 'k' => 'a'],
            ['t' => 'Jika grafik memotong sumbu x di dua titik berbeda, maka nilai D adalah...', 'o' => ['a' => 'D > 0', 'b' => 'D = 0', 'c' => 'D < 0', 'd' => 'D = 1'], 'k' => 'a'],
            ['t' => 'Nilai minimum dari fungsi y = x² - 2x + 1 adalah...', 'o' => ['a' => '0', 'b' => '1', 'c' => '-1', 'd' => '2'], 'k' => 'a'],
            ['t' => 'Jika a < 0 dan D < 0, maka grafik parabola berada...', 'o' => ['a' => 'Seluruhnya di atas sumbu x', 'b' => 'Seluruhnya di bawah sumbu x', 'c' => 'Memotong sumbu x', 'd' => 'Menyinggung sumbu x'], 'k' => 'b'],
            ['t' => 'Fungsi y = (x - 2)² + 3 memiliki titik puncak di...', 'o' => ['a' => '(-2, 3)', 'b' => '(2, -3)', 'c' => '(2, 3)', 'd' => '(-2, -3)'], 'k' => 'c']
        ]
    ],
    'kuis9' => [
        'judul' => 'Kuis 9: Eksponen Dasar',
        'soal' => [
            ['t' => 'Hasil dari 2³ adalah...', 'o' => ['a' => '6', 'b' => '8', 'c' => '9', 'd' => '16'], 'k' => 'b'],
            ['t' => 'Sifat perkalian eksponen: a^m × a^n = ...', 'o' => ['a' => 'a^(m×n)', 'b' => 'a^(m+n)', 'c' => 'a^(m-n)', 'd' => '(a×a)^(m+n)'], 'k' => 'b'],
            ['t' => 'Hasil dari 3² × 3³ adalah...', 'o' => ['a' => '3^5', 'b' => '3^6', 'c' => '9^5', 'd' => '9^6'], 'k' => 'a'],
            ['t' => 'Bentuk sederhana dari 5^7 / 5^4 adalah...', 'o' => ['a' => '5^11', 'b' => '5^3', 'c' => '1^3', 'd' => '25^3'], 'k' => 'b'],
            ['t' => 'Hasil dari (2³)² adalah...', 'o' => ['a' => '2^5', 'b' => '2^6', 'c' => '2^9', 'd' => '4^5'], 'k' => 'b'],
            ['t' => 'Setiap bilangan nyata bukan nol yang dipangkatkan nol (a^0) hasilnya adalah...', 'o' => ['a' => '0', 'b' => 'a', 'c' => '1', 'd' => 'Tak terdefinisi'], 'k' => 'c'],
            ['t' => 'Bentuk bilangan positif dari 3^(-2) adalah...', 'o' => ['a' => '-9', 'b' => '1/6', 'c' => '1/9', 'd' => '-6'], 'k' => 'c'],
            ['t' => 'Hasil dari 2^5 / 2^5 adalah...', 'o' => ['a' => '2', 'b' => '1', 'c' => '0', 'd' => '2^10'], 'k' => 'b'],
            ['t' => 'Jika 2^x = 16, maka nilai x adalah...', 'o' => ['a' => '3', 'b' => '4', 'c' => '5', 'd' => '8'], 'k' => 'b'],
            ['t' => 'Jika 3^(x+1) = 27, maka nilai x adalah...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '1'], 'k' => 'a']
        ]
    ],
    'kuis10' => [
        'judul' => 'Kuis 10: Ujian Campuran Aljabar',
        'soal' => [
            ['t' => 'Sederhanakan bentuk 3x + 4y - x - y', 'o' => ['a' => '2x + 3y', 'b' => '4x + 5y', 'c' => '2x - 3y', 'd' => '4x - 5y'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari 3x - 5 = x + 7 adalah...', 'o' => ['a' => '1', 'b' => '3', 'c' => '6', 'd' => '12'], 'k' => 'c'],
            ['t' => 'Akar-akar persamaan x² - 9x + 20 = 0 adalah...', 'o' => ['a' => '4 dan 5', 'b' => '-4 dan -5', 'c' => '2 dan 10', 'd' => '-2 dan -10'], 'k' => 'a'],
            ['t' => 'Jika x + y = 10 dan x - y = 4. Nilai x * y adalah...', 'o' => ['a' => '24', 'b' => '21', 'c' => '16', 'd' => '20'], 'k' => 'b'],
            ['t' => 'Titik puncak parabola y = x² - 2x + 5 adalah...', 'o' => ['a' => '(1, 4)', 'b' => '(1, 5)', 'c' => '(-1, 4)', 'd' => '(-1, 5)'], 'k' => 'a'],
            ['t' => 'Berapakah nilai x dari persamaan eksponen 5^(2x) = 125?', 'o' => ['a' => '1', 'b' => '1.5', 'c' => '2', 'd' => '3'], 'k' => 'b'],
            ['t' => 'Faktorkan 2x² - 8', 'o' => ['a' => '2(x-4)', 'b' => '2(x-2)(x+2)', 'c' => '(2x-4)(x+2)', 'd' => '2(x²-8)'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari pertidaksamaan 2x + 3 < 11 adalah...', 'o' => ['a' => 'x < 4', 'b' => 'x > 4', 'c' => 'x < 7', 'd' => 'x > 7'], 'k' => 'a'],
            ['t' => 'Nilai Diskriminan dari x² + 2x + 5 = 0 adalah...', 'o' => ['a' => '-16', 'b' => '16', 'c' => '24', 'd' => '-24'], 'k' => 'a'],
            ['t' => 'Berapakah 10^0 + 2^3 - 3^2 ?', 'o' => ['a' => '0', 'b' => '1', 'c' => '-1', 'd' => '8'], 'k' => 'a']
        ]
    ],
    'kuis11' => [
        'judul' => 'Kuis 11: Akar dan Radikalisasi',
        'soal' => [
            ['t' => 'Hasil dari √16 adalah...', 'o' => ['a' => '2', 'b' => '4', 'c' => '8', 'd' => '16'], 'k' => 'b'],
            ['t' => 'Bentuk sederhana dari √50 adalah...', 'o' => ['a' => '5√2', 'b' => '10√5', 'c' => '2√5', 'd' => '5√5'], 'k' => 'a'],
            ['t' => 'Hasil dari √9 + √16 adalah...', 'o' => ['a' => '5', 'b' => '7', 'c' => '25', 'd' => '12'], 'k' => 'b'],
            ['t' => 'Sederhanakan √(x²y⁴)', 'o' => ['a' => 'xy²', 'b' => 'x²y²', 'c' => 'xy⁴', 'd' => 'x²y'], 'k' => 'a'],
            ['t' => 'Hasil dari 3√2 + 2√2 adalah...', 'o' => ['a' => '5√2', 'b' => '6√2', 'c' => '5', 'd' => '6'], 'k' => 'a'],
            ['t' => 'Hasil dari √8 × √2 adalah...', 'o' => ['a' => '4', 'b' => '16', 'c' => '2√2', 'd' => '8'], 'k' => 'a'],
            ['t' => 'Rasionalkan penyebut 2/√2', 'o' => ['a' => '√2', 'b' => '2√2', 'c' => '1', 'd' => '2'], 'k' => 'a'],
            ['t' => 'Jika √x = 5, maka nilai x adalah...', 'o' => ['a' => '5', 'b' => '10', 'c' => '15', 'd' => '25'], 'k' => 'd'],
            ['t' => 'Hasil dari (√5)² adalah...', 'o' => ['a' => '5', 'b' => '√5', 'c' => '25', 'd' => '2.5'], 'k' => 'a'],
            ['t' => 'Bentuk sederhana dari ∛27 adalah...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '9'], 'k' => 'b']
        ]
    ],
    'kuis12' => [
        'judul' => 'Kuis 12: Pertidaksamaan Kuadrat',
        'soal' => [
            ['t' => 'Penyelesaian dari x² - 4 > 0 adalah...', 'o' => ['a' => '-2 < x < 2', 'b' => 'x < -2 atau x > 2', 'c' => 'x > 2', 'd' => 'x < -2'], 'k' => 'b'],
            ['t' => 'Himpunan penyelesaian dari x² - 5x + 6 ≤ 0 adalah...', 'o' => ['a' => 'x ≤ 2 atau x ≥ 3', 'b' => '2 ≤ x ≤ 3', 'c' => 'x ≤ -3 atau x ≥ -2', 'd' => '-3 ≤ x ≤ -2'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari x² + x - 6 < 0 adalah...', 'o' => ['a' => 'x < -3 atau x > 2', 'b' => '-3 < x < 2', 'c' => 'x ≤ -3 atau x ≥ 2', 'd' => '-2 < x < 3'], 'k' => 'b'],
            ['t' => 'Jika x² - 9 ≥ 0, maka penyelesaiannya adalah...', 'o' => ['a' => '-3 ≤ x ≤ 3', 'b' => 'x ≤ -3 atau x ≥ 3', 'c' => '-9 < x < 9', 'd' => 'x > 3'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari 2x² - 8x + 6 < 0 adalah...', 'o' => ['a' => 'x < 1 atau x > 3', 'b' => '1 < x < 3', 'c' => 'x < 3', 'd' => 'x > 1'], 'k' => 'b'],
            ['t' => 'Himpunan penyelesaian dari -x² + 4 > 0 adalah...', 'o' => ['a' => 'x < 2', 'b' => '-2 < x < 2', 'c' => 'x > 2 atau x < -2', 'd' => 'x = 2'], 'k' => 'b'],
            ['t' => 'Jika x² - 4x + 4 ≥ 0, maka...', 'o' => ['a' => 'x ≤ 2', 'b' => 'x ≥ 2', 'c' => 'semua x ∈ ℝ', 'd' => 'x = 2'], 'k' => 'c'],
            ['t' => 'Penyelesaian dari 3x² - 12 ≤ 0 adalah...', 'o' => ['a' => 'x ≤ 2 atau x ≥ 2', 'b' => '-2 ≤ x ≤ 2', 'c' => 'x ≤ -2', 'd' => 'x ≥ 2'], 'k' => 'b'],
            ['t' => 'Jika (x - 1)(x - 5) < 0, maka...', 'o' => ['a' => '1 < x < 5', 'b' => 'x < 1 atau x > 5', 'c' => 'x > 5', 'd' => 'x < 1'], 'k' => 'a'],
            ['t' => 'Himpunan penyelesaian dari x² - 3x < 0 adalah...', 'o' => ['a' => '0 < x < 3', 'b' => 'x < 0 atau x > 3', 'c' => 'x > 3', 'd' => 'x < 3'], 'k' => 'a']
        ]
    ],
    'kuis13' => [
        'judul' => 'Kuis 13: Persamaan dan Pertidaksamaan Nilai Mutlak',
        'soal' => [
            ['t' => '|x| = 5, maka nilai x adalah...', 'o' => ['a' => '5 saja', 'b' => '-5 saja', 'c' => '5 atau -5', 'd' => '25'], 'k' => 'c'],
            ['t' => 'Penyelesaian dari |x - 3| = 2 adalah...', 'o' => ['a' => 'x = 1 atau x = 5', 'b' => 'x = 3', 'c' => 'x = -1', 'd' => 'x = 2'], 'k' => 'a'],
            ['t' => '|2x + 1| = 5, maka nilai x adalah...', 'o' => ['a' => 'x = 2 atau x = -3', 'b' => 'x = 2 saja', 'c' => 'x = -3 saja', 'd' => 'x = 5'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari |x| < 3 adalah...', 'o' => ['a' => 'x < 3', 'b' => '-3 < x < 3', 'c' => 'x > -3', 'd' => 'x ≤ 3'], 'k' => 'b'],
            ['t' => '|x - 2| ≤ 4, maka penyelesaiannya adalah...', 'o' => ['a' => '-2 ≤ x ≤ 6', 'b' => 'x ≤ 6', 'c' => '-4 ≤ x ≤ 4', 'd' => 'x ≥ -2'], 'k' => 'a'],
            ['t' => 'Penyelesaian dari |x| ≥ 2 adalah...', 'o' => ['a' => 'x ≥ 2', 'b' => '-2 ≤ x ≤ 2', 'c' => 'x ≤ -2 atau x ≥ 2', 'd' => '-2 < x < 2'], 'k' => 'c'],
            ['t' => '|-3| + |4| = ...', 'o' => ['a' => '1', 'b' => '7', 'c' => '-1', 'd' => '-7'], 'k' => 'b'],
            ['t' => 'Jika |x + 1| = 0, maka x = ...', 'o' => ['a' => '1', 'b' => '-1', 'c' => '0', 'd' => 'Tidak ada'], 'k' => 'b'],
            ['t' => 'Penyelesaian dari |2x - 3| < 5 adalah...', 'o' => ['a' => '-1 < x < 4', 'b' => 'x < 4', 'c' => 'x > -1', 'd' => '-5 < x < 5'], 'k' => 'a'],
            ['t' => '|a - b| = 10 dan a = 15, maka b = ...', 'o' => ['a' => '5 atau 25', 'b' => '5 saja', 'c' => '25 saja', 'd' => '-10'], 'k' => 'a']
        ]
    ],
    'kuis14' => [
        'judul' => 'Kuis 14: Barisan dan Deret Aritmetika',
        'soal' => [
            ['t' => 'Pada barisan aritmetika 2, 5, 8, 11, ... beda (b) sama dengan...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '5'], 'k' => 'b'],
            ['t' => 'Suku ke-10 dari barisan 1, 4, 7, 10, ... adalah...', 'o' => ['a' => '27', 'b' => '28', 'c' => '29', 'd' => '30'], 'k' => 'b'],
            ['t' => 'Rumus suku ke-n barisan aritmetika adalah Un = a + (n-1)b. Jika a = 3 dan b = 2, maka U₅ = ...', 'o' => ['a' => '10', 'b' => '11', 'c' => '12', 'd' => '13'], 'k' => 'b'],
            ['t' => 'Diketahui U₃ = 11 dan U₅ = 19. Beda barisan aritmetika tersebut adalah...', 'o' => ['a' => '4', 'b' => '5', 'c' => '6', 'd' => '8'], 'k' => 'a'],
            ['t' => 'Jumlah 5 suku pertama dari barisan 2, 4, 6, 8, ... adalah...', 'o' => ['a' => '20', 'b' => '25', 'c' => '30', 'd' => '35'], 'k' => 'c'],
            ['t' => 'Rumus jumlah n suku pertama deret aritmetika adalah Sn = n/2(2a + (n-1)b). S₃ dari 1, 3, 5, ... adalah...', 'o' => ['a' => '8', 'b' => '9', 'c' => '10', 'd' => '12'], 'k' => 'b'],
            ['t' => 'Barisan aritmetika memiliki suku pertama 5 dan suku ketiga 13. Suku kedua adalah...', 'o' => ['a' => '8', 'b' => '9', 'c' => '10', 'd' => '11'], 'k' => 'b'],
            ['t' => 'Jika suku ke-5 = 18 dan beda = 2, maka suku pertama adalah...', 'o' => ['a' => '8', 'b' => '10', 'c' => '12', 'd' => '14'], 'k' => 'b'],
            ['t' => 'Jumlah semua bilangan ganjil dari 1 hingga 99 adalah...', 'o' => ['a' => '2450', 'b' => '2500', 'c' => '2550', 'd' => '2600'], 'k' => 'b'],
            ['t' => 'Banyak suku dari barisan 3, 8, 13, ..., 98 adalah...', 'o' => ['a' => '18', 'b' => '19', 'c' => '20', 'd' => '21'], 'k' => 'c']
        ]
    ],
    'kuis15' => [
        'judul' => 'Kuis 15: Barisan dan Deret Geometri',
        'soal' => [
            ['t' => 'Pada barisan geometri 2, 4, 8, 16, ... rasio (r) sama dengan...', 'o' => ['a' => '1', 'b' => '2', 'c' => '4', 'd' => '8'], 'k' => 'b'],
            ['t' => 'Suku ke-5 dari barisan geometri 1, 3, 9, 27, ... adalah...', 'o' => ['a' => '81', 'b' => '243', 'c' => '327', 'd' => '400'], 'k' => 'a'],
            ['t' => 'Rumus suku ke-n barisan geometri Un = a × r^(n-1). Jika a = 2 dan r = 3, maka U₄ = ...', 'o' => ['a' => '48', 'b' => '54', 'c' => '64', 'd' => '72'], 'k' => 'b'],
            ['t' => 'Barisan geometri memiliki U₂ = 6 dan U₄ = 54. Rasio barisan tersebut adalah...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '5'], 'k' => 'b'],
            ['t' => 'Jumlah 4 suku pertama dari barisan 1, 2, 4, 8, ... adalah...', 'o' => ['a' => '15', 'b' => '16', 'c' => '18', 'd' => '20'], 'k' => 'a'],
            ['t' => 'Rumus jumlah n suku pertama deret geometri Sn = a(r^n - 1)/(r - 1). S₃ dari 2, 6, 18, ... adalah...', 'o' => ['a' => '26', 'b' => '27', 'c' => '28', 'd' => '29'], 'k' => 'a'],
            ['t' => 'Jika suku pertama 3 dan rasio 2, maka suku ke-6 adalah...', 'o' => ['a' => '96', 'b' => '100', 'c' => '102', 'd' => '108'], 'k' => 'a'],
            ['t' => 'Barisan geometri 5, 10, 20, ... suku ke-7 adalah...', 'o' => ['a' => '160', 'b' => '320', 'c' => '640', 'd' => '800'], 'k' => 'b'],
            ['t' => 'Deret geometri tak hingga 1 + 1/2 + 1/4 + ... memiliki jumlah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '∞'], 'k' => 'b'],
            ['t' => 'Jika U₂ = 4 dan rasio = 2, maka U₁ = ...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'b']
        ]
    ],
    'kuis16' => [
        'judul' => 'Kuis 16: Aplikasi SPLDV dalam Soal Cerita',
        'soal' => [
            ['t' => 'Harga 2 kg apel dan 3 kg jeruk Rp 61.000. Harga 1 kg apel dan 2 kg jeruk Rp 37.000. Harga 1 kg apel adalah...', 'o' => ['a' => 'Rp 10.000', 'b' => 'Rp 11.000', 'c' => 'Rp 12.000', 'd' => 'Rp 13.000'], 'k' => 'b'],
            ['t' => 'Umur ayah 2 kali umur anak. Selisih umur mereka 20 tahun. Umur anak adalah...', 'o' => ['a' => '10 tahun', 'b' => '15 tahun', 'c' => '20 tahun', 'd' => '25 tahun'], 'k' => 'a'],
            ['t' => 'Keliling persegi panjang 28 cm. Panjangnya 2 cm lebih dari lebar. Panjangnya adalah...', 'o' => ['a' => '6 cm', 'b' => '7 cm', 'c' => '8 cm', 'd' => '9 cm'], 'k' => 'c'],
            ['t' => 'Jumlah dua bilangan 50 dan selisihnya 10. Bilangan terbesar adalah...', 'o' => ['a' => '25', 'b' => '30', 'c' => '35', 'd' => '40'], 'k' => 'b'],
            ['t' => 'Dalam sebuah tes, benar memberikan poin +5 dan salah -2. Ani menjawab 20 soal dengan nilai 54. Jawaban benarnya...', 'o' => ['a' => '12', 'b' => '14', 'c' => '16', 'd' => '18'], 'k' => 'b'],
            ['t' => 'Harga tiket A Rp 20.000 dan tiket B Rp 15.000. Terjual 100 tiket dengan hasil Rp 1.700.000. Tiket A yang terjual adalah...', 'o' => ['a' => '40', 'b' => '45', 'c' => '50', 'd' => '60'], 'k' => 'a'],
            ['t' => 'Jumlah uang Rp 100.000 adalah 50 lembar berupa Rp 1.000 dan Rp 2.000. Lembar Rp 1.000 adalah...', 'o' => ['a' => '30 lembar', 'b' => '35 lembar', 'c' => '40 lembar', 'd' => '45 lembar'], 'k' => 'a'],
            ['t' => 'Kecepatan A = 2 × kecepatan B. Dari kota yang sama ke kota lain 120 km dengan waktu yang sama. Kecepatan B = ...', 'o' => ['a' => '30 km/jam', 'b' => '40 km/jam', 'c' => '50 km/jam', 'd' => '60 km/jam'], 'k' => 'b'],
            ['t' => 'Persediaan beras dua kali persediaan gula. Selisihnya 20 kg. Persediaan beras adalah...', 'o' => ['a' => '30 kg', 'b' => '35 kg', 'c' => '40 kg', 'd' => '45 kg'], 'k' => 'c'],
            ['t' => 'Kandang ayam dan bebek jumlahnya 50 ekor. Ayam 10 ekor lebih banyak dari bebek. Ayam ada...', 'o' => ['a' => '25 ekor', 'b' => '28 ekor', 'c' => '30 ekor', 'd' => '32 ekor'], 'k' => 'c']
        ]
    ],
    'kuis17' => [
        'judul' => 'Kuis 17: Polinomial & Pembagian Bersusun',
        'soal' => [
            ['t' => 'Hasil pembagian (x² + 5x + 6) ÷ (x + 2) adalah...', 'o' => ['a' => 'x + 3', 'b' => 'x + 2', 'c' => 'x + 4', 'd' => 'x + 1'], 'k' => 'a'],
            ['t' => 'Hasil bagi dan sisa dari (2x³ + 3x² - 5x - 6) ÷ (x - 1) adalah...', 'o' => ['a' => '2x² + 5x, sisa 1', 'b' => '2x² + 5x, sisa 0', 'c' => '2x² + 5x, sisa -1', 'd' => '2x² + 5x, sisa 6'], 'k' => 'b'],
            ['t' => 'Menggunakan teorema sisa, sisa pembagian p(x) = x³ - 2x + 1 oleh (x - 2) adalah...', 'o' => ['a' => '5', 'b' => '6', 'c' => '7', 'd' => '8'], 'k' => 'a'],
            ['t' => 'Derajat hasil pembagian (x⁴ + 2x³ - x - 1) ÷ (x² + 1) adalah...', 'o' => ['a' => '0', 'b' => '1', 'c' => '2', 'd' => '3'], 'k' => 'c'],
            ['t' => 'Jika p(x) = x² - 3x + 2, maka p(1) = ...', 'o' => ['a' => '0', 'b' => '1', 'c' => '2', 'd' => '3'], 'k' => 'a'],
            ['t' => 'Faktor dari polinomial x³ - 1 adalah...', 'o' => ['a' => '(x - 1)(x² + x + 1)', 'b' => '(x - 1)(x² - x + 1)', 'c' => '(x + 1)(x² - x - 1)', 'd' => '(x - 1)(x + 1)(x - 1)'], 'k' => 'a'],
            ['t' => 'Sisa pembagian 2x⁴ - 3x² + 5 oleh (x + 1) adalah...', 'o' => ['a' => '0', 'b' => '2', 'c' => '4', 'd' => '6'], 'k' => 'c'],
            ['t' => 'Hasil bagi dari (x³ - 8) ÷ (x - 2) adalah...', 'o' => ['a' => 'x² + 2x + 4', 'b' => 'x² - 2x + 4', 'c' => 'x² + 4x + 2', 'd' => 'x² + 2x - 4'], 'k' => 'a'],
            ['t' => 'Jika x - 2 adalah faktor dari x² + ax - 6, maka a = ...', 'o' => ['a' => '1', 'b' => '-1', 'c' => '2', 'd' => '-2'], 'k' => 'a'],
            ['t' => 'Hasil dari (x + 1)³ adalah...', 'o' => ['a' => 'x³ + x² + x + 1', 'b' => 'x³ + 3x² + 3x + 1', 'c' => 'x³ + 2x² + 2x + 1', 'd' => 'x³ + 3x + 1'], 'k' => 'b']
        ]
    ],
    'kuis18' => [
        'judul' => 'Kuis 18: Pola, Barisan, dan Deret Campuran',
        'soal' => [
            ['t' => 'Barisan 1, 1, 2, 3, 5, 8, ... adalah barisan...', 'o' => ['a' => 'Aritmetika', 'b' => 'Fibonacci', 'c' => 'Geometri', 'd' => 'Kuadrat'], 'k' => 'b'],
            ['t' => 'Pola 1, 4, 9, 16, 25, ... merupakan pola...', 'o' => ['a' => 'Bilangan segitiga', 'b' => 'Bilangan persegi', 'c' => 'Bilangan prima', 'd' => 'Bilangan genap'], 'k' => 'b'],
            ['t' => 'Bilangan ke-5 dari pola 1, 3, 6, 10, ... adalah...', 'o' => ['a' => '14', 'b' => '15', 'c' => '16', 'd' => '17'], 'k' => 'b'],
            ['t' => 'Suku ke-6 dari pola 2, 5, 10, 17, 26, ... adalah...', 'o' => ['a' => '35', 'b' => '36', 'c' => '37', 'd' => '38'], 'k' => 'c'],
            ['t' => 'Jumlah pertama 10 bilangan asli adalah...', 'o' => ['a' => '50', 'b' => '52', 'c' => '54', 'd' => '55'], 'k' => 'd'],
            ['t' => 'Pola L = 1 + 2 + 3 + ... + 10 = ...', 'o' => ['a' => '50', 'b' => '55', 'c' => '60', 'd' => '65'], 'k' => 'b'],
            ['t' => 'Bilangan segitiga ke-7 adalah...', 'o' => ['a' => '28', 'b' => '30', 'c' => '32', 'd' => '35'], 'k' => 'a'],
            ['t' => 'Suku ke-5 dari 1, 2, 4, 7, 11, ... adalah...', 'o' => ['a' => '15', 'b' => '16', 'c' => '17', 'd' => '18'], 'k' => 'b'],
            ['t' => 'Jumlah 1 + 2 + 3 + ... + 50 = ...', 'o' => ['a' => '1250', 'b' => '1275', 'c' => '1325', 'd' => '1500'], 'k' => 'b'],
            ['t' => 'Pola persegi panjang: 2, 6, 12, 20, ... suku ke-5 adalah...', 'o' => ['a' => '28', 'b' => '30', 'c' => '32', 'd' => '35'], 'k' => 'b']
        ]
    ],
    'kuis19' => [
        'judul' => 'Kuis 19: Aplikasi Aljabar dalam Soal Cerita Kompleks',
        'soal' => [
            ['t' => 'Luas persegi panjang (x + 2)(x + 3) = x² + 5x + 6. Panjang dan lebar adalah...', 'o' => ['a' => 'x + 2 dan x + 3', 'b' => 'x + 1 dan x + 6', 'c' => 'x + 4 dan x + 1', 'd' => '6 dan x + 5'], 'k' => 'a'],
            ['t' => 'Suatu bilangan bulat jika ditambah 5 adalah 3 kali lipat bilangan tersebut dikurangi 3. Bilangan itu adalah...', 'o' => ['a' => '2', 'b' => '3', 'c' => '4', 'd' => '5'], 'k' => 'c'],
            ['t' => 'Panjang sisi segitiga siku-siku adalah x, x+1, x+2. Nilai x adalah...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'c'],
            ['t' => 'Untuk mengisi bak mandi, pompa A butuh 6 jam, pompa B butuh 8 jam. Bersama-sama butuh...', 'o' => ['a' => '3 jam 24 menit', 'b' => '3 jam 25 menit', 'c' => '3 jam 26 menit', 'd' => '3 jam 27 menit'], 'k' => 'a'],
            ['t' => 'Nilai suatu barang berkurang 10% setiap tahun. Jika harga awal Rp 1.000.000, harga setelah 2 tahun adalah...', 'o' => ['a' => 'Rp 810.000', 'b' => 'Rp 800.000', 'c' => 'Rp 900.000', 'd' => 'Rp 799.000'], 'k' => 'a'],
            ['t' => 'Perbandingan umur A:B:C = 2:3:4. Jika selisih A dan C adalah 10 tahun, umur B adalah...', 'o' => ['a' => '15 tahun', 'b' => '18 tahun', 'c' => '20 tahun', 'd' => '22 tahun'], 'k' => 'a'],
            ['t' => 'Tabungan dengan bunga tunggal 5% per tahun. Awal Rp 10.000.000. Setelah 3 tahun...', 'o' => ['a' => 'Rp 11.000.000', 'b' => 'Rp 11.500.000', 'c' => 'Rp 12.000.000', 'd' => 'Rp 12.500.000'], 'k' => 'b'],
            ['t' => 'Dalam memproduksi barang, biaya tetap Rp 500.000 dan variabel Rp 50.000/unit. Harga jual Rp 100.000/unit. BEP adalah...', 'o' => ['a' => '10 unit', 'b' => '12 unit', 'c' => '15 unit', 'd' => '20 unit'], 'k' => 'a'],
            ['t' => 'Larutan 20% dicampur larutan 40% sebanyak 100ml. Hasilnya 25%. Volume larutan 20% adalah...', 'o' => ['a' => '30 ml', 'b' => '35 ml', 'c' => '40 ml', 'd' => '50 ml'], 'k' => 'c'],
            ['t' => 'Jarak A-B 240 km. Kecepatan dari A ke B 60 km/jam. Dari B ke A 40 km/jam. Waktu total perjalanan adalah...', 'o' => ['a' => '6 jam', 'b' => '7 jam', 'c' => '8 jam', 'd' => '9 jam'], 'k' => 'b']
        ]
    ],
    'kuis20' => [
        'judul' => 'Kuis 20: Ujian Komprehensif Akhir Fase E',
        'soal' => [
            ['t' => 'Sederhanakan: (2x + 3)² - (x - 1)²', 'o' => ['a' => '3x² + 14x + 8', 'b' => '3x² + 14x + 9', 'c' => '3x² + 14x + 10', 'd' => '3x² + 14x + 12'], 'k' => 'a'],
            ['t' => 'Jika x + 1/x = 5, maka x² + 1/x² = ...', 'o' => ['a' => '23', 'b' => '24', 'c' => '25', 'd' => '26'], 'k' => 'a'],
            ['t' => 'Akar-akar persamaan x² + px + q = 0 adalah -3 dan 4. Nilai p + q adalah...', 'o' => ['a' => '-5', 'b' => '-1', 'c' => '1', 'd' => '5'], 'k' => 'b'],
            ['t' => 'Penyelesaian sistem x + y + z = 6, 2x - y + z = 3, x + 2y - z = 2 adalah...', 'o' => ['a' => 'x=1, y=2, z=3', 'b' => 'x=2, y=1, z=3', 'c' => 'x=3, y=1, z=2', 'd' => 'x=1, y=3, z=2'], 'k' => 'a'],
            ['t' => 'Jumlah deret tak hingga 1 + 1/3 + 1/9 + ... adalah...', 'o' => ['a' => '1.5', 'b' => '1.75', 'c' => '2', 'd' => '2.5'], 'k' => 'a'],
            ['t' => 'Pertidaksamaan (x-1)(x-2)(x-3) > 0 dipenuhi ketika...', 'o' => ['a' => '1 < x < 2 atau x > 3', 'b' => 'x < 1 atau 2 < x < 3', 'c' => 'x > 3', 'd' => 'x < 1 atau x > 3'], 'k' => 'a'],
            ['t' => 'Fungsi f(x) = x² - 4x + 5 memiliki nilai minimum...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4'], 'k' => 'a'],
            ['t' => 'Hasil dari 2^√3 × 2^√3 adalah...', 'o' => ['a' => '2^(2√3)', 'b' => '2^(√3)', 'c' => '4', 'd' => '8'], 'k' => 'd'],
            ['t' => 'Nilai x dari |2x - 5| = 3 adalah...', 'o' => ['a' => 'x = 1 atau x = 4', 'b' => 'x = 1 atau x = -4', 'c' => 'x = -1 atau x = 4', 'd' => 'x = 2 atau x = 3'], 'k' => 'a'],
            ['t' => 'Jika logaritma: log 100 = ...', 'o' => ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '10'], 'k' => 'b']
        ]
    ]
];