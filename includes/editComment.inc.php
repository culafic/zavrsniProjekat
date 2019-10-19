<?php
 if (isset($_POST['commentSubmit'])) {
        require 'dbh.inc.php';
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "UPDATE comments SET message='$message' WHERE cid = '$cid'";
        $result = $conn->query($sql);

        header('Location: ../comments.php');
        exit();
    }
