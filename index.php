<?php
require_once 'vendor/autoload.php';
require_once 'DBwork.php';

$loader= new Twig_Loader_Filesystem("theme");
$twig = new \Twig\Environment($loader);//$twig = new Twig_Enviroment($loader);


if (($_SERVER["REDIRECT_URL"]=='/')||(explode('/',$_SERVER["REDIRECT_URL"])[1]=='cat'))
    include "home.php";
elseif (explode('/',$_SERVER["REDIRECT_URL"])[1]=='state')
    include "state.php";
else
    exit("запрашиваемой страницы не существует");
?>