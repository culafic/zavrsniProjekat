<?php
require 'header.php';
?>

<main class="main-comments" style="background-image: url('images/assets/pink1.jpg')">
    <?php
    $cid = $_POST['cid'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    echo '
  <div class="main-comments-info p-3 position-absolute text-center opacityEntrance pinkdark">
    <form method = "post" action="includes/editComment.inc.php" >
        <input type ="hidden" name= "cid" value="' . $cid . '">
        <input type ="hidden" name= "uid" value="' . $uid . '">
        <input type ="hidden" name= "date" value="' . $date . '">
        <textarea name="message">' . $message . '</textarea><br>
        <button type="submit" name="commentSubmit" class="log btn btn-pinkdark text-warning"> Izmeni </button>
    </form>
  </div>';
    ?>
</main>
<?php
require 'footer.php';
?>