<!DOCTYPE html>
<html>
<head>
    <title>PHP tervitus</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
<header>
<h1>PHP tervitus</h1>
</header>
<?php
include('navigatsioon.php');
?>
<!-- PHP koodi osa -->
<br>

<div id="first">
<?php
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
echo "<img src='". $andmed["pilt"] . "' alt='pilt'>";
echo "<br>";
echo "Koduleht: <a href='" . $andmed["koduleht"] . "' target='_blank'>link</a>";
echo "<br>";
echo "<hr>";
?>
</div >
<div id="right">


<?php
$nimi = ["Oleksandr", "Tallinn", "Sõpruse pst 182", "img/pilt.jpg", "https://www.tthk.ee/"];
echo "Nimi massiivist: <strong>" . $nimi[0] . "</strong>";
echo "<br>";
echo "Aadress: <i>" . $nimi[1] . "</i>";
echo "<br>";
echo "<img src='" . $nimi[3] . "' alt='pilt'>";
echo "<br>";
echo "Koduleht: <a href='" . $nimi[4] . "' target='_blank'>link</a>";

?>
</div>

</body>
</html>
