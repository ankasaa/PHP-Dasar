


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator-perbandingan</title>
</head>
<body>
    <?php
    $a = 5;
    $b = 10;
    ?>
    <h2>Operator Perbandingan</h2>
    <p>a = 5;</p>
    <p>b = 10;</p>

    <ul>
        <li>Operator sama a == b<h2><?php var_dump($a == $b); ?></h2></li>
        <li>operator tdk sama a != b<h2><?php var_dump($a != $b); ?></h2></li>
        <li>operator identik a === b<h2><?php var_dump($a === $b); ?></h2></li>
        <li>operator tdk identik a !== b<h2><?php var_dump($a !== $b); ?></h2></li>
        <li>operator lebih besar a > b<h2><?php var_dump($a > $b); ?></h2></li>
        <li>operator lebih kecil a < b<h2><?php var_dump($a < $b); ?></h2></li>
        <li>operator lebih besar/sama a >= b<h2><?php var_dump($a >= $b); ?></h2></li>
        <li>operator lebih kecil/sama a <= b<h2><?php var_dump($a <= $b); ?></h2></li>

    </ul>


</body>
</html>