<?php
session_start();
require_once 'database.php';
if (!isset($_SESSION['logged_id'])) {

}else {
    header('Location: index.php');
    exit();
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
            <div id="login-form">
            </br>
                <?php

                    if (isset($_SESSION['bad_attempt'])) {
                        echo "Logowanie nie powiodło się";
                    }
                
                ?>

                <form method="POST" action="index.php">
                    Do potrzeb testowych: login to admin, hasło to password
                    </br> </br>
                    Login:
                    <input type="text" name="login" value=""> </br>
                    Hasło:
                    <input type="password" name="password"> </br> </br> 
                    <input type="submit" value="ZALOGUJ"> </br>
                </form>
            </div>
        </div>
    </div>

</body>
</html>