<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 3</title></head>
<body>
<h1>Latihan 3 — Perulangan dan Array</h1>
<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni"];
// Tambahan minimal tiga nama
array_push($mahasiswa, "Eka", "Fajar", "Gita");

echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
echo "<p>Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
?>
<p><a href="index.php">&larr; Kembali</a></p>
</body>
</html>
