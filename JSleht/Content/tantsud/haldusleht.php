<?php
require_once ('conf.php');
session_start();
//punktide lisamine
if(isset($_REQUEST["heatants"])){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET punktid = punktid+1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["heatants"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
//punktide vähendamine
if(isset($_REQUEST["pahatants"])){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET punktid = punktid-1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["pahatants"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_REQUEST["paarinimi"]) && !empty($_REQUEST["paarinimi"]) && isAdmin()){
    global $yhendus;
    $kask=$yhendus->prepare("INSERT INTO tantsud (tantsupaar,ava_paev) values (?, NOW())");
    $kask->bind_param("s", $_REQUEST["paarinimi"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
if(isset($_REQUEST["komment"])){
    if(isset($_REQUEST["uuskomment"]) && !empty(trim($_REQUEST["uuskomment"]))){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE tantsud SET kommentaarid=Concat(kommentaarid, ?) WHERE id=?");
    $kommentaarplus=$_REQUEST["uuskomment"]."\n";
    $kask->bind_param("si",$kommentaarplus, $_REQUEST["komment"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
    }
}
if(isset($_REQUEST["kustuta"])){
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM tantsud WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
function isAdmin(){
    return isset($_SESSION['onAdmin']) && $_SESSION['onAdmin'] == 1;
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
    <script>
        function closeModal() {
            window.opener.location.reload();
            window.close();
        }
        function avaModalLog() {
            document.getElementById("modal_log").style.display = "flex";
        }

        function avaModalReg() {
            document.getElementById("modal_reg").style.display = "flex";
        }

        function suleModalLog() {
            document.getElementById("modal_log").style.display = "none";
        }

        function suleModalReg() {
            document.getElementById("modal_reg").style.display = "none";
        }

        window.onclick = function (event) {
            var modalLog = document.getElementById("modal_log");
            if (event.target == modalLog) {
                suleModalLog();
            }

            var modalReg = document.getElementById("modal_reg");
            if (event.target == modalReg) {
                suleModalReg();
            }
        }
    </script>
</head>
    <?php
    require ('nav.php');
    ?>
<body>
<div id="modal_log">
        <div class="modal__window">
            <a class="modal__close" href="#">X</a>
            <?php
            require 'login.php';
            ?>
        </div>
    </div>
    <div id="modal_reg">
        <div class="modal__window">
            <a class="modal__close" href="#">X</a>
            <?php
            require 'register.php';
            ?>
        </div>
    </div>

<div class="container">
<h1>Tantsud tähtedega</h1>
<h2>Punktide lisamine</h2>
<table>
    <tr>
        <th>
            Tantsupaari nimi
        </th>
        <th>
            Punktid
        </th>
        <th>
            Kuupäev
        </th>
        <th>
            Kommentaarid
        </th>
        <th>
            Kommentaarid lisamine
        </th>
    </tr>
    <?php
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, tantsupaar, punktid, ava_paev, kommentaarid FROM tantsud WHERE avalik=1");
    $kask->bind_result($id, $tantsupaar, $punktid, $paev, $komment);
    $kask->execute();
    while($kask->fetch()){
        echo "<tr>";
        $tantsupaar=htmlspecialchars($tantsupaar);
        echo "<td>".$tantsupaar."</td>";
        echo "<td>".$punktid."</td>";
        echo "<td>".$paev."</td>";
        echo "<td>".nl2br(htmlspecialchars($komment))."</td>" ;
        if (!isAdmin()) {
        echo "<td>
        <form action='?'>
        <input type='hidden' name='komment' value='$id'>
        <input type='text' name='uuskomment' id='uuskomment' >
        <input type='submit' value='OK' >

        </form>
        ";


            echo "<td><a href='?heatants=$id'>Lisa +1 punkt</a></td>";
            echo "<td><a href='?heatantsDel=$id'>Lisa -1 punkt</a></td>";
        }

        echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
        echo "</tr>";
    }

    ?>
    <?php
        if (!isAdmin()) {
            ?>


    <form action="?">
        <label for="paarinimi">Lisa uus paar</label>
        <input type="text" name="paarinimi" id="paarinimi" style="width: 15%">
        <input type="submit" value="Lisa paar" style="width: 15%">
    </form>
    <?php
    }
        ?>
</table>
</div>
</body>
</html>