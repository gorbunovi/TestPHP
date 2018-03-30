
<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Тестовое задание по PHP</title>
        <script src="js/includeHTML.js"></script>
        <link rel="stylesheet" href="../css/foundation.css">
        <link rel="stylesheet" href="../css/app.css">
    </head>

    <body>
        <div class="title-bar "  data-responsive-toggle="example-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
        </div>

        <div class="top-bar" id="example-menu">
            <div class="top-bar-left">
                <ul class=" vertical medium-horizontal menu">
                    <li class="menu-text">Логотип</li>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/signup">Регистрация</a></li>
                    <li><a href="/list1">Страница1</a></li>
                    <li><a href="/list2">Страница2</a></li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                </ul>
            </div>
        </div>
    <br/>
    <br/>
    
    <?php $this->yieldView(); ?>
            
            

    <footer>
        <div class="row">
            <div class="grid-x expanded callout secondary">
                <div class="medium-12 large-12 small-12 text-center">Copyright © Наша компания, 2018</div>
            </div>
        </div>
    </footer>

    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/what-input.js"></script>
    <script src="../js/vendor/foundation.js"></script>
    <script src="../js/app.js"></script>
    </body>
    </html>

