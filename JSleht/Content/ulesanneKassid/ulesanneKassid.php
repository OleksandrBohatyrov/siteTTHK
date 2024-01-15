<?php
require('conf2.php');
//andmete kustutamine tabelist
global $yhendus;
global $paring;

if(isset($_REQUEST["kustuta"])) {
    $paring = $yhendus->prepare("DELETE FROM kassid WHERE id=?");
    $paring->bind_param("i", $_REQUEST["kustuta"]);
    $paring->execute();
}

if (isset($_REQUEST["nimi"])) {
    $paring=$yhendus->prepare("INSERT INTO kassid(nimi, pilt, toug, varv) values (?,?,?,?)");
    $paring->bind_param("ssss", $_REQUEST["nimi"], $_REQUEST["pilt"], $_REQUEST["toug"], $_REQUEST["varv"]);
    //s-string, i-integer
    $paring->execute();
    header("location: $_SERVER[PHP_SELF]"); //aadressiribas kustutaks päring faili nimeni
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sündmused SQL tablist</title>
    <link rel="stylesheet" href="/style/formStyle.css">
</head>

<body>
<div class="container">
<h1>Kassid andmebaasi</h1>

<?php
$paring = $yhendus->prepare("SELECT id, nimi, pilt, toug, varv FROM kassid");
$paring->bind_result($id, $nimi, $pilt, $toug, $varv);
$paring->execute();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nimi</th>
        <th>Pilt</th>
        <th>Tõug</th>
        <th>Värv</th>
        <th>Kustuta</th>
    </tr>

<?php
while ($paring->fetch()) {
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$nimi</td>";
    echo "<td><img src='$pilt' alt='pilt' width='20%'></td>";
    echo "<td>$toug</td>";
    echo "<td><span style='background-color:$varv;'>$varv</span></td>";
    echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
    echo "</tr>";
}
$yhendus->close();
?>

</table>


<form action="" method="post">
    <table>
        <tr>
            <td>
                <label for="nimi">Nimi:</label>
            </td>
            <td>
                <input type="text" id="nimi" name="nimi">
            </td>
        </tr>
        <tr>
            <td>
                <label for="pilt">Pilt</label>
            </td>
            <td>
                <textarea class="area" name="pilt" id="pilt"></textarea>
            </td>
        </tr>
        <tr>
            <td><label for="toug">Tõug: </label></td>
            <td>
                <input type="text" id="toug" name="toug">
            </td>
        <tr>
            <td>
                <label for="varv">Värv: </label>
            </td>
            <td>
                <input type="color" id="varv" name="varv" value="#ff0000">
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Submit">

</form>
</div>
</body>

</html>
