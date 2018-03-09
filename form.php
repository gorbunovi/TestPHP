
    

<div class="medium-5 large-3 cell">
    <div class="callout secondary">
        
        <?php
            if (empty($_SESSION['logged_user_id'])) {
        ?>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                <?php// var_dump($_SERVER); ?>
                <div class="grid-x">
                    <div class="small-12 cell">
                        <label>Вход
                            <input type="text" placeholder="Login" name="username">
                        </label>
                    </div>
                    <div class="small-12 cell">
                        <label>
                            <input type="password" placeholder="Password" name="password">
                        </label>
                        <div>
                            <input id='checkbox' type="checkbox" name="remember_me"><label for="checkbox">Запомнить меня</label>
                        </div>    
                        <div class="button-group">
                            <button class="button" type="submit" value="Submit">Вход</button>
                            <a class="button" href="signup.php">Регистрация</a>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        } else {
            ?>
        <div>
                <a class="text-center">Привет <?php echo $this->user_data['username']; ?></a>
                <br/>
                <a class="button" href="exit.php">Выход</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>