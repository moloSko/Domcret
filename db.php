<?php

require "libs/rb.php";

R::setup( 'mysql:host=localhost;dbname=test1','root', '' ); //'host','namebd','login_db','password_bd' - правило подкл

if (!R::testConnection() )
{
  exit('Нет подключения - Проверьте : host, namebd, login_db, password_bd.');
}

session_start();
