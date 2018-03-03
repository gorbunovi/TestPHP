<?php
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
                    <?php
                    if (empty($_SESSION['logged_user_id'])) {
                    ?>
                        <h1>Вы не авторизованны</h1>
                    <?php
                    } else {
                    ?>    
                        <h1>Вы авторизованны</h1>  
                    <?php
                    }
                    ?>    
                </div>
                <?php
                include './form.php';
                ?>
            </div>
        </article>
            <?php
            include './footer.html';
            ?>
            <script src="js/vendor/jquery.js"></script>
            <script src="js/vendor/what-input.js"></script>
            <script src="js/vendor/foundation.js"></script>
            <script src="js/app.js"></script>
    </body>
</html>