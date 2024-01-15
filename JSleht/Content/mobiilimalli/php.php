<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Свежее сообщение</title>
</head>
<body>

<?php
// Чтение сообщения из файла
$messageFilePath = 'message.txt.txt';
$message = file_get_contents($messageFilePath);

// Чтение данных об авторе из файла
$authorFilePath = 'author.txt.txt';
$authorData = file($authorFilePath, FILE_IGNORE_NEW_LINES);
?>

<div style="text-align: center;">
    <h1>Свежее сообщение</h1>
    <p><?php echo $message; ?></p>
</div>

<div style="position: fixed; bottom: 10px; right: 10px;">
    <h3>Автор</h3>
    <ul>
        <?php
        foreach ($authorData as $line) {
            list($key, $value) = explode(':', $line, 2);
            echo '<li><strong>' . trim($key) . ':</strong> ' . trim($value) . '</li>';
        }
        ?>
    </ul>
</div>

</body>
</html>
