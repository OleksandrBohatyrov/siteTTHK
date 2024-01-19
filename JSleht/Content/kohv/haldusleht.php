<?php
if (isset($_GET['code'])) {
    die(highlight_file(__FILE__, 1));
}
require_once('conf.php');
session_start();

if (isset($_REQUEST["kohv"])) {
    global $yhendus;
    $id = $_REQUEST["kohv"];

    // Fetch the current value of topsejuua
    $currentTopsejuua = getCurrentTopsejuua($id);

    // Check if the subtraction would result in a negative value
    if ($currentTopsejuua >= 0 && $currentTopsejuua <= 50) {
        $kask = $yhendus->prepare("UPDATE kohviautomaat SET topsejuua = topsejuua + 1 WHERE id=?");
        $kask->bind_param("i", $id);
        $kask->execute();
    } else {
        echo "Punkte ei saa vähendada, kuna topsejuua on juba 0 või negatiivne.";
    }

    header("Location: $_SERVER[PHP_SELF]");
}

// Punktide vähendamine
if (isset($_REQUEST["kohv_"])) {
    global $yhendus;
    $id = $_REQUEST["kohv_"];

    $currentTopsejuua = getCurrentTopsejuua($id);

    if ($currentTopsejuua > 0) {
        $kask = $yhendus->prepare("UPDATE kohviautomaat SET topsejuua = topsejuua - 1 WHERE id=?");
        $kask->bind_param("i", $id);
        $kask->execute();
    } else {
        echo "Punkte ei saa vähendada, kuna topsejuua on juba 0 või negatiivne.";
    }

    header("Location: $_SERVER[PHP_SELF]");
}

if (isset($_REQUEST["raspak"])) {
    global $yhendus;
    $id = $_REQUEST["raspak"];

    $currentTopsejuua = getCurrentTopsejuua($id);

    if ($currentTopsejuua >= 0) {
        $kask = $yhendus->prepare("UPDATE kohviautomaat SET topsepakis = topsepakis - 1 WHERE id=?");
        $kask->bind_param("i", $id);
        $kask->execute();
        $kask2 = $yhendus->prepare("UPDATE kohviautomaat SET topsejuua  = topsejuua + 50 WHERE id=?");
        $kask2->bind_param("i", $id);
        $kask2->execute();
    }
    header("Location: $_SERVER[PHP_SELF]");

}
function getCurrentTopsejuua($id)
{
    global $yhendus;
    $kask = $yhendus->prepare("SELECT topsejuua FROM kohviautomaat WHERE id = ?");
    $kask->bind_param("i", $id);
    $kask->execute();
    $kask->bind_result($currentTopsejuua);
    $kask->fetch();
    $kask->close();

    return $currentTopsejuua;
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
                document.getElementById("modal_log").style.display = "none" ;
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
    <?php
    if(!isset($_SESSION["kasutaja"])) {
        echo "<h1 style='text-align: center;color: #ff0000;
        text-shadow: 0 0 20px #ff0000;'>Kohviautomaat</h1>";
        echo "<p class='kohv'><strong>Tere, tere.</strong> See on kohviautomaat. Siit saad sa jooki tellida. <br>Sortimendis on sellised joogid nagu tee, kohv, kakao. <br>Kui aga soovite juhtida automaati, siis on <strong>kasutajanimi 'admin', parool on 'sasa'.</strong> <br> Selleks, et kasutada, pead sa sisse astuma.</p>";
        echo "<img src='kohv.jpg' alt='Italian Trulli'>";
    }
    ?>
    <?php
    if(isset($_SESSION["kasutaja"])) {


        ?>


    <h1>Kohviautomaat</h1>
    <table>
        <tr>
            <th>
                Joohinimi
            </th>
            <th>
                Topsepakis
            </th>
            <th>
                Topsejuua
            </th>
            <th>
                Osta
            </th>
        </tr>
        <?php
        global $yhendus;
        $kask=$yhendus->prepare("SELECT id, joohinimi, topsepakis, topsejuua FROM kohviautomaat");
        $kask->bind_result($id, $joohinimi, $topsepakis, $topsejuua);
        $kask->execute();
        while($kask->fetch()){
            echo "<tr>";
            $joohinimi=htmlspecialchars($joohinimi);
            echo "<td>".$joohinimi."</td>";
            echo "<td>".$topsepakis."</td>";
            echo "<td>".$topsejuua."</td>";
            if (!isAdmin()) {


                echo "<td><a href='?kohv_=$id'>Osta 1</a></td>";
                echo "<td><a href='?raspak=$id'>Lahti pakkimine</a></td>";
            }
            else {
                echo "<td><a href='?kohv=$id'>Lisa +1 punkt</a></td>";
            }

        }

        ?>

    </table>
    </div>
    <?php
    }


    ?>
    </body>
    </html>