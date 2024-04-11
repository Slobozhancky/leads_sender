<?php
session_start();
$title = "Home";

if ($_SESSION) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addlead();
}

require_once VIEWS . "/index.tpl.php";
