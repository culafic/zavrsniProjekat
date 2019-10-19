<?php

function setComments($conn)
{
    if (isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $id = $_POST['id'];

        $sql = "INSERT INTO comments (uid, date, message, id) VALUES ('" . $uid . "', '" . $date . "', '" . $message . "', '" . $id . "')";
        $result = $conn->query($sql);
    }
}

function getComments($conn)
{
   
    $sql = "SELECT cid, date, message, users.username FROM `comments` JOIN `users` ON
    `comments`.`id` = `users`.`id`
    ORDER BY date desc";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id = $row['cid'];

        echo "<div id='reply-main' class=' mb-4 mb-sm-5 zoom container'>";
        echo $row["username"] . '<br>';
        echo $row["date"] . '<br>';
        echo nl2br($row["message"]); // omogucava line breaks

        if ($_SESSION['userUid']==$row["username"]) {
            echo " 
                <form method='POST' action='editcomment.php'>
                    <input type='hidden' name='cid' value='" . $row['cid'] . "'>
                    <input type='hidden' name='uid' value='" . $row['username'] . "'>
                    <input type='hidden' name='date' value='" . $row['date'] . "'>
                    <input type='hidden' name='message' value='" . $row['message'] . "'>
                    <button type='submit' class='log btn btn-pinkdark text-warning'> Izmeni </button>
                </form>";

            echo "
                <form method='POST' action='includes/deleteComment.inc.php'>
                    <input type='hidden' name='cid' value='" . $row['cid'] . "'>              
                    <button type='submit' name='commentDelete' class='log btn btn-pinkdark text-warning'> Izbriši </button>
                </form>";
            }
            echo "</div>";
       
    }
}
