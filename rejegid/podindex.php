<?php

  require "../db.php";

  $errors = array();

  if(isset($_SESSION['logged_user'])){
    $data = $_POST;
      if(isset($data['identivik'])){
        if(($_SESSION['logged_user']->codrefety) == (trim($data['codvera']))){
          $vs = $_SESSION['logged_user']->id;
          $vsend = R::load('users', $vs);
          $vsend->verifety = 1;
          $vsend->codrefety = NULL;
          R::store($vsend);
          header("Location:".$site_url."/glav/persone");
        }
        else{
          $errors[] = 'Данный код был введён не верно';
        }
      }
    }
?>


  <!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Бульмень - Подтверждение</title>
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
          <form action="podindex" method="POST">
              <fieldset class="clearfix">
                  <p><span class="fontawesome-ok-sign"></span><input type="text" name="codvera" value="Введите код" onBlur="if(this.value == '') this.value = 'Введите код'" onFocus="if(this.value == 'Введите код') this.value = ''" required></p>
                  <?php
                  if (isset($_POST['identivik'])){
                      if (!empty($errors)){
                          echo '<p style="color: red; display: flex; justify-content: center;">'.array_shift($errors).'</p><hr><br>';
                      }
                  }
                  ?>
                  <p><button type="submit" name="identivik">Подтверждение</button></p>
              </fieldset>
          </form>
      </div>
  </body>
  </html>