<?php
// ===== BAGIAN PEMROSESAN DATA =====
const NIM_MIN = 8;   // ketentuan panjang NIM (eksperimen no. 4)
const NIM_MAX = 12;

$data = null;
$error = [];
$old = ["nama" => "", "nim" => "", "prodi" => "", "semester" => "", "email" => ""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");
    $old = ["nama" => $nama, "nim" => $nim, "prodi" => $prodi,
            "semester" => (string)$semesterInput, "email" => $email];

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim) || strlen($nim) < NIM_MIN || strlen($nim) > NIM_MAX) {
        $error[] = "NIM harus berupa angka dengan panjang " . NIM_MIN . "–" . NIM_MAX . " digit.";
    }
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }
    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Mini Project — Formulir Data Mahasiswa</title>
 <style>
  body{font-family:sans-serif;max-width:600px;margin:2rem auto;padding:0 1rem}
  label{display:block;margin:.7rem 0 .2rem}
  input{width:100%;padding:.4rem;box-sizing:border-box}
  .err{background:#fde8e8;border:1px solid #e08080;padding:.5rem 1rem;margin:1rem 0}
  .ok{background:#e8f7ea;border:1px solid #6cbf7a;padding:.5rem 1rem;margin:1rem 0}
  button{margin-top:1rem;padding:.5rem 1rem}
 </style>
</head>
<body>
<h1>Formulir Data Mahasiswa</h1>

<?php if ($error): ?>
 <div class="err">
  <strong>Terdapat kesalahan:</strong>
  <ul>
   <?php foreach ($error as $msg): ?>
    <li><?= e($msg) ?></li>
   <?php endforeach; ?>
  </ul>
 </div>
<?php endif; ?>

<?php if ($data): ?>
 <div class="ok">
  <h3>Data berhasil diterima</h3>
  <table cellpadding="4">
   <tr><td>Nama</td><td>: <?= e($data["nama"]) ?></td></tr>
   <tr><td>NIM</td><td>: <?= e($data["nim"]) ?></td></tr>
   <tr><td>Program Studi</td><td>: <?= e($data["prodi"]) ?></td></tr>
   <tr><td>Semester</td><td>: <?= e($data["semester"]) ?></td></tr>
   <tr><td>Email</td><td>: <?= e($data["email"]) ?></td></tr>
  </table>
 </div>
<?php endif; ?>

<form method="POST" action="">
 <label for="nama">Nama</label>
 <input id="nama" name="nama" type="text" value="<?= e($old["nama"]) ?>" required>

 <label for="nim">NIM (angka, <?= NIM_MIN ?>–<?= NIM_MAX ?> digit)</label>
 <input id="nim" name="nim" type="text" inputmode="numeric" value="<?= e($old["nim"]) ?>" required>

 <label for="prodi">Program Studi</label>
 <input id="prodi" name="prodi" type="text" value="<?= e($old["prodi"]) ?>" required>

 <label for="semester">Semester (1–14)</label>
 <input id="semester" name="semester" type="number" min="1" max="14" value="<?= e($old["semester"]) ?>" required>

 <label for="email">Email</label>
 <input id="email" name="email" type="email" value="<?= e($old["email"]) ?>" required>

 <button type="submit">Kirim</button>
 <!-- Reset hanya mengosongkan isian di browser (client-side), tanpa request ke server -->
 <button type="reset">Reset</button>
 <!-- Link ini memuat ulang halaman dari server (GET), sehingga nilai lama & pesan error hilang -->
 <a href="mini_project.php">Muat ulang dari server</a>
</form>
<p><a href="index.php">&larr; Kembali</a></p>
</body>
</html>
