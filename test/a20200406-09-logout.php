<?php
    session_start(); // 啟動 session 功能
    unset($_SESSION['loginUser']);
    header('Location: a20200406-08-login.php');