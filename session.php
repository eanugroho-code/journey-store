<?php
session_start();
if ($_SESSION['login'] == false) {
    header('location: login.php');
}
if (!isset($_SESSION['browser']) || !isset($_SESSION['ip']) || empty($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['browser'] != md5($_SERVER['HTTP_USER_AGENT']) || $_SESSION['IP'] != $_SERVER['remote_addr']) {
    header("Location: login.php");
    exit;
}
