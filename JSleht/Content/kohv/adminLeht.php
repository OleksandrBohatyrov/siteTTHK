<?php

session_start();

require_once('conf2.php');

function updateTopsepakis($id, $value)
{
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE kohviautomaat SET topsepakis = ? WHERE id = ?");
    $kask->bind_param("ii", $value, $id);
    $kask->execute();
    $kask->close();
}

function updateTopsejuua($id, $value)
{
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE kohviautomaat SET topsejuua = ? WHERE id = ?");
    $kask->bind_param("ii", $value, $id);
    $kask->execute();
    $kask->close();
}

function muuda($id, $topsepakis, $topsejuua)
{
    echo "<td>";
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='muuda_id' value='$id'>";
    echo "<input  style='width: 60%' type='number' name='topsepakis' value='$topsepakis'>";
    echo "</td>";
    echo "<td>" . $topsejuua . "</td>";
    echo "<td><input style='width: 90%' type='submit' value='Salvesta'></td>";
    echo "<td><input   style='width: 90%' type='submit' name='cancel' value='Cancel'></td>";
    echo "</form>";
    echo "</td>";
}

if (isset($_POST["muuda_id"])) {
    $muudaId = $_POST["muuda_id"];
    $newTopsepakis = $_POST["topsepakis"];

    // Обновление значений Topsepakis и Punktid
    updateTopsepakis($muudaId, $newTopsepakis);

    // Редирект для избежания повторной отправки формы при обновлении страницы
    header("Location: $_SERVER[PHP_SELF]");
    exit();
}

if (isset($_REQUEST["kohv"])) {
    global $yhendus;
    $id = $_REQUEST["kohv"];

    // Fetch the current value of topsejuua
    $currentTopsejuua = getCurrentTopsejuua($id);

    // Check if the subtraction would result in a negative value
    if ($currentTopsejuua >= 0 && $currentTopsejuua <= 50) {
        updateTopsejuua($id, $currentTopsejuua + 1);
    } else {
        echo "Punkte ei saa vähendada, kuna topsejuua on juba 0 või negatiivne.";
    }

    header("Location: $_SERVER[PHP_SELF]");
}
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

if(isset($_REQUEST["kustuta"])){
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM kohviautomaat WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

function lisaJook($jooginimi, $topsepakis, $topsejuua)
{
    global $yhendus;
    $kask = $yhendus->prepare("INSERT INTO kohviautomaat(joohinimi, topsepakis, topsejuua) VALUES (?, ?, ?)");
    $kask->bind_param("ssi", $jooginimi, $topsepakis, $topsejuua);
    $kask->execute();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jooginimi"], $_POST["topsepakis"], $_POST["topsejuua"])) {
    $jooginimi = $_POST["jooginimi"];
    $topsepakis = $_POST["topsepakis"];
    $topsejuua = $_POST["topsejuua"];

    // Add a new drink
    lisaJook($jooginimi, $topsepakis, $topsejuua);

    // Redirect to avoid form resubmission on page refresh
    header("Location: $_SERVER[PHP_SELF]");
    exit();
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


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Kohviautomaat</title>
    <script>
        function avaModalLog() {
            document.getElementById("modal_log").style.display = "flex";
        }

        function suleModalLog() {
            document.getElementById("modal_log").style.display = "none";
        }

        window.onclick = function (event) {
            var modalLog = document.getElementById("modal_log");
            if (event.target == modalLog) {
                suleModalLog();
            }
        }
    </script>
</head>
<?php
require ('nav.php');
?>
<body>

<div class="container">
    <h1>Kohviautomaat</h1>
    <h2>Administreerimis leht</h2>

    <table>
        <tr>
            <th>Joohinimi</th>
            <th>Topsepakis</th>
            <th>Kogus</th>
            <?php   if (!isset($_REQUEST["muutmine"]))
            { ?>
                <th>Muuda</th>
                <th>Kustuta</th>
            <?php }?>
        </tr>
        <?php
        global $yhendus;
        $kask = $yhendus->prepare("SELECT id, joohinimi, topsepakis, topsejuua FROM kohviautomaat");
        $kask->bind_result($id, $joohinimi, $topsepakis, $topsejuua);
        $kask->execute();
        $editingId = isset($_REQUEST["muutmine"]) ? $_REQUEST["muutmine"] : null;
        while ($kask->fetch()) {
            echo "<tr>";
            $joohinimi = htmlspecialchars($joohinimi);
            echo "<td>" . $joohinimi . "</td>";
            if (!isset($_REQUEST["muutmine"])) {
                echo "<td>" . $topsepakis . "</td>";
                echo "<td>" . $topsejuua . "</td>";
                echo "<td><a href='?muutmine=$id'>Muuda</a></td>";
                echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
            }

            else
            {
                if($editingId==$id)
                {
                    muuda($id, $topsepakis, $topsejuua);
                }
                else {
                    echo "<td>" . $topsepakis . "</td>";
                    echo "<td>" . $topsejuua . "</td>";
                    echo "<td><a href='?muutmine=$id'>Muuda</a></td>";
                    echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
                }

            }

                echo "</tr>";
            }
        ?>
    </table>

    <!-- Форма для добавления нового напитка -->
    <form action="" method="post">
        <label for="jooginimi">Lisa uus jooginimi</label>
        <input type="text" name="jooginimi" id="jooginimi" style="width: 15%">
        <label for="topsepakis">Lisa topsepakis</label>
        <input type="number" name="topsepakis" id="topsepakis" style="width: 15%">
        <label for="topsejuua">Lisa topsejuua</label>
        <input type="number" name="topsejuua" id="topsejuua" style="width: 15%">
        <br>
        <input type="submit" value="Lisa jooginimi" style="width: 15%">
    </form>
</div>

</body>
</html>
