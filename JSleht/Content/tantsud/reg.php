<?php
require_once("conf.php");
global $yhendus;

// Check if fields in the login form are filled
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    // Remove any potentially harmful input
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    // Perform additional security check on the password
    $cool = "superpaev";
    $kryp = crypt($pass, $cool);

    // Check if the user and password exist in the database
    $kask = $yhendus->prepare("SELECT kasutaja, onAdmin FROM kasutaja WHERE kasutaja=? AND parool=?");
    $kask->bind_param("ss", $login, $kryp);
    $kask->bind_result($kasutaja, $onAdmin);
    $kask->execute();

    // If the user exists, create a session and redirect
    if ($kask->fetch()) {
        $_SESSION['tuvastamine'] = 'misiganes';
        $_SESSION['kasutaja'] = $login;
        $_SESSION['onAdmin'] = $onAdmin;
    
        // Close the modal using JavaScript before redirecting
        echo '<script>window.close();</script>';
    
        if ($onAdmin == 1) {
            header('Location: adminLeht.php');
        } else {
            header('Location: haldusleht.php');
            $yhendus->close();
            exit();
        }
    } else {
        $loginFailureMessage = "Kasutaja $login või parool on vale";
        $yhendus->close();
    }
}
?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
    <h1>Login</h1>
    <?php if (isset($loginFailureMessage)) : ?>
        <p><?php echo $loginFailureMessage; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        Login: <input type="text" name="login"><br>
        Password: <input type="password" name="pass"><br>
        <input type="submit" value="Logi sisse">
    </form>
</div>
