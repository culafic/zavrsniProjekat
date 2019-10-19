<?php

if (isset($_POST['reset-pwd'])) {

    require "dbh.inc.php";

    $password = isset($_POST["pass1"]) ? htmlspecialchars(strip_tags($_POST["pass1"]))  : "";
    $passwordRepeat = isset($_POST["pass2"]) ? htmlspecialchars(strip_tags($_POST["pass2"]))  : "";

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../reset-password.php?error=emptyfields");
        exit();
    } elseif (!preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) || !preg_match('@[0-9]@', $password) || strlen($password) < 8) {
        header("Location: ../reset-password.php?error=weakpassword");
        exit();
    } elseif ($password !== $passwordRepeat) {
        header("Location: ../reset-password.php?error=passwordcheck");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../reset-password.php");
    exit();
}
