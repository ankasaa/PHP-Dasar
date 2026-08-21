<?php
// jangan pernah lupain ";"
    echo "Pengenalan <br> ";
    echo "pengenalan";
    /* Multiline comment 
    cihuy
    test*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengenalan</title>
</head>
<body>
    <?php
    /* php bisa di dalam tag <"h1"> dan di dalam tag <"body"> dan juga bisa di luar tag html*/
    ?>
    <h1><?php echo "hallo semuanya"; ?><br>hallo juga</h1>
    <!-- teknik shorthand pada php ubah "php echo" menjadi "=" dan jangan lupa tambahkan ";" -->
    <h2><?= "hallo semuanya"; ?><br></h2>
</body>
</html>