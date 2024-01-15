<?php require("p2is.php"); ?>
<?php
require('conf2.php');
global $yhendus;

$paring = $yhendus->prepare("SELECT id, content FROM jokes WHERE id = 4");
$paring->bind_result($id, $content);
$paring->execute();
$paring->fetch();
?>
<link rel="stylesheet" href="tabelid.css">
<div class="container">
<h2>Анекдот про программиста 2</h2>
<p>
    <?php echo $content; ?>
</p>
</div>
