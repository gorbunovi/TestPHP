
        <article class="grid-container">
            <div class="grid-x grid-margin-x">

                <div class="medium-7 large-6 cell">
                    <?php echo $this->message; ?>
                    <form method="POST" action="/signup">
                        <label for="username">Введите ваш логин:</label>
                        <input type="text" name="username">
                        <label for="password">Введите ваш пароль:</label>
                        <input type="password" name="password1">
                        <label for="password">Введите пароль еще раз:</label>
                        <input type="password" name="password2">
                        <button class="button" type="submit" name="submit">Регистрация</button>
                    </form>
                    
                </div>
                <div class="show-for-large large-3 cell">
                </div>
            </div>    
        </article>
        