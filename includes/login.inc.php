<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $uid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($uid) or empty($password)) {
        header('Location: ../login.php?error=emptyfields');
        exit();
    } elseif (!filter_var($uid, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        header("Location: ../login.php?error=invaliduid");
        exit();
    } else {
        $sql = 'SELECT * FROM users WHERE username=? or email=?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../login.php?error=sqlerror');
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $uid, $uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header('Location: ../login.php?error=wrongpwd');
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userUid'] = $row['username'];

                    header('Location: ../login.php?login=success');
                    exit();
                }
            } else {
                header('Location: ../login.php?error=nouser');
            }
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
