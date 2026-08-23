<?php

echo "Penggunaan Function <br><br>";

// --- 1. FUNCTION BIASA (Tanpa Parameter) ---
// Ibarat mesin otomatis yang tugasnya hanya satu hal yang pasti dan tidak berubah-ubah.

function salam(){ // Kita sedang merakit mesin bernama "salam". (Kodenya hanya disimpan, tidak langsung jalan)
    echo "Halo, selamat malam semuanya"; 
    echo "<br>";
}

salam(); // Menekan tombol "salam". Baris inilah yang benar-benar menyuruh mesinnya bekerja dan mencetak teks ke layar!


echo "<br>";


// --- 2. FUNCTION DENGAN PARAMETER ---
// Ibarat mesin blender. Mesinnya sama, tapi hasilnya beda-beda tergantung buah (data) apa yang kita masukkan.

echo "Penggunaan Parameter fungsi Function<br>";

function penjumlahan($a, $b){ // $a dan $b adalah wadah kosong (parameter) yang siap menampung bahan dari luar.
    $hasil = $a + $b; // Mesin bekerja: menjumlahkan apa pun isi wadah $a dan $b, lalu menyimpannya di $hasil
    echo "<br>";
    echo "Jumlah sisi persegi : $hasil"; // Mencetak hasil akhir dari perhitungan di atas
}

penjumlahan(5, 2); // Kita memanggil mesin 'penjumlahan', sambil mengirim angka 5 (masuk ke $a) dan 2 (masuk ke $b). Outputnya adalah 7!

// Anda bahkan bisa memanggilnya lagi dengan angka yang berbeda tanpa harus menulis ulang rumusnya!
// penjumlahan(10, 10); -> Hasilnya akan 20
// penjumlahan(50, 5); -> Hasilnya akan 55

?>