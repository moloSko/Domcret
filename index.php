<?php
require "db.php";

if(isset($_SESSION['logged_user']))
{
    header("Location:".$site_url."/glav/persone");
}
else
{
    header("Location:".$site_url."/login/index");
}
?>
