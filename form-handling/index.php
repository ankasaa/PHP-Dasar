<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        Formulir HTML untuk mengirim data ke server
        action="index.php" = data dikirim ke halaman ini sendiri (recursive)
        method="post" = data dikirim melalui body HTTP (tidak terlihat di URL, lebih aman)
    -->
    <form style="display: flex; flex-direction:column; gap: 5px; " action="index.php" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <input style="width: 220px;" type="submit" value="kirim">
    </form>
</body>
</html>

<?php

// ============================
// PERBEDAAN METODE GET vs POST
// ============================

// Metode GET = data dikirim melalui URL parameter (?key=value)
// Contoh: localhost:8000/form-handling/index.php?name=Andika&email=satuduatigapesawat%40gmail.com
// Kekurangan: Data sensitif (KTP, password, no HP) TERLIHAT di URL, bisa dilihat orang lain
// Kelebihan: Cocok untuk pencarian (search), karena URL bisa di-share/disimpan (bookmark)
echo "Metode GET <br>";
echo "http://localhost:8000/form-handling/index.php?name=Andika&email=satuduatigapesawat%40gmail.com";
echo "<br><br>";

// Metode POST = data dikirim melalui body HTTP (tersembunyi)
// URL tetap bersih: localhost:8000/form-handling/index.php (tanpa parameter data)
// Kelebihan: Data sensitif TIDAK terlihat di URL, lebih aman untuk kirim data pribadi
echo "Metode POST <br>";
echo "http://localhost:8000/form-handling/index.php";

// ==================================
// VALIDASI INPUT DENGAN PHP
// ==================================

echo "<br><br>";
echo "Memvalidasi nama dan email";
echo "<br>";

// ---------------------------
// Validasi Nama (empty check)
// ---------------------------
// $_POST["name"] = mengambil nilai input name dari form (metode POST)
// empty() = memeriksa apakah variabel kosong, "", null, atau 0
// Cara baca: "Apakah $_POST['name'] kosong?"
//   - Jika IYA (true) = tampilkan pesan error "nama harus di isi"
//   - Jika TIDAK (false) = tampilkan nama yang dikirim
if(empty($_POST["name"])){
    echo "nama harus di isi <br>";
}else{
    echo $_POST["name"] . "<br>";
}

// --------------------------------
// Validasi Email (empty + filter)
// --------------------------------
// Validasi email dilakukan dalam 2 langkah:
// Langkah 1: Cek apakah email kosong
// Langkah 2: Jika tidak kosong, cek apakah format email valid
if(empty($_POST["email"])){
    // Jika email kosong, tampilkan pesan error
    echo "email harus di isi <br>";
}
// filter_var() = memfilter/validasi data dengan filter tertentu
// FILTER_VALIDATE_EMAIL = filter untuk memvalidasi format email
// ! (NOT operator) = membalik nilai: jika email TIDAK valid -> true
// Cara baca: "Apakah $_POST['email'] TIDAK merupakan format email yang valid?"
//   - Jika IYA (email tidak valid) = tampilkan pesan error
elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    echo "Email tidak valid";
}
// Jika email tidak kosong DAN format valid -> tampilkan email
else{
    echo $_POST["email"] . "<br>";
}

?>
