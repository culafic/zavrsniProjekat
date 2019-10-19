<?php
require 'header.php';
?>

<!--MAIN STARTS HERE-->
<main>
    <!--SECTION LOGIN STARTS HERE-->
    <section class="login" id="login">
        <div class="main-sweet-wall">
            <div class="login-wrapper position-absolute text-center p-3 p-md-5 scale-in-center">

                <?php
                if (isset($_SESSION['userId'])) {
                    echo '<h2 class="text-info"> Dobrodošli, ' . $_SESSION['userUid'] . '.<br> Uspešno ste ulogovani!</h2>';
                } else {
                    echo '<h2>Prijava</h2>';
                    echo '<h5 class="mb-4 mb-sm-5">Ako niste naš član, možete se registrovati <a
                    href="signup.php">ovde</a>.</h5>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'wrongpwd' || $_GET['error'] == 'nouser') {
                            echo '<h6 class="text-danger">Korisničko ime i/ili lozinka je pogrešno </h6><br>';
                        } elseif ($_GET['error'] == 'emptyfields') {
                            echo '<h6 class="text-danger"> Popunite prazna polja! </h6> <br>';
                        }
                    }
                    echo '
                    <form action="includes/login.inc.php" method="POST" class="login-form m-auto">
                        <div class="form-group mb-5">
                            <input type="text" class="form-control" placeholder="Korisničko ime/E-mail" name="mailuid">
                        </div> 
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" placeholder="Šifra" name="pwd">
                        </div>
                        <div class="text-left lost-password  mb-4">
                            <a href="forgot-password.php"> Zaboravili ste šifru? </a>';

                    

                    echo '</div>
                        <button class="btn btn-lg" type="submit" name="login-submit">Prijavite se</button>
                    </form>';
                }
                ?>

            </div>
        </div>
    </section>
    <!--SECTION LOGIN ENDS HERE-->
</main>

<?php
require 'footer.php';
?>