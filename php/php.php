<!DOCTYPE html>
<html>
<head>
    <title>PHP tervitus</title>
</head>
<body>
<header>
<h1>PHP tervitus</h1>
</header>
<?php
include('navigatsioon.php');
?>
<!-- PHP koodi osa -->
<?php
echo "Tere hommikust";
$tekst = "TARpv22";
echo "<br>";
echo $tekst;
// Matemaatika tehed
$arv1 = 10;
$arv2 = 12;

echo "Liitmine: " . ($arv1 + $arv2);
echo "<br>";
echo "Lahutamine: " . ($arv1 - $arv2);
echo "<br>";
echo "Korrutamine: " . ($arv1 * $arv2);
echo "<br>";
echo "Jagamine: " . ($arv1 / $arv2);
echo "<br>";
echo "Arv1 ruudus: " . pow($arv1, 2);
echo "<br>";

//
echo "Massiivid. Variant 1";
$andmed = [
    "nimi" => "Oleksandr",
    "aadress" => "Sõpruse pst 182, Tallinn",
    "pilt" => "img/pilt.jpg",
    "koduleht" => "https://www.tthk.ee/"
];
echo "<br>";
echo "Nimi massiivist: <strong>" . $andmed["nimi"] . "</strong>";
echo "<br>";
echo "Aadress: <i>" . $andmed["aadress"] . "</i>";
echo "<br>";
echo "<img src='" . $andmed["pilt"] . "' alt='pilt'>";
echo "<br>";
echo "Koduleht: <a href='" . $andmed["koduleht"] . "' target='_blank'>link</a>";
echo "<br>";
echo "<hr>";

//
$nimi = ["Oleksandr", "Tallinn", "Sõpruse pst 182", "img/pilt.jpg", "https://www.tthk.ee/"];
echo "Nimi massiivist: <strong>" . $nimi[0] . "</strong>";
echo "<br>";
echo "Aadress: <i>" . $nimi[1] . "</i>";
echo "<br>";
echo "<img src='" . $nimi[3] . "' alt='pilt'>";
echo "<br>";
echo "Koduleht: <a href='" . $nimi[4] . "' target='_blank'>link</a>";

// Ülessanne. For tsükliga nädata 15 erinevad värvi massivist.
echo "<br>";
echo "<br>";
echo "<h2>Ülessanne. For tsükliga nädata 15 erinevad värvi massivist.</h2>";
$varvid = ["Black", "White", "Yellow", "Green","Red","Gray","Brow","Orange","Purple","Golden","Blue","Aqua","Orchid","Navy","Salmon"];
for ($x = 0; $x <= 15; $x++) {
        echo "<span style='color:$varvid[$x]'>$varvid[$x]</span>";
    echo "<br>";
}
//eralfa failide sisu:
//matemaatika.php
//masiivid.php
//ulesanne.php (tsükl + massiiv)
//ajafunktsioon.php


?>




</body>
</html>
