<?php require("conf2.php"); ?>

<?php
global $yhendus;
$paring = $yhendus->prepare("SELECT id, content FROM jokes");
$paring->bind_result($id, $content);
$paring->execute();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tunniplaan</title>
    <link href="adaptive.css" rel="stylesheet" type="text/css" />
    <link href="tabelid.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<div id="menu">
    <a href="strir.php">Штирлиц</a>
    <a href="prog.php">Программисты</a>
    <a href="prog2.php">Программист 2</a>
    <a href="prog3.php">Программист 3</a>
    <a href="prog4.php">Программист 4</a>
</div>

<div id="content">
    <div id="header">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("menu").style.left = "0";
    }

    function closeNav() {
        document.getElementById("menu").style.left = "-250px";
    }
</script>
</div>
</body>
</html>
