<?php
session_start();
$result = require_once 'database.php';

$memeid = $_POST['memeid'];
$userid = $_SESSION['logged_id'];

$result = getMemeById($memeid);
while($row = $result->fetch_assoc()){
    if($row['user_id']==$userid){ // only owner of picture can delete it!
        deleteMemeById($memeid);
        unlink("meme/".$row['filename']);
    }
}

// header('Location: add-meme.php');
// exit();

?> 