<?php if (isset($_GET['code'])) { die(highlight_file(__FILE__, 1)); }?>
<?php
require ('conf2.php');
//tabeli Inimene täitmine
function lisaInimene($eesnimi, $perekonnanimi, $maakond_id){
    global $yhendus;
    $paring=$yhendus->prepare("
INSERT INTO inimene(eesnimi, perekonnanimi, maakond_id) VALUES(?,?,?)");
    $paring->bind_param("ssi", $eesnimi, $perekonnanimi, $maakond_id);
    $paring->execute();

}

//tabeli Maakond täitmine
function lisaMaakond($maakond_nimi){
    global $yhendus;


    $insert_query = null;

    // check if the maakond already exists
    $check_query = $yhendus->prepare("SELECT id FROM maakond WHERE maakond_nimi = ?");
    $check_query->bind_param("s", $maakond_nimi);
    $check_query->execute();
    $check_query->store_result();

    if ($check_query->num_rows > 0) {
        $_SESSION["error_message"] = "Maakond '$maakond_nimi' juba eksisteerib!";
    } else {

        $insert_query = $yhendus->prepare("INSERT INTO maakond(maakond_nimi) VALUES(?)");
        $insert_query->bind_param("s", $maakond_nimi);
        $insert_query->execute();
    }

    $check_query->close();


    if ($insert_query) {
        $insert_query->close();
    }
}


// rippLoend tabelist maakonnad
function selectLoend($paring, $nimi){
    global $yhendus;
    $paring=$yhendus->prepare($paring);
    $paring->bind_result($id, $andmed);
    $paring->execute();
    $tulemus="<select name='$nimi'>";
    while($paring->fetch()){
        $tulemus .="<option value='$id'>$andmed</option>";
    }
    $tulemus .="</select>";
    return $tulemus;
}
// inimeste näitamine tabelist
function inimesteKuvamine($sort="", $otsisona=""){
    global $yhendus;
    $sort_list = array("eesnimi", "perekonnanimi", "maakond_nimi");
    if(!in_array($sort, $sort_list)) {
        return "Seda tulpa ei saa sorteerida";
    }
    $paring = $yhendus->prepare("SELECT inimene.id, eesnimi, perekonnanimi, maakond.maakond_nimi
    FROM inimene, maakond 
    WHERE inimene.maakond_id = maakond.id
    AND (eesnimi LIKE '%$otsisona%' OR perekonnanimi LIKE '%$otsisona%' OR maakond_nimi LIKE '%$otsisona%')
    ORDER by $sort");
    $paring->bind_result($id, $eesnimi, $perekonnanimi, $maakond_nimi);
    $paring->execute();
    $andmed = array();
    while($paring->fetch()) {
        $inimene = new stdClass();
        $inimene->id = $id;
        $inimene->eesnimi = htmlspecialchars($eesnimi);
        $inimene->perekonnanimi = htmlspecialchars($perekonnanimi);
        $inimene->maakond_nimi = $maakond_nimi;
        array_push($andmed, $inimene);
    }
    return $andmed;
}
//inimeste andmete muutmine tabelis
function muudaInimene($inimene_id, $eesnimi, $perekonnanimi, $maakond_id){
    global $yhendus;
    $paring=$yhendus->prepare("UPDATE inimene SET 
                   eesnimi=?, perekonnanimi=?, maakond_id=?
                   WHERE inimene.id=?");
    $paring->bind_param("ssii", $eesnimi, $perekonnanimi, $maakond_id, $inimene_id);
    $paring->execute();
}




if (isset($_POST["delete_inimene"])) {
    if (isset($_POST["delete_id"])) {
        kustutaInimene($_POST["delete_id"]);
        header("Location: index.php");
        exit();
    }
}

function kustutaInimene($id) {
    global $yhendus;
    $paring = $yhendus->prepare("DELETE FROM inimene WHERE id = ?");
    $paring->bind_param("i", $id);
    $paring->execute();
    // Optionally, you may want to check if the deletion was successful
    if ($paring->affected_rows > 0) {
        $_SESSION["success_message"] = "Inimene kustutatud edukalt!";
    } else {
        $_SESSION["error_message"] = "Inimest ei õnnestunud kustutada!";
    }
    $paring->close();
}
