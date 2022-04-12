<?php
require "../db.php";

if(isset($_SESSION['logged_user']))
{
  header("Location:".$site_url."/glav/persone");
}
else
{
    $data = $_POST;

    if( isset($data['up_login']))
    {
    $errorse = array();
    $user = R::findOne('users', 'login = ?', array($data['logine']));

    if ( $user )
    {
        if(password_verify($data['lopass'], $user->password) ){
        $_SESSION['logged_user'] = $user;
        header("Location:".$site_url."/glav/persone");
        }
        else
        {
        $errorse[] = 'Пароль неверный';
        }
    }
    else
    {
        $errorse[] = 'Пользователь не найден';
    }

    if(!empty($errorse) )
    {
        /*echo '<div style="color: red;">'.array_shift($errorse).'</div><hr>';*/
    }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Бульмень - Авторизация</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="icon" href="../img/pachmark.ico" type="image/x-icon">
</head>
<body>

<!-- верхний top bar -->
    <div class="farchmac-top">
        <a href="index">Бульмень<img src="../img/pachmark.ico" width="24px" height="24px" alt="Бульмень"></a>
    <div class="clr"></div>
    </div>
<!-- верхний top bar -->
    <div id="login">
        <form action="index" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" name="logine" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p>
                <p><span class="fontawesome-lock"></span><input type="password" name="lopass" value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p>
                <p><button type="submit" name="up_login">Войти</button></p>
                <?php
                if ( isset($_POST['up_login'])){
                    if (!empty($errorse)){
                        echo '<p style="color: red; display: flex; justify-content: center;">'.array_shift($errorse).'</p><hr><br>';
                    }
                }
                ?>
            </fieldset>
        </form>
        <p>Нет аккаунта? &nbsp;&nbsp;<a href="../rejegid/index">Регистрация</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</body>
</html>
