<?php if (isset($_GET['code'])) {
    die(highlight_file(__FILE__, 1));
}

require ('conf2.php');
require ('funktsioonid.php');
$sort = "eesnimi";
$otsisona = "";
if(isset($_REQUEST["sort"])) {
    $sort = $_REQUEST["sort"];
}
if(isset($_REQUEST["otsisona"])) {
    $otsisona = $_REQUEST["otsisona"];
}
if (isset($_REQUEST["inimene_lisamine"])) {
    if (!empty(trim($_REQUEST["eesnimi"])) && !empty(trim($_REQUEST["perenimi"]))) {
        lisaInimene($_REQUEST["eesnimi"], $_REQUEST["perenimi"], $_REQUEST["maakond_id"]);
    } else {
        $_SESSION["error_message"] = "Eesnimi ja perenimi ei tohi olla tühjad!";
    }
    header("Location: index.php");
    exit();
}

if (isset($_REQUEST["maakonna_lisamine"])) {
    if (!empty(trim($_REQUEST["maakond_nimi"]))) {
        lisaMaakond($_REQUEST["maakond_nimi"]);
    } else {
        $_SESSION["error_message"] = "Maakond ei tohi olla tühjad!";
    }
    header("Location: index.php");
    exit();
}

if(isset($_REQUEST["salvesta"])){
    muudaInimene($_REQUEST["muuda_id"],$_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"], $_REQUEST["maakond_id"] );
}


$inimesed=inimesteKuvamine($sort, $otsisona);
?>

<!DOCTYPE html>
<html lang="et">

<head>
    <title>Inimesed ja maakonnad</title>
    <link rel="stylesheet" type="text/css" href="tabelid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<header>
    <h1>
        Oleksandr veebirakenduste leht
    </h1>
</header>
<div class="container">
    <body>

    <h1>Inimesed ja maakonnad</h1>

    <form action="index.php">
        <input type="text" name="otsisona" placeholder="Otsi...">
    </form>

    <br>
    <table>
        <tr>
            <th style="width: 8%;">id</th>
            <th><a href="index.php?sort=eesnimi">Eesnimi</a></th>
            <th><a href="index.php?sort=perekonnanimi">Perenimi</a></th>
            <th style="width: 15%"><a href="index.php?sort=maakond_nimi">Maakond</a></th>
        </tr>
        <tr>
            <form action="index.php">
                <td><input type="text" name="id" placeholder="Id"></td>   <!--1st line for lisamine-->
                <td><input type="text" name="eesnimi" placeholder="Eesnimi"></td>
                <td><input type="text" name="perenimi" placeholder="Perenimi"></td>
                <td><?php
                    echo selectLoend("select id, maakond_nimi from maakond", "maakond_id");
                    ?></td>
                <td colspan="2"><input type="submit" value="Lisa inimene" name="inimene_lisamine"></td>
            </form>
        </tr>


        <?php
        foreach ($inimesed as $inimene):
            ?>
            <tr>
                <?php if (!isset($_REQUEST["muutmine"]) || $inimene->id != intval($_REQUEST["muutmine"])): ?>
                    <td><?= $inimene->id ?></td>
                    <td><?= $inimene->eesnimi ?></td>
                    <td><?= $inimene->perekonnanimi ?></td>
                    <td><?= $inimene->maakond_nimi ?></td>
                    <td>
                        <a href="index.php?muutmine=<?= $inimene->id ?>">Muuda</a>
                    </td>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" name="delete_id" value="<?= $inimene->id ?>">
                            <input class="kustuta-button" type="submit" name="delete_inimene" value="Kustuta">
                        </form>
                    </td>


                <?php else: ?>
                    <!-- Display edit form -->
                    <form action="index.php">
                        <td><input type="hidden" style="width: 90%" name="muuda_id" value="<?= $inimene->id ?>"></td>
                        <td><input type="text" name="eesnimi" value="<?= $inimene->eesnimi ?>"></td>
                        <td><input type="text" name="perekonnanimi" value="<?= $inimene->perekonnanimi ?>"></td>
                        <td>
                            <?php
                            echo selectLoend("select id, maakond_nimi from maakond", "maakond_id");
                            ?>
                        </td>
                        <td><input type="submit" name="salvesta" style="width: auto" value="Salvesta"></td>
                        <td><input type="submit" name="cancel" value="Cancel" onclick="history.back()"></td>
                    </form>
                <?php endif; ?>
            </tr>

        <?php
        endforeach;
        ?>

    </table>


    <form action="index.php" method="post">
        <input type="text" name="maakond_nimi" placeholder="Maakonna nimi">
        <input type="submit" name="maakonna_lisamine" value="Lisa maakond">
    </form>


    </body>

</div>



</html>