<?php
    session_start();
    
    if(!isset($_SESSION['name'])){
        header("location: index.php");
    }
    if(isset($_SESSION['name']) && isset($_SESSION['password']) && isset($_POST['search'])){
        $search = htmlspecialchars($_POST['search']);
        $bd = new PDO("mysql: host=127.0.0.1; dbname=my_library; charset=utf8", "root", "");
        $query = $bd->prepare("SELECT * FROM livres WHERE titre LIKE '%$search%'");
        $query->execute();
    }else
    if(isset($_SESSION['name']) && isset($_SESSION['password']) && !isset($_POST['search'])){

        $bd = new PDO("mysql: host=127.0.0.1; dbname=my_library; charset=utf8", "root", "");
        $query = $bd->query("SELECT * FROM livres WHERE 1");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?= $_SESSION['name']; ?> - My Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
    <link rel="icon" href="img/icons8-book-shelf-64.png" type="image/png" />
    <script src="js/script.js"></script>
</head>
<body>
    <div class="menu">
        <div class="top">
            <img src="img/icons8-book-shelf-64.png">
            <h1> My Library </h1>
            <h4> ~ <?= $_SESSION['name'];?> ~</h4>
        </div>
        <div class="bottom">
            <div onclick="window.location = 'app.php'"> <img src="img/icons8-books-48.png" alt=""> List all books <font color="red"> (<?= $query->rowcount();?>)</font> </div>
            <div onclick="window.location = 'manage.php'"> <img src="img/icons8-services-64.png" alt=""> Modify a book </div>
            <div onclick="window.location = 'logout.php'"> <img src="img/icons8-services-64.png" alt=""> Log out </div>
        </div>
    </div>

    <div class="content">
        <div class="search_bar">
            <form method="post">
                <input type="search" placeholder="Title of book" class="input" name="search">
                <input type="submit" value="Search" class="button">
            </form>
        </div>

        <div class="list">
            <?php
                while($book = $query->fetch()){
            ?>
            <div class="book">
                <img src="img/icons8-read-64" alt="">
                <div class="title" title="<?= $book['type'];?>">
                    <div class="top">Title</div>
                    <div> <?= $book['titre'];?> </div>
                </div>
                <div class="author">
                    <div class="top">Author</div>
                    <div> <?= $book['auteur'];?> </div>
                </div>
                <div class="edition">
                    <div class="top">Publishing house</div>
                    <div> <?= $book['edition'];?> </div>
                </div>
                <div class="code">
                    <div class="top">Bar code</div>
                    <div> <?= $book['code_bar'];?> </div>
                </div>
                <div class="qty">
                    <?= $book['qtte'];?>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
