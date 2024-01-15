<?php
session_start();

require_once('conf2.php');

//punktide nulliks
if(isset($_REQUEST["punktid0"])){
    global$yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET punktid=0 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["punktid0"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}

// peitmine - скрывание
if(isset($_REQUEST["peitmine"])){
    global$yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET avalik=0 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["peitmine"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}

if(isset($_REQUEST["naitmine"])){
    global$yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET avalik=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["naitmine"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
if(isset($_REQUEST["kustutakomment"])){
    global$yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET kommentaarid=' ' WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutakomment"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Tantsud tähtedega</title>
</head>
<header>
    <?php
    require ('nav.php');
    ?>
</header>
<body>
<div class="container">
<h1>Tantsud tähtedega</h1>
<h2>Administreerimis leht</h2>
<table>
    <tr>
        <th>
            Tantsupaari nimi
        </th>
        <th>
            Punktid
        </th>
        <th>kuupäev</th>
        <th>Kommentaarid</th>
        <th>Avalik</th>
    </tr>
    <?php
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, tantsupaar, punktid, ava_paev, kommentaarid, avalik FROM tantsud");
    $kask->bind_result($id, $tantsupaar, $punktid, $paev, $komment, $avalik);
    $kask->execute();
    while($kask->fetch()){
        $tekst="Näita";
        $seisund="naitmine";
        $tekst2="Kasutaja ei näe";
        if ($avalik==1) {
            $tekst="Peida";
            $seisund="peitmine";
            $tekst2="Kasutaja näeb";
        }


        echo "<tr>";
        $tantsupaar=htmlspecialchars($tantsupaar);
        echo "<td>".$tantsupaar."</td>";
        echo "<td>".$punktid."</td>";
        echo "<td>".$paev."</td>";
        echo "<td>$komment</td>";
        echo "<td>".$avalik."/". $tekst2."</td>";
        echo "<td><a href='?kustutakomment=$id'>Kustuta kommentaar</a></td>";
        echo "<td><a href='?punktid0=$id'>Punktid nulliks!</a></td>";;
        echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
        echo "<td><a href='?$seisund=$id'>$tekst</a></td>";
        echo "</tr>";
    }

    ?>

</table>
</div>
</body>
</html>