<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator-logika</title>
</head>
<body>
    <h1>Operator Logika</h1>
    <?php
    $a = true;
    $b = false;
    ?>
    <p>a$ = true</p>
    <p>b$ = false</p>

    <ul>
        <li><h2>$a && $b = <?php var_dump ($a && $b); ?></h2></li>
        <li><h2>$a || $b = <?php var_dump ($a || $b); ?></h2></li>
        <li><h2>!$b = <?php var_dump (!$b); ?></h2></li>
        <li><h2>$a xor $b = <?php var_dump ($a xor $b); ?></h2></li>


    </ul>



</body>
</html>