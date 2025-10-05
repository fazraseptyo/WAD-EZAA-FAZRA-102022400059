<?php
$errors = [];
$values = [
  "nama"    => "",
  "email"   => "",
  "nim"     => "",
  "jurusan" => "",
  "alasan"  => "",
];
$success = false;

function clean($s){ return htmlspecialchars(trim($s ?? ""), ENT_QUOTES, 'UTF-8'); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  foreach ($values as $k => $_) { $values[$k] = clean($_POST[$k] ?? ""); }

  if ($values["nama"] === "")              { $errors["nama"] = "Nama wajib diisi"; }
  if ($values["nim"] === "")               { $errors["nim"] = "NIM wajib diisi"; }
  elseif (!ctype_digit($values["nim"]))    { $errors["nim"] = "NIM harus berupa angka"; }
  if ($values["email"] === "")             { $errors["email"] = "Email wajib diisi"; }
  elseif (!filter_var($values["email"], FILTER_VALIDATE_EMAIL))
                                           { $errors["email"] = "Email tidak valid"; }
  if ($values["jurusan"] === "")           { $errors["jurusan"] = "Jurusan wajib dipilih"; }
  if ($values["alasan"] === "")            { $errors["alasan"] = "Alasan wajib diisi"; }
  elseif (mb_strlen($values["alasan"])<10) { $errors["alasan"] = "Alasan minimal 10 karakter"; }

  if (empty($errors)) { $success = true; }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Anggota EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
      <div class="module-label">
    </header>

    <?php if ($success): ?>
      <div class="alert success">Data Pendaftaran Berhasil!</div>
    <?php endif; ?>

    <form method="post" action="" novalidate class="form">
      <div class="field">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $values["nama"] ?>">
        <?php if (isset($errors["nama"])): ?><small class="error"><?= $errors["nama"] ?></small><?php endif; ?>
      </div>

      <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $values["email"] ?>">
        <?php if (isset($errors["email"])): ?><small class="error"><?= $errors["email"] ?></small><?php endif; ?>
      </div>

      <div class="field">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?= $values["nim"] ?>">
        <?php if (isset($errors["nim"])): ?><small class="error"><?= $errors["nim"] ?></small><?php endif; ?>
      </div>

      <div class="field">
        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan">
          <option value="" disabled <?= $values["jurusan"]===""?"selected":""; ?>>-- Pilih Jurusan --</option>
          <option <?= $values["jurusan"]==="Sistem Informasi"?"selected":""; ?>>Sistem Informasi</option>
          <option <?= $values["jurusan"]==="Informatika"?"selected":""; ?>>Informatika</option>
          <option <?= $values["jurusan"]==="Teknik Komputer"?"selected":""; ?>>Teknik Komputer</option>
          <option <?= $values["jurusan"]==="Teknik Elektro"?"selected":""; ?>>Teknik Elektro</option>
          <option <?= $values["jurusan"]==="Lainnya"?"selected":""; ?>>Lainnya</option>
        </select>
        <?php if (isset($errors["jurusan"])): ?><small class="error"><?= $errors["jurusan"] ?></small><?php endif; ?>
      </div>

      <div class="field">
        <label for="alasan">Alasan Bergabung:</label>
        <textarea id="alasan" name="alasan" rows="4"><?= $values["alasan"] ?></textarea>
        <?php if (isset($errors["alasan"])): ?><small class="error"><?= $errors["alasan"] ?></small><?php endif; ?>
      </div>

      <button type="submit" class="btn">Daftar</button>
    </form>

    <?php if ($success): ?>
      <section class="card-success">
        <div class="card-head">
          <h3>Data Pendaftaran Berhasil</h3>
        </div>

        <div class="kv-grid">
          <div class="kv-label">Nama</div>    <div class="kv-colon">:</div> <div class="kv-value"><?= $values["nama"] ?></div>
          <div class="kv-label">Email</div>   <div class="kv-colon">:</div> <div class="kv-value"><?= $values["email"] ?></div>
          <div class="kv-label">NIM</div>     <div class="kv-colon">:</div> <div class="kv-value"><?= $values["nim"] ?></div>
          <div class="kv-label">Jurusan</div> <div class="kv-colon">:</div> <div class="kv-value"><?= $values["jurusan"] ?></div>
          <div class="kv-label">Alasan Bergabung</div>
                                             <div class="kv-colon">:</div> <div class="kv-value"><?= nl2br($values["alasan"]) ?></div>
        </div>
      </section>
    <?php endif; ?>

    <footer class="footer"><small>© EAD Laboratory</small></footer>
  </div>
</body>
</html>
