<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 5</title></head>
<body>
<h1>Latihan 5 — Form GET</h1>
<form method="GET" action="">
 <label for="kata">Kata kunci:</label>
 <input id="kata" name="kata" type="text">
 <button type="submit">Cari</button>
</form>
<?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
}
?>
<p><small>Amati perubahan URL setelah form dikirim (muncul <code>?kata=...</code>). Jangan gunakan GET untuk data sensitif.</small></p>
<p><a href="index.php">&larr; Kembali</a></p>
</body>
</html>
