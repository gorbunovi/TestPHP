<?php

$user_data = array();

include './authentication.php';

?>
<!DOCTYPE html>
    
<html class="no-js" lang="en" dir="ltr">
    <head>
        <?php
            include './head.html';
        ?>
    </head>
    <body>
        <?php
            include './topBar.html';
        ?>
        <dr/>
        <br/>
        <article class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="medium-7 large-9 cell">
                    <h1>Тестовое задание по PHP</h1>
                    <br/>
                    <?php echo $_SESSION['mesage']; ?>
                    <?php $_SESSION['mesage']=""; ?>
                </div>    
                <?php
                   
                    include './form.php';
                ?>
            </div>
        </article>
        
        <?php
            include './footer.html';
        ?>
        
    </body>
</html>
