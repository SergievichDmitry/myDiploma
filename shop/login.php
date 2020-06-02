<?php
    require "db.php";

    $data = $_POST;


    if( isset($data['do_login']))
        {
            $errors = array();
            $user = R::findOne('users', 'login = ?', array($data['login']));

            if($user)
            {
                //login is found
                if( password_verify($data['password'], $user->password)){
                    //all ok
                    $_SESSION['logged_user'] = $user;
                    header('location: index.php');
                } else
                {
                 $errors[] = 'Password not found';
                }
            } else
            {
                 $errors[] = 'Login not found';
            }

            if( ! empty($errors))
                    {
                        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
                    }
        }


?>


<link rel="stylesheet" href="css/login-registration.css">
<a href="index.php" class="link">Перейти на главную страницу</a><br>
<H3>Еще не зарегистрированы? Заведите аккаунт: </H3>
<a href="signup.php" class="link">Регистрация</a><br><br>
<H3>Чтобы войти в личный аккаунт, введите логин и пароль:</H3>
<form action="login.php" method="POST">
    <h2>Логин:</h2>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">

    <h2>Пароль:</h2>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>">

    <br><br><button type="submit" name="do_login">Войти</button>
</form>
