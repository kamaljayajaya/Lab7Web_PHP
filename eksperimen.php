<?php
// Eksperimen 3: function format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format((float)$angka, 0, ",", ".");
}

// Eksperimen 1: rata-rata tiga komponen nilai
function rataRata(array $nilai) {
    return count($nilai) ? array_sum($nilai) / count($nilai) : 0;
}

// Eksperimen 2: data sederhana untuk pencarian GET
$dataMahasiswa = ["Alya Putri", "Bima Santoso", "Citra Dewi", "Doni Pratama", "Eka Saputra", "Alya Rahma"];
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen Mandiri</title>
<style>body{font-family:sans-serif;max-width:700px;margin:2rem auto;padding:0 1rem} section{margin-bottom:2rem}</style></head>
<body>
<h1>Eksperimen Mandiri</h1>

<section>
 <h2>1. Rata-rata tiga komponen nilai</h2>
 <?php
 $tugas = 85; $uts = 78; $uas = 90;
 echo "<p>Tugas: $tugas, UTS: $uts, UAS: $uas</p>";
 echo "<p>Rata-rata: " . number_format(rataRata([$tugas, $uts, $uas]), 2) . "</p>";
 ?>
</section>

<section>
 <h2>2. Pencarian nama (GET) pada array</h2>
 <form method="GET" action="">
  <label for="cari">Cari nama:</label>
  <input id="cari" name="cari" type="text">
  <button type="submit">Cari</button>
 </form>
 <?php
 if (isset($_GET["cari"])) {
     $cari = trim($_GET["cari"]);
     echo "<p>Hasil untuk: <strong>" . htmlspecialchars($cari, ENT_QUOTES, "UTF-8") . "</strong></p>";
     $hasil = $cari === "" ? [] : array_filter($dataMahasiswa, fn($n) => stripos($n, $cari) !== false);
     if ($hasil) {
         echo "<ul>";
         foreach ($hasil as $n) echo "<li>" . htmlspecialchars($n) . "</li>";
         echo "</ul>";
     } else {
         echo "<p>Tidak ditemukan.</p>";
     }
 }
 ?>
</section>

<section>
 <h2>3. Format Rupiah</h2>
 <?php
 foreach ([15000, 1250000, 99999.5] as $h) {
     echo "<p>$h &rarr; " . formatRupiah($h) . "</p>";
 }
 ?>
</section>

<section>
 <h2>4 &amp; 5. Validasi NIM dan tombol reset</h2>
 <p>Sudah diterapkan pada <a href="mini_project.php">Mini Project</a>: NIM hanya angka dengan panjang 8–12 digit, serta tombol Reset.</p>
 <p><strong>Perbedaan reset dan pemrosesan ulang di server:</strong> tombol <code>type="reset"</code> hanya mengembalikan isian form ke kondisi awal di browser tanpa mengirim request ke server. Pemrosesan ulang di server terjadi saat form dikirim (submit) atau halaman dimuat ulang: PHP menjalankan validasi lagi dan menghasilkan HTML baru.</p>
</section>
<p><a href="index.php">&larr; Kembali</a></p>
</body>
</html>
