<?php

// Membuat array dengan cara 1 (short syntax), yaitu menggunakan tanda kurung siku []
// $sayur adalah variabel array yang berisi 3 elemen: "nangka", "bayam", "wortel"
$sayur = ["nangka", "bayam", "wortel"];
echo "Membuat array cara 1 <br>";
print_r($sayur);

echo "<br><br>";

// Membuat array dengan cara 2 (long syntax), yaitu menggunakan fungsi array()
// $buah adalah variabel array yang berisi 3 elemen: "pisang", "kelapa", "mangga"
$buah = array("pisang", "kelapa", "mangga");
echo "Membuat array cara 2 <br>";
print_r($buah);
echo "<br><br>";

// Memanggil isi array berdasarkan indexnya
// Index dimulai dari 0, jadi $buah[1] = "kelapa" (index ke-1) dan $sayur[0] = "nangka" (index ke-0)
echo "Cara memanggil array<br>";
echo $buah[1];    // output: kelapa
echo "<br>";
echo $sayur[0];   // output: nangka
echo "<br><br>";

// Membuat array asosiatif, yaitu array yang menggunakan key (kunci) berupa string
// Format: "key" => value, contoh: "anto" => 21 berarti key "anto" memiliki value 21
$nama = [
    "anto" => 21,
    "dewa" => 30,
    "rizky" => 40
];
echo "Membuat array asosiatif<br>";
print_r($nama);
echo "<br><br>";

// Membuat array Multidimensi (array of arrays)
// Setiap elemen $tour berisi sub-array dengan key "nama" dan "harga"
$tour = [
    ["nama" => "Bali",     "harga" => "Rp. 1.000.000"],   // index ke-0
    ["nama" => "Surabaya", "harga" => "Rp. 500.000"],     // index ke-1
    ["nama" => "IKN",      "harga" => "Rp. 240.000"],     // index ke-2
];
// Built-in Function in Array
// PHP memiliki banyak fungsi bawaan untuk manipulasi array

// sort() = mengurutkan array dari yang terkecil ke terbesar (urutan naik)
$angka = [5, 4, 3, 2, 1];
sort($angka);       // mengurutkan array $angka secara naik
print_r($angka);    // output: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )
echo "<br><br>";

// array_merge() = menggabungkan dua atau lebih array menjadi satu array
$list_item = ["buku", "pensil", "eraser"];
$list_perlengkapan = ["sepatu", "baju", "topi"];
$perlengkapan = array_merge($list_item, $list_perlengkapan); // menggabungkan $list_item dan $list_perlengkapan
print_r($perlengkapan); // output: array gabungan dari kedua array
echo "<br><br>";

// in_array() = mengecek apakah sebuah value ada di dalam array
// Mengembalikan true jika ditemukan, false jika tidak
echo "Mengecek element pada array<br>";
if (in_array("buku", $perlengkapan)) {    // cek apakah "buku" ada di array $perlengkapan
    echo "buku adalah perlengkapan anda";  // jika true, tampilkan pesan ini
} else {
    echo "Sisir bukan perlengkapan anda";  // jika false, tampilkan pesan ini
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <!-- Looping array multidimensi menggunakan foreach -->
        <!-- $tour = array induk, $wisata = variabel penampung setiap sub-array -->
        <?php foreach ($tour as $wisata): ?>
            <!-- $wisata["nama"] mengambil value dari key "nama" pada sub-array -->
            <li>Tempat Wisata : <?= $wisata["nama"] ?></li>
            <!-- $wisata["harga"] mengambil value dari key "harga" pada sub-array -->
            <li>Harga Wisata : <?= $wisata["harga"] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>