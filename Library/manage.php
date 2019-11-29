<?php
    session_start();
    
    if(!isset($_SESSION['name'])){
        header("location: index.php");
    }
    if(isset($_POST['code_bar']) && isset($_POST['delete'])){
        $msg = "<font color='red'> Failure to delete ! Verify the <em>Bar code</em></font>";
        $code = htmlspecialchars($_POST['code_bar']);
        $bd = new PDO("mysql: host=127.0.0.1; dbname=my_library; charset=utf8", "root", "");
        $query = $bd->prepare("DELETE FROM livres WHERE code_bar=?");
        $query->execute(array($code));
        if($query->rowcount()){
            $msg = " Successful Deleting !";
        }
    }else
    if(isset($_POST['code_bar']) && isset($_POST['modify']) && isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['edition']) && isset($_POST['type'])){
        $code = htmlspecialchars($_POST['code_bar']);
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $edition = htmlspecialchars($_POST['edition']);
        $type = htmlspecialchars($_POST['type']);
        $qtte = htmlspecialchars($_POST['qtte']);
        $msg = "<font color='red'> Failure to modify ! Checked the <em>Bar code</em> and fill in the fields</font>";
        $bd = new PDO("mysql: host=127.0.0.1; dbname=my_library; charset=utf8", "root", "");
        $query = $bd->prepare("UPDATE livres SET titre=?, auteur=?, edition=?, type=?, qtte=? WHERE code_bar=?");
        $query->execute(array($titre, $auteur, $edition, $type, $qtte, $code) );
        if($query->rowcount()){
            $msg = " Successful modification !";
        }
    }else
    if(isset($_POST['code_bar']) && isset($_POST['add']) && isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['edition'])){
        $code = htmlspecialchars($_POST['code_bar']);
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $edition = htmlspecialchars($_POST['edition']);
        $type = htmlspecialchars($_POST['type']);
        $qtte = htmlspecialchars($_POST['qtte']);
        $msg = "<font color='red'> Failure to Add book ! Checked the <em>Bar code</em> and fill in the fields</font>";
        $bd = new PDO("mysql: host=127.0.0.1; dbname=my_library; charset=utf8", "root", "");
        $query = $bd->prepare("INSERT INTO livres(code_bar, titre, auteur, edition, type, qtte) values(?, ?, ?, ?, ?, ?)");
        $query->execute(array($code, $titre, $auteur, $edition, $type, $qtte));
        if($query->rowcount()){
            $msg = " Successful insertion !";
        }
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
            <div onclick="window.location = 'app.php'"> <img src="img/icons8-books-48.png" alt=""> List all books  </div>
            <div onclick="window.location = 'manage.php'"> <img src="img/icons8-services-64.png" alt=""> Modify a book <font color="red"> ( * )</font></div>
            <div onclick="window.location = 'logout.php'"> <img src="img/icons8-services-64.png" alt=""> Log out </div>
        </div>
    </div>

    <div class="content" id="content">
        <div class="list" id="list">
        <fieldset id="add_box">
                <legend> Add book </legend>
                <form method="post">
                    <label for="code_bar">
                        Bar Code <input type="text" name="code_bar" id="code_bar">
                    </label>
                    <label for="titre">
                        Title Of Book <input type="text" name="titre" id="titre">
                    </label>
                    <label for="auteur">
                        Author <input type="text" name="auteur" id="auteur">
                    </label>
                    <label for="edition">
                        Publishing house <input type="text" name="edition" id="edition">
                    </label>
                    <label for="qtte">
                        Quantity <input type="number" name="qtte" id="qtte">
                    </label>
                    <label for="type">
                        Type 
                        <select name="type" id="type">
                            <option value="novel"> Novel</option>
                            <option value="manga"> Manga</option>
                            <option value="book"> Book</option>
                            <option value="newspaper"> Newspaper</option>
                            <option value="other"> Others</option>
                        </select>
                    </label>
                    <label for="">
                        <input type="submit" name="add">
                    </label>
                </form>
            </fieldset>

            <fieldset id="modify_box">
                <legend> Modify a book </legend>
                <form method="post">
                    <label for="code_bar">
                        Bar Code <input type="text" name="code_bar" id="code_bar">
                    </label>
                    <label for="titre">
                        Title Of Book <input type="text" name="titre" id="titre">
                    </label>
                    <label for="auteur">
                        Author <input type="text" name="auteur" id="auteur">
                    </label>
                    <label for="edition">
                        Publishing house <input type="text" name="edition" id="edition">
                    </label>
                    <label for="qtte">
                        Quantity <input type="number" name="qtte" id="qtte">
                    </label>
                    <label for="type">
                        Type 
                        <select name="type" id="type">
                            <option value="novel"> Novel</option>
                            <option value="manga"> Manga</option>
                            <option value="book"> Book</option>
                            <option value="newspaper"> Newspaper</option>
                            <option value="other"> Others</option>
                        </select>
                    </label>
                    <label for="">
                        <input type="submit" name="modify">
                    </label>
                </form>
            </fieldset>

            <fieldset id="delete_box">
                <legend> Delete a book </legend>
                <form method="post" title="The book will delete with all the amount present in library">
                    <label for="code_bar">
                        Bar Code <input type="text" name="code_bar" id="code_bar" placeholder="Enter a bar code of book">
                    </label>
                    <label for="">
                        <input type="submit" name="delete">
                    </label>
                </form>
            </fieldset>

            <section>
                <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
            </section>
        </div>
    </div>
</body>
</html>
