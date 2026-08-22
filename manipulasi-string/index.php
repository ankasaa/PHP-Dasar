<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manipulasi-string</title>
</head>
<body>
    <?php
    $namadepan = "Anton";
    $namabelakang = "Junior";
    $kalimat ="dunia PHP adalah bahasa terbaik di dunia";


    $Confullname = $namadepan . " " . $namabelakang; //string concatenation
    $Interfullname = "$namadepan $namabelakang"; //string Interpolasi

    $posisi = strpos($kalimat, "PHP"); //hitung kalimat awal
    $posisiakhir = strrpos($kalimat, "dunia"); //hitung kalimat akhir
    $newtest = str_replace("PHP" , "Python" , $kalimat); //mengganti substring tertentu dalam string
    $panjangstr = strlen($kalimat); //menghitung panjang string
    $besartxt = strtoupper($kalimat); //,semua huruf jadi kapital
    $keciltxt = strtolower($kalimat); //semua huruf jadi kecil    
    $subtxt = substr($kalimat, 0 , 10); //mengambil kalimat yang start dari value 0 ke 10
    ?>
    <h2><?=  $Confullname; ?></h2>
    <h3><?=  $Interfullname; ?></h3>
    <h3><?=  $posisi; ?></h3> <!-- outputnya kalimat awal "6" -->
    <h3><?=  $posisiakhir; ?></h3> <!-- outputnya kalimat akhir "35" -->
    <h3><?=  $newtest; ?></h3> <!-- outputnya "dunia Python adalah bahasa terbaik di dunia" -->
    <h3><?=  $panjangstr; ?></h3> <!-- outputnya "40" -->
    <h3><?=  $besartxt; ?></h3> <!-- outputnya "semua huruf menjadi kapital" -->
    <h3><?=  $keciltxt; ?></h3> <!-- outputnya "semua huruf menjadi kecil" -->
    <h3><?=  $subtxt; ?></h3> <!-- outputnya "dunia PHP" -->

</body>
</html>