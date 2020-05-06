<?php
    // //TESTY
    // getDbConnection();
    // $result = getAllUsers();
    // $result = $result->fetch_assoc();
    // echo implode($result);

    // $result = getUserByName("admin");
    // $result = $result->fetch_assoc();
    // echo implode($result);

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
    function getUserByName($username){
        //echo $username;
        $connection = getDbConnection();
        $stmt = $connection->prepare("SELECT * FROM users WHERE login=?");
        $stmt->bind_param("s", $username); // s is for string
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
?>