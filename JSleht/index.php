<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Js tööde Oleksandr leht</title>
    <script src="js/joonisscript.js"></script>

    <link rel="stylesheet" type="text/css" href="/JSleht/style/styleTar.css">
    <link rel="stylesheet" type="text/css" href="/JSleht/style/tabelid.css">
    <script src="js/saiaScript.js"></script>
    <script src="js/sportVorm.js"></script>
    <script src="js/pallidScript.js"></script>
    <script src="js/kukkumine.js"></script>
    <link rel="stylesheet" type="text/css" href="style/formStyle.css">
</head>
<div class="container">
<body>
<!--sisu header.php failist-->
<?php
    include('header.php');
?>
<!--sisu nav.php failist-->
<?php
include('nav.php');
?>
<!--sisu content kaustast-->
<?php
if (isset($_GET["veebileht"])) {
    include('Content/'.$_GET["veebileht"]);

} else {
    echo "Tere, siin sa leiad minu Javascript tööd, kui sa clickid ";
}
?>

<br>
<br>
<!--sisu content kaustast-->
<?php
include('footer.php');
?>

</body>
</div>
</html>