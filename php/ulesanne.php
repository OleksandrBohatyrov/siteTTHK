<!DOCTYPE html>
<html>
<head>
    <title>PHP ajafunktsioon</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
<header>
    <h1>Ajafunktsioonid</h1>
</header>
<?php
include('navigatsioon.php');
?>
<!-- PHP koodi osa -->
<?php
echo "<br>";
echo "<br>";
echo "<h2>Ülessanne. For tsükliga nädata 15 erinevad värvi massivist.</h2>";
$varvid = ["Black", "White", "Yellow", "Green","Red","Gray","Brow","Orange","Purple","Golden","Blue","Aqua","Orchid","Navy","Salmon"];
for ($x = 0; $x < 15; $x++) {
    echo "<span style='color:$varvid[$x]'>$varvid[$x]</span>";
    echo "<br>";
}


?>
</body>
</html>