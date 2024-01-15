<?php if (isset($_GET['code'])) {
    die(highlight_file(__FILE__, 1));
} ?>
<!DOCTYPE html> <!--html5 deklaratsioon-->
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oleksandr veebirakenduste leht</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <link rel="stylesheet" type="text/css" href="/adaptive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">



        $(document).ready(function (){

            $(".sec_1").mouseenter(function(){
                for (let i=0; i<9; i++) {
                    $(".sec_1").fadeOut();
                    $(".sec_1").fadeOut("slow");
                    $(".sec_1").fadeOut(3000);
                    $(".sec_1").breakAfter
                    $(".sec_1").fadeIn(2000);
                }
            });
        });

        $(document).ready(function (){

            $(".sec_2").mouseenter(function(){
                $(".sec_2").animate({
                    width: "800px"

                });

            });
        });

        function red() {
            $(".sec_3").css("color", "red");
        }

        function liigutus(event, ui){
            var asukoht=ui.offset;
            $("#vastusekiht").html(asukoht.top+" "+asukoht.left);
        }


        function hiireTegevus() {
            $(".sec_3").mouseenter(red);
            $("#pilt1").draggable();
            $("#pilt1").bind("drag", liigutus);
            $("#pilt2").draggable();
            $("#pilt2").bind("drag", liigutus);
            $("#pilt3").draggable();
            $("#pilt3").bind("drag", liigutus);

        }
        $(document).ready(function () {
            $("#nupp1").click(function () {
                $(".sec_3").slideToggle();
            });

        });


    </script>
</head>
<body onload="hiireTegevus()">
<div class="container">
    <div class="cont">
        <header>
            <?php //require1
            if (isset($_GET["veebileht"])) {
                include(''.$_GET["veebileht"]);

            }
            ?>
            <?php
            require('nav.php'); ?>
        </header>

        <main>
            <?php
            require('main.php'); ?>
        </main>
        <footer>

        </footer>
    </div>
</body>


<script type="text/javascript" src="/JSleht/js/common.js"></script>

</html>