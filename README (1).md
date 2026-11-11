# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

## Laporan Praktikum Pemrograman Web

| Komponen | Keterangan |
|---|---|
| Mata Kuliah | Pemrograman Web |
| Nomor Modul | 7 |
| Topik | Pemrograman Server-Side dengan PHP |
| Nama Mahasiswa | Kamal Jaya |
| NIM | 312510074 |
| Kelas / Prodi | Teknik Informatika |
| Tanggal Praktikum | 11 November 2026 |

## A. Tujuan Praktikum
- Memahami perbedaan pemrosesan *client-side* dan *server-side*.
- Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
- Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan *function*.
- Menerima dan memproses data dari form HTML menggunakan metode GET dan POST.
- Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
- Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

## B. Perangkat & Lingkungan Praktikum
- **Perangkat:** Laptop/PC, Visual Studio Code, web browser (Google Chrome/Edge).
- **Environment server:** server lokal XAMPP / Laragon (Apache & PHP).
- **Struktur folder server:** `htdocs/Lab7Web_PHP/` atau `www/Lab7Web_PHP/`.

### Cara Menjalankan
1. Salin folder `Lab7Web_PHP` ke `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache dari XAMPP Control Panel / Laragon.
3. Buka `http://localhost/Lab7Web_PHP/` di browser. Jangan membuka file PHP dengan klik ganda.

### Struktur File
| File | Keterangan |
|---|---|
| `index.php` | Halaman utama + daftar latihan |
| `latihan1.php` – `latihan7.php` | Latihan 1 sampai 7 |
| `mini_project.php` | Formulir Data Mahasiswa |
| `eksperimen.php` | Eksperimen mandiri |
| `screenshots/` | Screenshot hasil praktikum |

## C. Hasil Praktikum & Analisis Output

### 1. Latihan 1: Menjalankan PHP (`index.php`)
**Deskripsi:** Memeriksa keberhasilan eksekusi kode PHP di server lokal serta menampilkan waktu dinamis server.

**Hasil Output:**

![Latihan 1](screenshots/latihan1.png)

**Analisis:** Kode PHP dieksekusi di server, lalu server mengirimkan elemen HTML beserta string tanggal server yang di-generate oleh fungsi `date("d-m-Y H:i:s")`. Kode PHP tidak tampil sebagai *raw text* pada *View Source* browser.

### 2. Latihan 2: Variabel, Operator, dan Percabangan (`latihan2.php`)
**Deskripsi:** Perhitungan nilai akhir berdasarkan bobot Tugas (30%), UTS (30%), dan UAS (40%) serta penentuan predikat kelulusan.

**Hasil Output:**

![Latihan 2](screenshots/latihan2.png)

**Analisis:** Program menghitung `$nilaiAkhir` menggunakan operator aritmatika dan menentukan `$predikat` menggunakan blok `if-elseif-else`. Penggunaan `number_format()` merapikan tampilan desimal nilai.

### 3. Latihan 3: Perulangan dan Array (`latihan3.php`)
**Deskripsi:** Menampilkan daftar nama mahasiswa dari tipe data array menggunakan perulangan `foreach`.

**Hasil Output:**

![Latihan 3](screenshots/latihan3.png)

**Analisis:** Struktur array dimanfaatkan untuk menyimpan sekumpulan data nama. Perulangan `foreach` memproses tiap elemen array secara sistematis untuk dicetak dalam elemen list HTML (`<ol><li>`).

### 4. Latihan 4: Membuat Function (`latihan4.php`)
**Deskripsi:** Menghitung potongan harga menggunakan *user-defined function* `hitungDiskon()`.

**Hasil Output:**

![Latihan 4](screenshots/latihan4.png)

**Analisis:** Fungsi `hitungDiskon($harga, $persen)` menerima dua argumen dan mengembalikan (*return*) nilai harga bersih setelah dipotong diskon. Hal ini meningkatkan efisiensi dan reusabilitas kode.

### 5. Latihan 5: Memproses Form dengan GET (`latihan5.php`)
**Deskripsi:** Mengirim dan menangkap parameter kata kunci pencarian via URL dengan metode GET.

**Hasil Output:**

![Latihan 5](screenshots/latihan5.png)

**Analisis:** Metode GET menyisipkan nilai input ke dalam URL query parameter (contoh: `?kata=pemrograman`). Data dibaca menggunakan array superglobal `$_GET["kata"]`.

### 6. Latihan 6: Memproses Form dengan POST (`latihan6.php`)
**Deskripsi:** Mengirim data form (Nama dan Program Studi) menggunakan metode POST.

**Hasil Output:**

![Latihan 6](screenshots/latihan6.png)

**Analisis:** Metode POST menyembunyikan payload input dari address bar. Penggunaan `htmlspecialchars()` mencegah celah keamanan *Cross-Site Scripting* (XSS) ketika data dirender kembali di browser.

### 7. Latihan 7: Pengolahan Data Sederhana (`latihan7.php`)
**Deskripsi:** Form perhitungan subtotal transaksi belanja beserta validasi numerik sisi server.

**Hasil Output:**

![Latihan 7](screenshots/latihan7.png)

**Analisis:** Server melakukan validasi tipe data dan rentang angka menggunakan `is_numeric()`, `ctype_digit()`, serta pengecekan nilai minimal sebelum mengalikan harga dan jumlah barang.

### 8. Mini Project: Form Data Mahasiswa (`mini_project.php`)
**Deskripsi:** Aplikasi pendaftaran mahasiswa lengkap dengan validasi multi-rule (wajib diisi, format email, dan rentang semester).

#### A. Tampilan Form Awal & Input Valid

![Mini Project - input valid](screenshots/mini_valid.png)

#### B. Pengujian Kasus Valid & Tidak Valid

**Kasus Input Valid 1**
- **Input:** Nama: Andi Pratama, NIM: 230101001, Prodi: Teknik Informatika, Semester: 3, Email: andi@example.com
- **Hasil:** Data berhasil divalidasi dan ringkasan data ditampilkan dengan aman di bawah form.

**Kasus Input Valid 2**
- **Input:** Nama: Siti Rahma, NIM: 230101088, Prodi: Sistem Informasi, Semester: 8, Email: siti.rahma@univ.ac.id
- **Hasil:** Seluruh bidang lolos validasi server-side dan diproses tanpa kendala.

**Kasus Input Tidak Valid 1 (Format Email Salah & Semester Out-of-Bound)**
- **Input:** Nama: Budi, NIM: 230101002, Prodi: TI, Semester: 18, Email: budiatgmail.com
- **Hasil (Screenshot Error):**

![Mini Project - error 1](screenshots/mini_error1.png)

**Kasus Input Tidak Valid 2 (Kolom Kosong & Semester Non-Angka)**
- **Input:** Nama: [Kosong], NIM: 230101003, Prodi: [Kosong], Semester: abc, Email: test@mail.com
- **Hasil (Screenshot Error):**

![Mini Project - error 2](screenshots/mini_error2.png)

## D. Jawaban Pertanyaan Evaluasi

**1. Apa perbedaan pemrosesan client-side dan server-side?**
- *Client-side* diproses langsung di web browser pengguna (contoh: HTML, CSS, JavaScript). Kode sumbernya dapat dilihat oleh pengguna.
- *Server-side* diproses di komputer web server (contoh: PHP). Kode dieksekusi di server dan hanya mengirimkan hasil akhir (seperti HTML/JSON) ke browser pengguna.

**2. Mengapa file PHP harus dijalankan melalui web server?**
File PHP berisi instruksi pemrograman yang memerlukan *PHP Interpreter* (pada web server seperti Apache/Nginx) untuk menerjemahkan dan mengeksekusi kode menjadi output HTML sebelum dikirim ke browser.

**3. Apa fungsi tanda `$` pada variabel PHP?**
Tanda `$` merupakan penanda sintaksis (*identifier*) wajib di PHP untuk mendeklarasikan dan mengakses nilai dari sebuah variabel.

**4. Apa perbedaan metode GET dan POST?**
- **GET:** data dikirim melalui URL parameter, terlihat langsung pada address bar, memiliki batasan panjang data, dan tidak aman untuk data sensitif.
- **POST:** data dikirim di dalam *body* HTTP request, tidak terlihat di address bar, dapat menampung data lebih besar, dan lebih sesuai untuk form/transaksi. POST bukan enkripsi, gunakan HTTPS untuk melindungi data.

**5. Mengapa input pengguna perlu divalidasi di sisi server?**
Validasi *client-side* (seperti atribut `required` pada HTML) mudah dimanipulasi atau dimatikan lewat browser developer tools. Validasi *server-side* adalah pemeriksaan utama untuk menjamin integritas data dan keamanan aplikasi.

**6. Apa fungsi `htmlspecialchars()` ketika menampilkan data dari form?**
Fungsi ini mengonversi karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi *HTML entities*, sehingga mencegah injeksi script/HTML berbahaya (*Cross-Site Scripting* / XSS).

**7. Apa manfaat penggunaan function dalam program PHP?**
Mengorganisir kode agar lebih rapi, menghindari penulisan kode berulang (*reusability*), mempermudah pemeliharaan (*maintenance*), dan mempermudah pengujian modularitas program.
