<?php

if(! isset($_SESSION)){
    session_start(); // 啟動 session 功能
}


if(isset($_SESSION['myvar'])){
    $_SESSION['myvar']++;
} else {
    $_SESSION['myvar'] = 1;
}

echo $_SESSION['myvar'];


