<?php
    require "db.php";

    $data = $_POST;
    if( isset($data['do_signup']))
    {//здесь регистрируем
        $errors = array();
        if(trim($data['login']) == '')
        {
            $errors[] = 'Enter login';
        }

        if(trim($data['email']) == '')
                {
                    $errors[] = 'Enter email';
                }

        if(trim($data['password']) == '')
                {
                    $errors[] = 'Enter password';
                }

        if(R::count('users', "login = ?", array($data['login'])) > 0 )
                        {
                            $errors[] = 'Login is already used';
                        }

        if(R::count('users', "email = ?", array($data['email'])) > 0 )
                                {
                                    $errors[] = 'Email is already used';
                                }

        if( empty($errors))
        {
            //all ok, register
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style="color: green;">Регистрация прошла успешно!</div><hr><a href="index.php" class="link">Перейти на главную страницу</a><br>';
        }
        else
        {
            echo phpversion();

            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>


<link rel="stylesheet" href="css/login-registration.css">
<a href="index.php" class="link">Перейти на главную страницу</a><br>
<H3>Уже зарегистрированы? Войдите в аккаунт: </H3>
<a href="login.php" class="link">Вход в систему</a><br><br>
<H3>Чтобы завести личный аккаунт, придумайте себе логин и пароль:</H3>

<form action="signup.php" method="POST">
    <h2>Ваш логин:</h2>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">

    <h2>Ваш Email:</h2>
    <input type="email" name="email" value="<?php echo @$data['email']; ?>">

    <h2>Ваш пароль:</h2>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>">

    <br><br><button type="submit" name="do_signup">Зарегистрироваться</button>
</form>

