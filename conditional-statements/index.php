<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conditional-statements</title>
</head>
<body>
    <?php
        // if else conditional statements
        $nilai = 90;

        if($nilai >=95){ //jika var $nilai lebih besar dari 95 maka outputnya "Grade A"
            echo "Grade A";
        }else if($nilai >=80){ //tapi jika var $nilai lebih besar dari 80 maka outputnya "Grade B"
            echo "Grade B";
        }else { //tapi jika var $nilai tidak lebih besar dari 95 - 80 maka outputnya "Grade C"
            echo "Grade C";
        }
    ?>

    <div>
        <!-- alternatif syntak -->
        <!-- elseif conditional "kegunaanya lebih simpel dan gampang untuk styling serta lebih rapi" -->
        <?php  $nilaibaru = 50; ?>
        <h1><?php if ($nilaibaru >=90): ?></h1>
            <h1 style="color : blue";>Grade A</h1>
        <h1><?php elseif ($nilaibaru >=70): ?></h1>
            <h2 style="color : green;">Grade B</h2>
        <h1><?php  else: ?></h1>
            <h3 style="color: red;">Grade C</h3>
        <h1><?php endif; ?></h1>
    </div>


    <div>
        <!-- wajib tambahkan break; di setiap selesai statement di case -->
         <!-- default jika tidak ada statement tidak sesuai dengan variabel -->
        <?php
        
            $warna = "biru";
            switch($warna){
                case "merah": //jika var $warna adalah merah, outputnya adalah warna kesukaan anda merah
                    echo "warna kesukaan anda merah";
                break;
                case "biru": //jika var $warna adalah biru, outputnya adalah warna kesukaan anda biru
                    echo "warna kesukaan anda biru";
                break; 
                default: //jika var $warna adalah bukan merah dan biru, outputnya adalah warna kesukaan anda tidak di ketahui
                    echo "warna kesukaan anda tidak di ketahui";
            }
        
        ?>
    </div>


</body>
</html>