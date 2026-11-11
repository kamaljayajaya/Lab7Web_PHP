<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 4</title></head>
<body>
<h1>Latihan 4 — Function</h1>
<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

function tentukanKelulusan($nilai) {
    return $nilai >= 60 ? "Lulus" : "Tidak Lulus";
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "<p>Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "</p>";
echo "<p>Luas persegi panjang (8 x 4): " . hitungLuasPersegiPanjang(8, 4) . "</p>";
echo "<p>Nilai 75: " . tentukanKelulusan(75) . "</p>";
echo "<p>Nilai 45: " . tentukanKelulusan(45) . "</p>";
?>
<p><a href="index.php">&larr; Kembali</a></p>
</body>
</html>
