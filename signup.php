<?php
require 'header.php';
?>

<!--SECTION REGISTER STARTS HERE-->
<section class="register" id="register">
    <div class="main-sweet-wall">
        <div class="registration-wrapper position-absolute text-center p-3 scale-down-center">
            <h2>Registracija</h2>
            <h5 class="mb-4 mb-sm-5">Ako ste nas član, možete se prijaviti <a href="login.php">ovde</a>.</h5>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyfields') {
                    echo '<h6 class="text-danger"> Popunite sva polja! </h6><br> ';
                } elseif ($_GET['error'] == 'invaliduid') {
                    echo '<h6 class="text-danger"> Korisničko ime može da sadrži samo slova engleskog alfabeta i brojeve od 0 do 9!</h6><br>';
                } elseif ($_GET['error'] == 'invalidmail') {
                    echo '<h6 class="text-danger"> Unesite ispravnu email adresu!</h6><br>';
                } elseif ($_GET['error'] == 'passwordcheck') {
                    echo '<h6 class="text-danger"> Šifre se ne poklapaju! </h6><br>';
                } elseif ($_GET['error'] == 'weakpassword') {
                    echo '<h6 class="text-danger"> Koristite najmanje 8 znakova, uključujući velika i mala slova, i najmanje jednu cifru! </h6><br>';
                } elseif ($_GET['error'] == 'usertaken') {
                    echo '<h6 class="text-danger"> To korisničko ime je zauzeto! Pokušajte sa nekim drugim </h6><br>';
                }
            }

            if (isset($_GET['signup'])) {
                if ($_GET['signup'] == 'success') {
                    echo '<h6 class="text-success"> Uspešna registracija! </h6><br>';
                }
            }
            ?>
            <form action="includes/signup.inc.php" method='POST' class="registration-form m-auto">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <input type="text" name="uid" class="form-control" placeholder="Korisničko ime">
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="mail" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <input type="password" name="pwd" class="form-control" placeholder="Šifra">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="pwd-repeat" class="form-control" placeholder="Ponovite šifru">
                        </div>
                    </div>
                </div>

                <button class="btn btn-lg" type="submit" name="signup-submit">Registruj se</button>

            </form>

        </div>
    </div>
</section>
<!--SECTION REGISTER ENDS HERE-->

</main>
<!--MAIN ENDS HERE-->


<?php
require 'footer.php';
?>