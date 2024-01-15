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
<?php
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


?>
</body>
</html>