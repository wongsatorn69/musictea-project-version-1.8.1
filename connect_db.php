<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="up.png">
    <title>SMC Music&Tea House</title>
</head>
<body>
    <?php
    $host = "localhost";
    $user = "root" ;
    $pass = "" ;
    $db = "db_musictea" ;

    $condb = mysqli_connect($host,$user,$pass,$db);

    if(!$condb){
        die(mysqli_connect_error());
    }else{
        //echo "connect complete" ;
    }

    mysqli_set_charset($condb,"utf8") ;
    date_default_timezone_set("Asia/Bangkok") ;
    ?>
</body>
</html>