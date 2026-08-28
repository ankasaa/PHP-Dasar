<?php
// $result = variabel untuk menyimpan hasil perhitungan
// Dikosongkan awal karena form belum disubmit
$result = '';

// $_POST["calculate"] = mengecek apakah tombol "Hitung" sudah diklik
// isset() = fungsi untuk mengecek apakah variabel ada/terisi
if(isset($_POST["calculate"])){
    // Mengambil nilai dari form berdasarkan attribute name=""
    $num1 = $_POST["num1"];         // angka pertama dari input name="num1"
    $num2 = $_POST["num2"];         // angka kedua dari input name="num2"
    $operator = $_POST["operator"]; // operator dari select name="operator"
    
    // is_numeric() = mengecek apakah input berupa angka
    // && = operator AND, harus kedua kondisi true
    if(is_numeric($num1) && is_numeric($num2)){
        // switch = percabangan untuk mengecek nilai $operator
        // case = salah satu nilai yang mungkin
        // : (titik dua) setelah case, bukan ;
        switch ($operator){
            case "add":             // jika operator = "add" (Tambah)
                $result = $num1 + $num2;  // penjumlahan
            break;                  // break = keluar dari switch

            case "subtract":        // jika operator = "subtract" (Kurang)
                $result = $num1 - $num2;  // pengurangan
            break;

            case "multiply":        // jika operator = "multiply" (Kali)
                $result = $num1 * $num2;  // perkalian
            break;

            case "divida":          // jika operator = "divida" (Bagi)
                // Cek $num2 != 0 agar tidak ada pembagian dengan 0
                if($num2 != 0){
                    $result = $num1 / $num2;  // pembagian
                } else {
                    $result = "Error : Pembagian dengan 0 tidak bisa";
                }
            break;
        }
    } else {
        // Jika input bukan angka
        $result = "angka tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <!-- link ke file CSS untuk styling -->
    <link rel="stylesheet" href="/calculator/style.css">
</head>
<body>
    
    <div class="container">
        <h1>Calculator</h1>
        
        <!-- form = wadah input yang dikirim ke server -->
        <!-- action = halaman PHP yang memproses data -->
        <!-- method="post" = data dikirim tersembunyi (bukan di URL) -->
        <form action="/calculator/index.php" class="calculator-form" method="post">
            
            <!-- input angka pertama -->
            <!-- name="num1" = nama variabel yang dikirim ke PHP -->
            <!-- value = jika form sudah disubmit, tampilkan nilai sebelumnya -->
            <!-- $_POST['num1'] mengambil nilai dari input sebelumnya -->
            <!-- ?: '' = jika kosong, tampilkan string kosong -->
            <input type="text" id="text" name="num1" placeholder="Angka ke 1" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : '';?>">
            
            <!-- input angka kedua, sama seperti di atas -->
            <input type="text" id="text" name="num2" placeholder="Angka ke 2" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : '';?>">
            
            <!-- select = dropdown untuk memilih operator -->
            <!-- name="operator" = nama variabel yang dikirim ke PHP -->
            <select name="operator" id="operator">
                <!-- option = pilihan dalam dropdown -->
                <!-- value = nilai yang dikirim ke PHP saat dipilih -->
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'add' ? "selected": "" ?> value="add">Tambah</option>
                <!-- selected = aktif jika user sebelumnya memilih opsi ini -->
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'subtract' ? "selected": "" ?> value="subtract">Kurang</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'multiply' ? "selected": "" ?> value="multiply">Kali</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'divida' ? "selected": "" ?> value="divida">Bagi</option>
            </select>
            
            <!-- tombol submit untuk mengirim form -->
            <!-- name="calculate" dicek oleh $_POST["calculate"] di PHP -->
            <button class="calculator-btn" type="submit" name="calculate">Hitung</button>
        </form>
        
        <!-- menampilkan hasil perhitungan -->
        <!-- htmlspecialchars() = mengubah karakter HTML agar aman ditampilkan (cegah XSS) -->
        <div class="result">Result : <?php echo htmlspecialchars($result) ?></div>
    </div>

</body>
</html>
