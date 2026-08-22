<?php

//jangan lupa isi value nya setelah isi variabel "Andika"
$nama = "andika";
echo gettype($nama);//output string

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipe-data</title>
</head>
<body>
    <?php
   
   $items = ("buku"); //tipe string
   $num = 123; //tipe interger
   $des = 3.14; //tipe float
   $bool = true ; //tipe boolean true or false
   $arr = ['a','b',3 ,false];
   $var = null ;
   ?>   
    <h2><?php  echo $var; ?></h2> <!--  outputnya buku -->
    <h2><?php  echo gettype($var) ; ?></h2>  <!-- mengembalikan tipe data dari variabel -->
    <h2><?php  var_dump($var); ?></h2>  <!-- menampilkan tipe data dan nilai dari variabel  -->
    <h2><?php  echo is_null($var); ?></h2> <!-- mengecek tipe data tertentu output: 1 = true , dan false = 0 -->

</body>
</html>