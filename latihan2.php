<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 2</title></head>
<body>
<h1>Latihan 2 — Variabel, Operator, Percabangan</h1>
<?php
function predikat($n) {
    if ($n >= 85) return "A";
    elseif ($n >= 75) return "B";
    elseif ($n >= 60) return "C";
    return "D";
}

// Contoh utama dari modul
$nama = "Siti";
$tugas = 85;
$uts = 78;
$uas = 90;
$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
$predikat = predikat($nilaiAkhir);

echo "<h3>Contoh utama</h3>";
echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: " . $predikat;

// Uji beberapa kombinasi nilai
$uji = [
    ["Budi", 90, 90, 90],
    ["Citra", 70, 80, 75],
    ["Dedi", 60, 55, 65],
    ["Eka", 40, 30, 50],
];
echo "<h3>Uji kombinasi nilai</h3>";
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Predikat</th></tr>";
foreach ($uji as [$n, $t, $u, $a]) {
    $na = ($t * 0.30) + ($u * 0.30) + ($a * 0.40);
    echo "<tr><td>" . htmlspecialchars($n) . "</td><td>$t</td><td>$u</td><td>$a</td><td>"
        . number_format($na, 2) . "</td><td>" . predikat($na) . "</td></tr>";
}
echo "</table>";
?>
<p><a href="index.php">&larr; Kembali</a></p>
</body>
</html>
