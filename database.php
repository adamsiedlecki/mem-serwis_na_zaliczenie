<?php
    // //TESTY
    // getDbConnection();
    // $result = getAllUsers();
    // $result = $result->fetch_assoc();
    // echo implode($result);

    // $result = getUserByName("admin");
    // $result = $result->fetch_assoc();
    // echo implode($result);

    //insertMeme("nazwa", 5);

    function getDbConnection(){
        $config = include_once("config.php");

        $host = $config['host'];
        $user = $config['user'];
        $password = $config['password'];
        $db = $config['db_name'];

        //echo $host.$user.$password.$db;
        $user = "root"; // TODO
        $db = "mem-serwis-db";
        try {
            $connection = new mysqli($host, $user, $password, $db);

            if($connection->connect_error){
                //echo "Connection failed.";
            }else{
                //echo " Connection was successful </br>";
            }
            return $connection;
        }catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
            return $error;
        }
    }

    // TABLE USERS
    function getAllUsers(){
        $connection = getDbConnection();
        $query = "SELECT * FROM users ";
        $result = $connection->query($query);
        $connection->close();
        return $result;
    }
    function getUserCount(){
        $connection = getDbConnection();
        $query = "SELECT COUNT(id) FROM users WHERE 1=1 ";
        $result = $connection->query($query);
        $connection->close();
        $result = $result->fetch_assoc();
        return $result['COUNT(id)'];
    }
    function getUserByName($username){
        $connection = getDbConnection();
        $stmt = $connection->prepare("SELECT * FROM users WHERE login=?");
        $stmt->bind_param("s", $username); // s is for string
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    function getLoginById($id){
        $connection = getDbConnection();
        $stmt = $connection->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i", $id); // i is for integer
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        $stmt->close();
        return $user['login'];
    }

    function deleteUserById($id){
        $connection = getDbConnection();
        $stmt = $connection->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id); // i is for integer
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    function insertNewUser($username, $password){
        //echo $username;
        $connection = getDbConnection();
        $stmt = $connection->prepare("INSERT INTO users VALUES(?,?,?,?)");
        $stmt->bind_param("isss", $id = 0, $username, $password, $role = "user"); // s is for string
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    //TABLE MEMES
    function getAllMemes(){
        $connection = getDbConnection();
        $query = "SELECT * FROM memes ";
        $result = $connection->query($query);
        $connection->close();
        return $result;
    }
    function insertMeme($filename, $userid){
        $date = getdate();
        $connection = getDbConnection();
        $stmt = $connection->prepare("INSERT INTO memes VALUES (?,?,?,NOW())");
        $stmt->bind_param("isi", $id = 0, $file=$filename, $userid); // s is for string
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    function getNewestMeme(){
        $connection = getDbConnection();
        $query = "SELECT * FROM memes ORDER BY date DESC LIMIT 1 ";
        $result = $connection->query($query);
        $connection->close();
        return $result;
    }
?>