<h2>Tekstfunktrioonid</h2>
<?php
require('conf2.php');
global $yhendus;
global $paring;


function clearVarsExcept($url, $varname) {
    return strtok(basename($_SERVER['REQUEST_URI']),"?")."?$varname=".$_REQUEST[$varname];
    // zone.ee
   // return "?$varname=".$_REQUEST[$varname];
}

$tekst="November on viimane sygisekuu";
echo $tekst;
echo "<br>";

//kõik tähed väiksesed
echo strtolower($tekst);
echo "<br>";

//kõik tähed on suured
echo  strtoupper($tekst);
echo "<br>";

//iga sõna algab suure tähega

echo ucwords(strtolower($tekst));
echo "<br>";
//teksti pikkus
echo "Teksti pikkus on ".strlen($tekst);
echo "<br>";


//sõnade arv lauses
echo "lauses on ".str_word_count($tekst);
echo "<br>";

//eralda lauses alates 3 kokku 5 tähte
echo substr($tekst, 2, 5); // esimene täht
echo "<br>";
// tühiku asukoht
echo  "Esimese tühiku asukoht on ".strpos($tekst, " ");
//eralda 1 sõna lauses

echo "Esimene sõna lauses on ".substr($tekst, 0, strpos($tekst, " "));
echo "<br>";
//näita kõik sõna sõnad peale esimest

echo substr($tekst,strpos($tekst, " "), strlen($tekst)-strpos($tekst, " "));
//Mõistatus --> загадка
//Euroopa riik
// 5-6 подсказок, при помощи текстовых функций
?>
<br>
<?php
$riik = "Inglismaa";
echo "<br>";
echo "<strong>Mõistatus</strong>";
echo "<br>Sa pead vihjete järgi ära arvama riigi.";

echo "<ol>";
echo "<li >Riiginimi pikkus on " . strlen($riik) . "</li>";
echo "<li >Esimene kiri " . substr($riik, 0, 1) . "</li>";
echo "<li>Teine kiri " . substr($riik, 1, 1) . "</li>";
echo "<li>Viimane kiri " . substr($riik, -1) . "</li>";
echo "<li>Kas riik on Euroopas? Jah</li>";
echo "</ol>";
echo "</ol>";
?>
<strong>Kontroll:</strong>
<form name="kontroll" action="<?=clearVarsExcept(basename($_SERVER['REQUEST_URI']),"veebileht")?>" method='post'>
    <input type="text" name="kontroll">
    <input type="submit" value="ok">
</form>
<?php
if(isset($_REQUEST["kontroll"])){
    if($_REQUEST["kontroll"]==$riik){
        echo "Õige vastus";
        echo "<body style='background-color: green'>";
    } else{
        echo "vale vastus";
        echo "<body style='background-color: red'>";
    }
}
?>
