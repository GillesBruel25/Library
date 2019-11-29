<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'].' - '; }?>My Library </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <link rel="icon" href="img/icons8-book-shelf-64.png" type="image/png" />
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <img src="img/icons8-book-shelf-64.png" />
        <h1> Welcome on My Library </h1>
    </header>

    <span class="dropdown"> <a href="#start_div"> <img src="img/icons8-double-down-48" alt="dropdown" /> </a></span>

    <div class="functionnality">
        <section class="box1">
            <img src="img/icons8-services-64 (1).png" />
            <h3> Manage your Library </h1>
        </section>
        <section class="box2">
            <img src="img/icons8-user-groups-filled-50 (1).png" />
            <h3> Notify yours users </h1>
        </section>
    </div>
    <div class="start_div" id="start_div">
        <span onclick="display(document.querySelector('body .cover'))"> Start </span>
    </div>

    <!-- Login div -->
    <div class="cover">
        <img src="img/Close.png" alt="Close button"  onclick="display(this.parentNode)">
        <fieldset>
            <legend> Sign in </legend>
            <form action="signin.php" method="post">
                <label for="name"> Name <input type="text" placeholder="Enter your Name ..." name="name" id="name"> </label>
                <label for="password"> Password <input type="password" placeholder="Enter your Password ..." name="password" id="password"> </label>
                <label class='button'> <input type="submit" value="Sign in"> </label>
            </form>
        </fieldset>
    </div>

    <!-- footer -->
    <footer>
        <section class="box1"> 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id repudiandae modi quae? Repudiandae illum, quia nobis nostrum minima quos esse facilis amet, eos eveniet dolor vitae ex maiores provident.
        </section>
        <section class="box1"> 
            #2 
        </section>
        <section class="box1"> 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente veniam nemo minima incidunt corporis maxime dolore nulla, tempora aut aliquid, qui cum nisi error sint impedit saepe non inventore at!
        </section>
    </footer>
</body>
</html>