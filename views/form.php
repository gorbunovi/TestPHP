
    

<div class="medium-5 large-3 cell">
    <div class="callout secondary">
        
        <?php
            if (empty($this->user_data)) {
        ?>
            <form action="" method="POST">
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
                            <a class="button" href="signup">Регистрация</a>
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
                <a class="button" href="/exit">Выход</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>