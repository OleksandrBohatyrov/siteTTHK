<?php

if (isset($_GET['code'])) {die(highlight_file(__FILE__, 1)); }?>

<?php
require ('conf2.php');
//tabeli Inimene täitmine
// Добавление шутки в базу данных
function lisaJoke($content){
    global $yhendus;
    $paring = $yhendus->prepare("INSERT INTO jokes (content) VALUES (?)");
    $paring->bind_param("s", $content);
    $paring->execute();
}

// Получение всех шуток из базы данных
function kuvanetJokes($sort = "", $otsisona = ""){
    global $yhendus;
    $sort_list = array("id", "content", "timestamp");
    if (!in_array($sort, $sort_list)) {
        return "Seda tulpa ei saa sorteerida";
    }

    // Поиск по ключевому слову и сортировка
    $paring = $yhendus->prepare("SELECT * FROM jokes 
        WHERE content LIKE ? OR timestamp LIKE ?
        ORDER BY $sort");
    $search_term = "%$otsisona%";
    $paring->bind_param("ss", $search_term, $search_term);
    $paring->bind_result($id, $content, $timestamp);
    $paring->execute();

    $andmed = array();
    while ($paring->fetch()) {
        $joke = new stdClass();
        $joke->id = $id;
        $joke->content = htmlspecialchars($content);
        $joke->timestamp = $timestamp;
        array_push($andmed, $joke);
    }

    return $andmed;
}

function muudaJoke($id, $content){
    global $yhendus;
    $paring = $yhendus->prepare("UPDATE jokes SET content=? WHERE id=?");
    $paring->bind_param("si", $content, $id);
    $paring->execute();
}

// Удаление шутки из базы данных
function kustutaJoke($id) {
    global $yhendus;
    $paring = $yhendus->prepare("DELETE FROM jokes WHERE id = ?");
    $paring->bind_param("i", $id);
    $paring->execute();

    if ($paring->affected_rows > 0) {
        $_SESSION["success_message"] = "Шутка удалена успешно!";
    } else {
        $_SESSION["error_message"] = "Шутку не удалось удалить!";
    }
    $paring->close();
}