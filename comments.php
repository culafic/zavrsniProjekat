<?php
require 'header.php';
?>

<!--MAIN STARTS HERE-->
<main class="main-comments" style="background-image: url('images/assets/pink1.jpg')">

    <!-- MAIN-COMMENTS-INFO STARTS HERE-->
    <?php
    if (isset($_SESSION['userId'])) {
        echo '
        <main  class="main-logged-comments">
      
        <section class="comments-logged-sweet mb-5 mb-sm-0">
            <div class="comments-logged-sweet-wall">
                <div class="main-logged-comments-info p-3 position-absolute text-center pinkdark opacityEntrance">
                    <h2 class="mb-4 ">Dobrodosli na blog Sweet Cakes!</h2>
                    <h5 class="mb-0 ">Ovde možete da ostvaljate svoje komentare, da nas pitate sve sto zelite,  a mi cemo se potruditi da Vam u sto kracem roku odgovorimo.</h5>                
                </div>
            </div>
        </section>
       
        <section class="mb-3 mb-sm-4 container">
        <form method="POST" action="'. setComments($conn) .'" class="form-inline comments-item-form justify-content-between align-items-start py-2">
            <input type ="hidden" name= "uid" value="'.$_SESSION['userUid'].'">
            <input type ="hidden" name= "id" value="'.$_SESSION['userId'].'">
            <input type ="hidden" name= "date" value="' . date("Y:m:d H:i:s") . '">
            <div class="container">
                <div class="row justify-content-center  no-gutters p-2 ">
                    <div class="col-md-8">
                        <div class="form-group mb-5">
                            <label for="content-message">Unesite ovde svoju poruku:</label>
                            <textarea name="message"  rows="3" class="form-control w-100 mb-md-0" id="content-message"
                            required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="commentSubmit" class="cbutton btn" value="Posalji" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </section>
    </main>';

        getComments($conn);

    } else {
        echo '
        <div class="main-comments-info p-3 position-absolute text-center opacityEntrance pinkdark">
            <h1 class="mb-5 ">Dobrodosli na blog Sweet Cakes!</h1>
            <h5 class="mb-3 ">Neophodno je da se ulogujete, da biste ostavili komentar.</h5>
            <a type="btn" href="./login.php" class="log btn btn-pinkdark text-warning">Ulogujte se</a>
        </div>
        ';
    }
    ?>
    

    <!--MAIN-COMMENTS-INFO ENDS HERE-->

</main>
<?php
require 'footer.php';
?>