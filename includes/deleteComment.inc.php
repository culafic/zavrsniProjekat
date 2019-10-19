<?php

if (isset($_POST['commentDelete'])) {

    require 'dbh.inc.php';
    $cid = $_POST['cid'];
    $sql = "DELETE FROM comments WHERE cid='$cid'";
    $result = $conn->query($sql);
    header('Location: ../comments.php');
    exit();
}
