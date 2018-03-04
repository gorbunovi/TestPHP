<?php
$salt = 'RANDMO1231KJKLJ';
session_start();
include './db.php'; 
if(isset($_POST['submit'])){
	$username = trim($_POST['username']);
	$password1 = trim(crypt($_POST['password1'],$salt));
	$password2 = trim(crypt($_POST['password2'],$salt));
        
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = $db->query("SELECT * FROM `users` WHERE username =" . $db->quote($username));
		$data =$query->fetch(PDO::FETCH_ASSOC);
                    if(empty($data)) {
                       $query = $db->query("INSERT INTO `users` (username, password) VALUES (" . $db->quote($username) . ", (" . $db->quote($password1) . "))");
                       $_SESSION['mesage']='Всё готово, можете авторизоваться';
                       $home_url = 'http://' . $_SERVER['HTTP_HOST'];
                        header('Location: ' . $home_url);
                        
                        exit();
                    }
                    else {
                        echo 'Логин уже существует';
                    }

	}
}
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

                <div class="medium-7 large-6 cell">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
        
        <?php
        include './footer.html';
        ?>
        
    </body>
</html>