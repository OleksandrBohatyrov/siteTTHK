<?php
$kasutaja = 'd123169_oleksand';
$serverinimi='d123169.mysql.zonevs.eu';
$parool='Bp113+~Rqw';
$andmebaas='d123169_andmebaas';
$yhendus=new mysqli($serverinimi, $kasutaja, $parool, $andmebaas);
$yhendus->set_charset('UTF8');