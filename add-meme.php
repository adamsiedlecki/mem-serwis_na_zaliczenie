<?php
session_start();
require_once 'database.php';
if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
        
        $result = getUserByName($_POST['login']);

        // if($result->num_rows != 1){
        //     header('Location: login.php');
		//     exit();
        // }
        
        $user = $result->fetch_assoc();
        $password = $_POST['password'];
        
        //echo $user;
		if ($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_id'] = $user['id'];
            $_SESSION['username'] =$user['login'];
			unset($_SESSION['bad_attempt']);
		} else {
			$_SESSION['bad_attempt'] = true;
			header('Location: login.php');
			exit();
		}
	} else {
		header('Location: login.php');
		exit();
	}
}
?>

<html>
<head>
    <title>Mem-serwis</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet"> 
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
                    <?php
                        if (!isset($_SESSION['logged_id'])) {
                            echo '<li><a class="menu-item" href="register.php">REJESTRACJA</a></li>';
                            echo '<li><a class="menu-item" href="login.php">LOGOWANIE</a></li>';
                        }
                    ?>
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
                <div class="meme">
                    <form action="upload.php" method="POST" ENCTYPE="multipart/form-data">
                    <input type="file" name="plik"/><br/>
                    <input type="submit" value="Wyślij plik"/>

                    </form>
                    
                </div>
                <?php
                    echo "Twoje memy: </br>";
                    $result = getCurrentUserMemes($_SESSION['logged_id']);

                    while($row = $result->fetch_assoc()){

                        echo '<div class="meme">';
                        $username = getLoginById($row['user_id']);
                        echo '<img class="memeimg" src="meme/'.$row['filename'].'"> 
                        <p>'.$username." ".$row['date'].'</p>';

                        echo '<form action="delete.php" method="POST" ">
                        <input  type="hidden" value="'.$row['id'].'" name="memeid"/><br/>
                        <input type="submit" value="Usuń powyższego mema z systemu"/>
    
                        </form>';
                        echo '</div>';
                        echo "</br></br></br> </br>";
                    }
                    ?>
        </div>
    </div>

</body>
</html>