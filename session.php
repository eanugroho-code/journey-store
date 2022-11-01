<?php
session_start();
if ($_SESSION['login'] == false) {
    header('location: index.php');
}
if (!isset($_SESSION['browser']) || !isset($_SESSION['ip']) || empty($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if ($_SESSION['browser'] != md5($_SERVER['HTTP_USER_AGENT']) || $_SESSION['IP'] != $_SERVER['remote_addr']) {
    header("Location: index.php");
    exit;
}
