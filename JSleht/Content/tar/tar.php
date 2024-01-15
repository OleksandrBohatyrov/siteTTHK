<?php
require('conf2.php');
global $yhendus;
if(isset($_REQUEST["kustuta"])) {
    $paring = $yhendus->prepare("DELETE FROM tarpv22 WHERE id=?");
    $paring->bind_param("i", $_REQUEST["kustuta"]);
    $paring->execute();
}
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TARpv22</title>
    <link rel="stylesheet" href="/JSleht/style/styleTar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#nupp1").click(function () {
                $(".sec_3").slideToggle();
            });
        });
    </script>
</head>

<div class="container">
<body>
    <h1>TARpv22</h1>
    <input type="button" id="nupp1" value="Slide" onclick="Slide()">
    <div id="lingid">
        <section class="sec_3" >
        <?php
        global $yhendus;
        $paring=$yhendus->prepare("SELECT id, nimi,perenimi FROM tarpv22");
        $paring->bind_result($id, $nimi, $perenimi);
        $paring->execute();

        echo "<ul>";
        while ($paring->fetch()) {
            echo "<li>";
            echo "<a href='tar.php?id=$id'>".$nimi."</a></li>";
        }
        echo "</ul>";
        echo "<a href='tar.php?Lisa=jah'>lisa...</a>"
        ?>
    </div>
    <div id="sisu">
        <?php
        global $yhendus;
        if(isset($_REQUEST["id"])) {
            $paring = $yhendus->prepare("SELECT id, nimi, perenimi, address FROM tarpv22 WHERE id=?");
            $paring->bind_param("i", $_REQUEST["id"]);
            $paring->bind_result($id, $nimi, $perenimi, $address);
            $paring->execute();

            if ($paring->fetch()) {
                echo "<p>Nimi on ".$nimi;
                echo "<br>Perenimi on ". $perenimi;
                $fullAddress = 'http://' .$address;
                echo "<br><a href='$fullAddress' target='_blank'>Address</a>";
                echo "</p>";

                echo "<a href='tar.php?kustuta=$id' style='text-decoration: none; color: blue;'>Kustuta</a>";
            }
        }

        //lisamine
        if (isset($_REQUEST["Lisamisvorm"]) && !empty($_REQUEST["nimi"])) {
            $paring=$yhendus->prepare("INSERT INTO tarpv22(nimi, perenimi, address) values (?,?,?)");
            $paring->bind_param("sss", $_REQUEST["nimi"], $_REQUEST["perenimi"], $_REQUEST["address"]);
            $paring->execute();
            header("Location: tar.php");
            exit();
        }
        ?>
    </div>
    <?php
    if (isset($_REQUEST["Lisa"])) {
        ?>
        <form action="tar.php" method="post">
            <input type="hidden" value="jah" name="Lisamisvorm">
            <br>
            <label for="nimi">Nimi</label>
            <input type="text" id="nimi" name="nimi">
            <br>
            <label for="perenimi">Perenimi</label>
            <input type="text" id="perenimi" name="perenimi">
            <br>
            <label for="address">Address</label>
            <input type="text" id="address" name="address">
            <br>
            <input type="submit" value="Submit">
        </form>
        <?php
    }
    ob_end_flush();
    ?>
</body>
</div>
</section>
</html>
