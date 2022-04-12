<?php
require "../db.php";

if(isset($_SESSION['logged_user']))
{
  header("Location:".$site_url."/glav/persone");
}
else
{
    $data = $_POST;
    if( isset($data['up_singup'])){

    $errors = array();

    if( trim($data['login']) == '')
    {
        $errors[] = 'Введите логин';
    }

    if( trim($data['logemail']) == '')
    {
        $errors[] = 'Введите почту';
    }

    if( trim($data['logpass']) == '')
    {
        $errors[] = 'Введите пароль';
    }

    if( R::count('users', "email = ?", array($data['logemail'])) > 0 )
    {
        $errors[] = 'Почта уже существует';
    }

    if( R::count('users', "login = ?", array($data['login'])) > 0 )
    {
        $errors[] = 'Логин занят';
    }

    if(empty($errors) )
    {
        $codver = rand(999, 99999);
        $to = $data['logemail'];
        $subject = 'Подтвержение Регистрации на сайте - Бульмень';
        $message = '
        <html>
        <body>
          <p>Подтверждение аккаунта на сайте - Бульмень</p>
          <p>Введите данный код - '.$codver.'</p>
          <p>Перейдя по данной ссылке - <a href="http://domcret/rejegid/podindex">Ссылка для подтверждения</a></p>
        </body>
        </html>
        ';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['logemail'];
        $user->password = password_hash($data['logpass'],  PASSWORD_DEFAULT);
        $user->join_date = date('Y-m-d');
        $user->user_brows = $_SERVER['HTTP_USER_AGENT'];
        $user->user_host = $_SERVER['REMOTE_ADDR'];
        $user->status = 1;
        $user->verifety = 0;
        $user->codrefety = $codver;
        R::store($user);
        mail ($to, $subject, $message, $headers);
        $user = R::findOne('users', 'login = ?', array($data['login']));
        $_SESSION['logged_user'] = $user;
        header("Location:".$site_url."/rejegid/podindex");
    } else{
    }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Бульмень - Регистрация</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="icon" href="../img/pachmark.ico" type="image/x-icon">
</head>
<body>

    <div class="farchmac-top">
        <a href="index">Бульмень<img src="../img/pachmark.ico" width="24px" height="24px" alt="Бульмень"></a>
    <div class="clr"></div>
    </div>
<!-- верхний top bar -->
    <div id="login">
        <form action="index" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" name="login" value="Ваш логин" onBlur="if(this.value == '') this.value = 'Ваш логин'" onFocus="if(this.value == 'Ваш логин') this.value = ''" required></p>
                <p><span class="fontawesome-envelope"></span><input type="email" name="logemail" value="Ваш почта" onBlur="if(this.value == '') this.value = 'Ваш почта'" onFocus="if(this.value == 'Ваш почта') this.value = ''" required></p>
                <p><span class="fontawesome-lock"></span><input type="password"  name="logpass" placeholder="Введите пароль"></p>
                <p><button type="submit" name="up_singup">Регистрация</button></p>
                <?php
                if ( isset($_POST['up_singup'])){
                    if (!empty($errors)){
                        echo '<p style="color: red; display: flex; justify-content: center;">'.array_shift($errors).'</p><hr><br>';
                    }
                }
                ?>
            </fieldset>
        </form>
        <p>Есть аккаунт? &nbsp;&nbsp;<a href="../login/index">Авторизация</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</body>
</html>