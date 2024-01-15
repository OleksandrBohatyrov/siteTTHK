<?php if (isset($_GET['code'])) {
    die(highlight_file(__FILE__, 1));
} ?>
<!DOCTYPE html> <!--html5 deklaratsioon-->
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oleksandr veebirakenduste leht</title>
    <link rel="stylesheet" type="text/css" href="./src/output.css">
    <link rel="stylesheet" type="text/css" href="./src/style.css">
    <link rel="stylesheet" type="text/css" href="/adaptive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
     
        <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
</head>
<body class="dark:bg-gray-800">
<header>
            <?php 
            if (isset($_GET["veebileht"])) {
                include(''.$_GET["veebileht"]);

            }
            ?>
            <?php 
            require('nav.php'); ?>
        </header>
<div class="container">


        <main>
     
            <?php 
            require('main.php'); ?>
        </main>
        <footer>
        <?php //require3
            require('footer.php'); ?>
        </footer>
        </div>
</body>


<script src="./node_modules/flowbite/dist/flowbite.min.js"></script>

</html>