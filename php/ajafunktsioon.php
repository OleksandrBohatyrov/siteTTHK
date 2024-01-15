<!DOCTYPE html>
<html>
<head>
    <title>PHP ajafunktsioon</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
<div class="container">
    <div class="cont">
<header>
    <h1>Ajafunktsioonid</h1>
</header>
        <br>
<?php
    include('navigatsioon.php');
?>
<!-- PHP koodi osa -->
<div id="eesti_kuud">
    <?php
    $paev=date('d');
    $kuu=date('m');
    $aasta=date('Y');

    echo "Täna on: ".$paev.".".$kuu.".".$aasta."a";
    $eesti_kuud=array(1=>'jaanuar', 'veebruar', 'märts', 'aprill', 'mai', "juuni", 'juuli', "august", "september", "october", "november", "detsember");
    $kuu_sonadega=$eesti_kuud[date('n')];
    echo "<br>";
    echo "Eestis täna on: ".$paev.".".$kuu_sonadega.".".$aasta;
    ?>
</div>
        <br>
        <div id="timezone">
            <h2>date_default_timezone()</h2>
            <?php
                date_default_timezone_set('Australia/Sydney');
                echo date_default_timezone_get();
                echo  date('l d.m.Y G:i', time());
                ?>
        </div>
</div>
</div>
</body>
</html>
