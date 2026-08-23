
<?php

//while loops
//fungsi $i++ "adalah alat penghitung otomatis. Fungsinya adalah untuk menambah angka 1 setiap kali satu putaran selesai dijalankan."

$i = 1;
$j = 1;

echo "while loops <br> ";
while ($i <= 5){ // ketika var $i nilainya kurang dari atau sama dengan 5, maka jalankan perintah "echo"
    echo "Nomber : $i <br> ";
    $i++; // $i++ artinya $i = $i + 1. Ini wajib ada agar nilai $i terus bertambah dan perulangan bisa berhenti saat $i mencapai 6.
}

//do while loops

echo "<br>";
echo "do while loops <br>";
// Cara kerja: JALANKAN DULU MINIMAL 1 KALI, BARU CEK SYARAT DI AKHIR.
do { 
    // "Lakukan (do) perintah cetak teks ini dan tambahkan nilai $j terlebih dahulu..."
    echo "number : $j <br>";
    $j++; 
    
} while ($j <= 5); // "...setelah perintah di atas selesai dijalankan, baru cek: apakah $j masih kurang dari atau sama dengan 5? Jika iya, ulangi lagi ke atas."

//for loops

echo "<br>";
echo "for loops <br>";

for($i = 1; $i <= 5; $i++) // dimulai dari var $i itu adalah nilainya 1, lalu var $i kurang sama dgn 5 , maka var $i ditambah +1
    echo "Nomber : $i <br>"; 

//foreach loop

echo "<br>";
echo "foreach loop <br>";

$hewan = array("ayam" , "anjing" , "babi"  ); //terdapat var $hewan dengan nilai "ayam,anjing,babi" , 
    foreach($hewan as $animals) //keluarkan nilai array $hewan sebagai variabel baru yaitu $animals
        echo "hewannya adalah : $animals <br>"; //kemudian cetak var $animals dan otomatis terhenti jika array sudah habis

//break and continue
echo "<br>";
echo "break <br>"; //break artinya berhenti

for($i = 1; $i <=10; $i++){ //var $i itu nilainya 1 , jika var $1 kurang sama 10 , maka var $i akan di tambah +1 di setiap perulangan
    if ($i == 5) //jika var $i itu sama dengan 5 , jika iya
    break; //maka program otomatis terhenti di saat itu juga
    echo "Number: $i <br> "; // dan akan di cetak dgn output 1 , 2 , 3, 4

}
echo "<br>";
echo "continue <br>";

for($j = 1; $j <=10; $j++){
    if ($j == 5) // Mengecek di setiap putaran: "Apakah angka saat ini adalah 5?"
        continue; // Jika IYA, LEWATI (skip) bagian bawahnya, dan langsung LOMPAT ke putaran angka 6!
        
    echo "Number: $j <br> "; // Cetak angka ke layar. (Hasil: Mencetak 1, 2, 3, 4, [angka 5 hilang], 6, 7, 8, 9, 10).

}
?>
