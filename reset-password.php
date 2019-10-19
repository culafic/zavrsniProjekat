<?php
require 'header.php';
include('includes/dbh.inc.php');

if (
    isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])
) {
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query(
        $conn,
        "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';"
    );
    $row = mysqli_num_rows($query);
    if ($row == "") {
        $error .= '
        <main>     
            <section class="login" id="login">
                <div class="main-sweet-wall">
                    <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                        <h2>Neispravan link</h2>
                        <p>Link je neispravan ili je istekao. 
                            Proverite da li ste dobro kopirali link iz mail-a ili ste već iskoristili ovaj ključ za deakivaciju.
                        </p>
                        <p><a href="http://localhost/zavrsniProjekat/index.php">Kliknite ovde</a> da resetujete šifru.</p>
                    </div>
                </div>
            </section>
        </main>';
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
            ?>

            <!--MAIN STARTS HERE-->
            <main>
                <!--SECTION LOGIN STARTS HERE-->
                <section class="login" id="login">
                    <div class="main-sweet-wall">
                        <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                            <form method="post" action="" name="update" class="login-form m-auto">
                                <div class="form-group mb-4">
                                    <input type="hidden" name="action" value="update" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label>Unesite novu šifru:</label>
                                    <input type="password" name="pass1" class="form-control" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Ponovo unesite novu šifru:</label>
                                    <input type="password" name="pass2" class="form-control" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="hidden" name="email" class="form-control" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="submit" name="reset-pwd" value="Resetujte šifru" class="btn btn-lg">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
<?php
        } else {
            $error .='
            <main>     
                <section class="login" id="login">
                    <div class="main-sweet-wall">
                        <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                            <h2>Link je istekao!</h2>
                            <p>Ovaj link je istekao. Validan je samo 24 časa nakon zahteva.<br /><br /></p>
                        </div>
                    </div>
                </section>
            </main>';
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
} // isset email key validate end


if (
    isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")
) {
    $error = "";
    $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    $error = "";
    $class = '
    <main>     
        <section class="login" id="login">
            <div class="main-sweet-wall">
                <div class="login-wrapper position-absolute text-center p-3 p-md-4">';
    $class2 ='   
                </div>
            </div>
        </section>
    </main>';
    
    if (!preg_match('@[A-Z]@', $pass1) || !preg_match('@[a-z]@', $pass1) || !preg_match('@[0-9]@', $pass1) || strlen($pass1) < 8) {
        $error .= $class .'<h5> Koristite najmanje 8 znakova, uključujući velika i mala slova, i najmanje jednu cifru! 
        <a href ="javascript:history.back()">Vratite se nazad.</a></h5>'.$class2;
    } elseif ($pass1 != $pass2) {
        $error .= $class .'<h5>Šifre se ne poklapaju. Obe šifre moraju biti iste.
        <a href ="javascript:history.back()">Vratite se nazad.</a></h5>'.$class2;
    }

    if ($error != "") {
        echo $error ."<br />";
    } else {
        $pass1 = password_hash($pass1, PASSWORD_DEFAULT);;
        mysqli_query(
            $conn,
            "UPDATE `users` SET `password`='" . $pass1 . "', `trn_date`='" . $curDate . "' 
WHERE `email`='" . $email . "';"
        );

        mysqli_query($conn, "DELETE FROM `password_reset_temp` WHERE `email`='" . $email . "';");

        echo '
    <main>     
        <section class="login" id="login">
            <div class="main-sweet-wall">
                <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                    <h5>Čestitamo! Vaša šifra je uspešno promenjena.</h5>
                    <h5><a href="http://localhost/zavrsniProjekat/login.php">Kliknite ovde</a> za prijavu.</h5>
                </div>
            </div>
        </section>
    </main>';
    }
}
?>

<?php
require 'footer.php';
?>