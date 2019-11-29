<?php
    session_start();

    if(isset($_POST['name']) and isset($_POST['password'])){
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);
        $bd = new PDO("mysql: host=127.0.0.1; dbname=my_library; charset=utf8", "root", "");
        $query = $bd->prepare("SELECT * FROM admin WHERE name=? AND password=?");
        $query->execute(array($name, $password));
        $admin = $query->fetch();
        if($query->rowcount()){
            $_SESSION['name'] = $admin['name'];
            $_SESSION['password'] = $admin['password'];
            header("location: app.php");
        }
        else{
            header("location: index.php");
            echo "<script> alert('The name or password is incorrect !'); </script>";
        }
    }

?>