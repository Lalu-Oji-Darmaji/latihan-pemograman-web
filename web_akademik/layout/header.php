
<?php
    $kembali="";
    $class="";
    $page="kosong.php";
    if(isset($_POST["menu"])){
        $class="btnmenu";
        $kembali="Kembali";
        $page="menu.php";
    }

    if(isset($_POST["kembali"])){
        $class="";
        $kembali="";
        $page="kosong.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Web Akademik</title>
</head>
<link rel="stylesheet" href="style.css"/>
<body>
    <nav class="header"><div class="menu"><form action="" method="post"><button class="btnmenu" name="menu" value="menu">Menu</button> <button name="kembali" class="<?php echo $class; ?> kembali"><?php echo $kembali; ?></button></form></div><h1 class="judul">Aplikasi Web Akademik</h1></nav>
    
    <div class="container">
    <?php 
    include($page);
?>