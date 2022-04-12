<?php

require "../db.php";

$gl_sslk = ("Location:".$site_url."/glav/persone");

if(isset($_SESSION['logged_user'])){
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/pachmark.ico" type="img/x-icon">
        <title>Бульмень</title>
        <link rel="stylesheet" href = "css/main.css">
    </head>
    <body>
    <!--<H1>Привет мир!</H1>-->
    
    <!-- ##### Начало области заголовка ##### -->

    <header class="header_area" id="header_farch">
    </header>
    <!-- ##### Конец области заголовка ##### -->
    <nav id="navBar">
        <ul>
            <label for="gepleasurprised">
            <li class="icon right">
            <a>&#9776;</a>
            </li>
            </label>
            <input type="checkbox" id="gepleasurprised" style="display: none;" />
            <li class="menu-text"> <a href="<?php $gl_sslk ?>"><img class="log_forch" src="../img/pachmark.ico" width="24px" height="24px" alt="Бульмень">Бульмень</a></li>
            <li><a href="#">Магазин</a></li>
            <li><a href="#">На карте</a></li>
            <li class="right_pos"><a href="#"><span class="fontawesome-laptop"></span>Профиль</a><a href="#"><span class="fontawesome-shopping-cart"></span>Корзина</a><a href="../logout/logout" ><h2>Выйти</h2></a></li>
        </ul>
    </nav>
    <!--Главный-->
    <div class="row">
        <!--Главный раздел-->
        <main>
            <nav>
                <img src="../img/dlyashapki59.png" style="height: inherit; max-width: 100%;">
                <!--<p>Привет новый пользователь</p>-->
            </nav>
            <div class="rotbat">
                <div class="bloc-tov">
                <a href="#"><div>
                    <p>Название товара</p></br>
                    <img src="../img/foodanimals.png" alt="Товар*">
                    <em>Цена: ₽250</em>
                </div></a>
                </div>
            </div>
            <div class="rotbat">
                <div class="bloc-tov">
                <a href="#"><div>
                    <p>Название товара</p></br>
                    <img src="../img/bd.png" alt="Товар*">
                    <em>Цена: ₽250</em>
                </div></a>
                </div>
            </div>
            <div class="rotbat">
                <div class="bloc-tov">
                <a href="#"><div>
                    <p>Название товара</p></br>
                    <img src="../img/foodanimals.png" alt="Товар*">
                    <em>Цена: ₽250</em>
                </div></a>
                </div>
            </div>
            <div class="rotbat">
                <div class="bloc-tov">
                <a href="#"><div>
                    <p>Название товара</p></br>
                    <img src="../img/foodanimals.png" alt="Товар*">
                    <em>Цена: ₽250</em>
                </div></a>
                </div>
            </div>
            
        </main>
        <!--Панель управления-->
        <aside>

        </aside> 
        <!--Панель рекламы-->
        <aside>

        </aside> 
        <!--Подвал-низ страницы-->
        <footer>

        </footer> 
        <!-- -->
    </div>
    <!-- -->
    </body>

<?php
}
else{
    header("Location:".$site_url."/login/index");
}
?>