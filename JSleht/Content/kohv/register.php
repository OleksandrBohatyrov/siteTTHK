<?php
require_once("conf2.php");

if (isset($_SESSION['username']) && isset($_SESSION['userid']))
    echo '<script>window.location.href = "haldusLeht.php";</script>';  // redirect the user to the home page
if (isset($_POST['registerBtn'])){
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $passwd_again = $_POST['passwd_again'];


    // query the database to see if the username is taken
    global $yhendus;
    $kask= $yhendus->prepare("SELECT * FROM kasutaja WHERE kasutaja=?");
    $kask->bind_param("s",$username);
    $kask->execute();
    //$query = mysqli_query($yhendus, "SELECT * FROM kasutajad WHERE nimi='$username'");
    if (!$kask->fetch()){

        $id = '';
        $cool='superpaev';
        $krypt=crypt($passwd, $cool);
        $passwd_hashed = $krypt;
        $date_created = time();
        $last_login = 0;
        $status = 1;




        if ($username != "" && $passwd != "" && $passwd_again != ""){

            if ($passwd === $passwd_again){

                if ( strlen($passwd) >= 5 && strpbrk($passwd, "!#$.,:;()")){

                    mysqli_query($yhendus, "INSERT INTO kasutaja (kasutaja, parool) VALUES ('$username', '$passwd_hashed')");

                    $query = mysqli_query($yhendus, "SELECT * FROM kasutaja WHERE kasutaja='{$username}'");
                    if (mysqli_num_rows($query) == 1){

                        $success = true;
                    }
                }
                else
                    $error_msg = 'Sinu parool ei ole piisavalt tugev. Palun kasutage teist.';
            }
            else
                $error_msg = 'Sinu paroolid ei klappinud.';
        }
        else
            $error_msg = 'Palun täitke kõik nõutud väljad.';
    }
    else
        $error_msg = 'Kasutajanimi <i>'.$username.'</i> on juba võetud. Palun kasutage teist.';
}

else
    $error_msg = 'An esines viga ja teie kontot ei loodud.';


?>


<?php
// Kui on registreeritud -> näeme tulemusena jah/ei registreerimisel
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registreerinud
    if (isset($success) && $success){

        echo '<script>window.location.href = "haldusleht.php";</script>';
      

    }
    // Ei saanud registreerida
    else if (isset($error_msg)){
        echo '<div class=""><p style="color:red;">'.$error_msg.'</p></div>';
        $yhendus->close();
        exit();
        require ('haldusleht.php');
    }
} else {
    // Reg. vorm
    ?>
    <form action="./register.php" class="form" method="POST">

        <h1>Registreeri uus kasutaja</h1>

        <div class="">
            <input type="text" name="username" value="" placeholder="enter a username" autocomplete="off" required />
        </div>
        <div class="">
            <input type="password" name="passwd" value="" placeholder="enter a password" autocomplete="off" required />
        </div>
        <div class="">
            <p>parool peab olema vähemalt 5 tähemärki ja<br /> on eriline märk, nagu !#$.,:;()</font></p>
        </div>
        <div class="">
            <input type="password" name="passwd_again" value="" placeholder="confirm your password" autocomplete="off" required />
        </div>

        <div class="">
            <input class="" type="submit" name="registerBtn" value="create account" />
        </div>

        <!--
        <p class="center"><br />
            Already have an account? <a href="login.php">Login here</a>
        </p>
        -->
    </form>
    <?php
}
?>
