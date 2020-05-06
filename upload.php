<?php
session_start();
$result = require_once 'database.php';

$max_rozmiar = 1024*1024;
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!';
    } else {
        // echo 'Odebrano plik. Początkowa nazwa: '.$_FILES['plik']['name'];
        // echo '<br/>';
        // if (isset($_FILES['plik']['type'])) {
        //     echo 'Typ: '.$_FILES['plik']['type'].'<br/>';
        // }
        $cwd = getcwd();
        move_uploaded_file($_FILES['plik']['tmp_name'],
                $cwd.'/meme/'.$_FILES['plik']['name']);


        $filename = $_FILES['plik']['name'];
        $userid = $_SESSION['logged_id'];
        insertMeme($filename, $userid);
        header('Location: all-memes.php');
		exit();
	}
    
} else {
   echo 'Błąd przy przesyłaniu danych!';
}

?> 