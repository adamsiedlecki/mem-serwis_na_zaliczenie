<?php
session_start();
error_reporting(0);
require_once 'database.php';
if (isset($_SESSION['logged_id'])) {
    header('Location: index.php');
		exit();
}

if(isset($_POST['password1'])){
    $_SESSION['not-equal-passwords'] = false;
    $_SESSION['user-exists'] = false;
    $login = $_POST['login'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $user = getUserByName($login);
    //echo $user->fetch_assoc();
    if($row = $user->fetch_assoc()){
        $_SESSION['user-exists'] = true;
    }else{
        //echo "nic nie przeszkadza;";
        if($password1 == $password2){
            insertNewUser($login, password_hash($password1, PASSWORD_DEFAULT));
            $_SESSION['register-complete'] = true;
        }else{
            $_SESSION['not-equal-passwords'] = true;
        }
    }
}
?>

<html>
<head>
    <title>Mem-serwis</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="img/favicon.png">
    <meta charset="UTF-8">
    <meta name="author" content="Adam Siedlecki">
    <meta name="description" content="Just a school project">
</head>
<body>

    <div id="container">
        <div id="header">
            <h2>Mem-serwis by Adam Siedlecki</h2>
            <h4>Najmniejszy zbiór memów w internecie</h4>
            <div id="menu">
                <ul>
                    <li><a class="menu-item" href="index.php">STRONA GŁÓWNA</a></li>
                    <li><a class="menu-item" href="admin-panel.php">PANEL ADMINA</a></li>
                    <li><a class="menu-item" href="register.php">REJESTRACJA</a></li>
                    <li><a class="menu-item" href="login.php">LOGOWANIE</a></li>
                    <li><a class="menu-item" href="add-meme.php">DODAJ MEMA</a></li>
                    <li><a class="menu-item" href="all-memes.php">WSZYSTKIE MEMY</a></li>
                    <?php
                        if (isset($_SESSION['logged_id'])) {
                            echo '<li><a class="menu-item" href="logout.php">WYLOGUJ:'.$_SESSION['username'].'</a></li>';
                        }
                    ?>
                    <img class="logo" src="img/favicon.png">
                </ul>
            </div>
        </div>
        <div id="content">
                    </br>
                    <?php
                    if(isset($_SESSION['user-exists']) && $_SESSION['user-exists']){
                        echo "Użytkownik z taką nazwą już istnieje";
                    }else if(isset($_SESSION['not-equal-passwords']) && $_SESSION['not-equal-passwords']){
                        echo "Hasła nie są identyczne.";
                    }else if(isset($_SESSION['register-complete']) && $_SESSION['register-complete']){
                        echo "Zarejestrowano pomyślnie. Spróbuj się zalogować.";
                    }

                    ?>
                    </br> </br>
                <form method="POST" action="register.php">
                    Login: </br>
                    <input type="text" name="login"> </br>
                    Hasło: </br>
                    <input type="password" name="password1"> </br>
                    Powtórz hasło: </br>
                    <input type="password" name="password2"> </br>
                    <input type="submit" value="ZAREJESTRUJ SIĘ"> </br>
                </form>
        </div>
    </div>

</body>
</html>