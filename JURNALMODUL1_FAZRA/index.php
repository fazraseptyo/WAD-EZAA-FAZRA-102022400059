<?php
$errors = [];
$values = [
  "nama"    => "",
  "email"   => "",
  "nomor HP"     => "",
  "Pilih Film" => "",
  "Jumlah Tiket"  => "",
];
$success = false;

function clean($s){ return htmlspecialchars(trim($s ?? ""), ENT_QUOTES, 'UTF-8'); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  foreach ($values as $k => $_) { $values[$k] = clean($_POST[$k] ?? ""); }

  if ($values["nama"] === "")              { $errors["nama"] = "Nama wajib diisi"; }
  if ($values["nomor HP"] === "")               { $errors["nomor HP"] = "nomor HP hanya boleh angka"; }
  elseif (!ctype_digit($values["nomor HP"]))    { $errors["nomor HP"] = "nomor HP hanya boleh angka"; }
  if ($values["email"] === "")             { $errors["email"] = "Email wajib diisi"; }
  elseif (!filter_var($values["email"], FILTER_VALIDATE_EMAIL))
                                           { $errors["email"] = "Format email tidak valid"; }
  if ($values["Pilih Film"] === "")           { $errors["Pilih Film"] = "Pilih Film"; }
  if ($values["Jumlah Tiket"] === "")            { $errors["Jumlah Tiket"] = "Jumlah tiket harus angka"; }
  elseif (mb_strlen($values["Jumlah Tiket"])<10) { $errors["Jumlah Tiket"] = "Jumlah tiket harus angka"; }

  if (empty($errors)) { $success = true; }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesan Tiket</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <h2>Form Pemesanan Tiket Bioskop</h2>
      <div class="module-label">
    </header>

    <?php if ($success): ?>
      <div class="alert success">Data Pesanan Berhasil!</div>
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
        <label for="nomor HP">nomor HP :</label>
        <input type="text" id="nomor HP" name="nomor HP" value="<?= $values["nomor HP"] ?>">
        <?php if (isset($errors["nomor hp"])): ?><small class="error"><?= $errors["nomor hp"] ?></small><?php endif; ?>
      </div>

      <div class="field">
        <label for="Pilih Film">Pilih Film:</label>
        <select id="Pilih Film" name="Pilih Film">
          <option value="" disabled <?= $values["jurusan"]===""?"selected":""; ?>>-- Pilih Jurusan --</option>
          <option <?= $values["Pilih Film"]==="Pilih Film"?"selected":""; ?>>The dolls</option>
          <option <?= $values["Pilih Film"]==="Infinities"?"selected":""; ?>>Infinities</option>
          <option <?= $values["Pilih Film"]==="Apa Kek"?"selected":""; ?>>Apa Kek</option>
          <option <?= $values["Pilih Film"]==="Mau dongg"?"selected":""; ?>>Teknik Elektro</option>
          <option <?= $values["Pilih Film"]==="Lainnya"?"selected":""; ?>>Lainnya</option>
        </select>
        <?php if (isset($errors["Pilih Film"])): ?><small class="error"><?= $errors["Pilih Film"] ?></small><?php endif; ?>
      </div>

      <div class="field">
        <label for="Jumlah Tiket">Jumlah Tiket:</label>
        <textarea id="Jumlah Tiket" name="Jumlah Tiket" rows="4"><?= $values["Jumlah Tiket"] ?></textarea>
        <?php if (isset($errors["Jumlah Tiket"])): ?><small class="error"><?= $errors["Jumlah Tiket"] ?></small><?php endif; ?>
      </div>

      <button type="submit" class="btn">Pesan Tiket</button>
    </form>

    <?php if ($success): ?>
      <section class="card-success">
        <div class="card-head">
          <h3>Data Pemesanan</h3>
        </div>

        <div class="kv-grid">
          <div class="kv-label">Nama</div>    <div class="kv-colon">:</div> <div class="kv-value"><?= $values["nama"] ?></div>
          <div class="kv-label">Email</div>   <div class="kv-colon">:</div> <div class="kv-value"><?= $values["email"] ?></div>
          <div class="kv-label">nomor HP</div>     <div class="kv-colon">:</div> <div class="kv-value"><?= $values["nim"] ?></div>
          <div class="kv-label">Pilih Film</div> <div class="kv-colon">:</div> <div class="kv-value"><?= $values["jurusan"] ?></div>
          <div class="kv-label">Jumlah Tiket</div>
                                             <div class="kv-colon">:</div> <div class="kv-value"><?= nl2br($values["alasan"]) ?></div>
        </div>
      </section>
    <?php endif; ?>

    <footer class="footer"><small>© EAD Laboratory</small></footer>
  </div>
</body>
</html>