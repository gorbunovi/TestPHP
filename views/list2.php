
        <article class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="medium-7 large-9 cell">
                    <?php
                    if (empty($this->user_data)) {
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
                include './views/form.php';
                ?>
            </div>
        </article>