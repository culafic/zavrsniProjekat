<?php
require 'header.php';

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {

    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error .= '
        <main>     
            <section class="login" id="login">
                <div class="main-sweet-wall">
                    <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                        <p>Neispravna email adresa!</p>
                    </div>
                </div>
            </section>
        </main>';
    } else {
        $sel_query = "SELECT * FROM `users` WHERE email='" . $email . "'";
        $results = mysqli_query($conn, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .=
                '<main>     
                <section class="login" id="login">
                    <div class="main-sweet-wall">
                        <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                            <h5>Nijedan korisnik nije registrovan sa ovom e-mail adresom!
                            <a href ="javascript:history.back()">Vratite se nazad.</a></h5>
                        </div>
                    </div>
                </section>
            </main>';
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
    } else {
        $expFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d") + 1,
            date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5(2418 * 2 . $email);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        // Insert Temp Table
        mysqli_query(
            $conn,
            "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
        );
        $recoverLink = "http://localhost/zavrsniProjekat/reset-password.php?key=" . $key . "&email=" . $email . "&action=reset";
        $output = '<p>Dear user,</p>';
        $output .= '<p>Please click on the following link to reset your password.</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p><a href="' . $recoverLink . '" target="_blank">' . $recoverLink . '</a></p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
        $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
        $output .= '<p>Thanks,</p>';
        $output .= '<p>AllPHPTricks Team</p>';
        $body = $output;
        $subject = "Password Recovery - AllPHPTricks.com";

        $email_to = $email;
        $mailFrom = "anmcakes123@gmail.com";
        require("PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = false;
        $mail->Username = "anmcakes123@gmail.com"; // Enter your email here
        $mail->Password = "cakescakes123"; //Enter your password here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = $mailFrom;
        $mail->FromName = "ANM Project";
        $mail->Sender = $mailFrom; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {

            echo '
            <main>     
                <section class="login" id="login">
                    <div class="main-sweet-wall">
                        <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                            <h5>Poslat je e-mail sa instrukcijama za resetovanje šifre.</h5>
                        </div>
                    </div>
                </section>
            </main>';
        }
    }
} else {
    ?>

    <!--MAIN STARTS HERE-->
    <main>
        <!--SECTION LOGIN STARTS HERE-->
        <section class="login" id="login">
            <div class="main-sweet-wall">
                <div class="login-wrapper position-absolute text-center p-3 p-md-4">
                    <form method="post" action="" name="reset" class="login-form m-auto">
                        <div class="form-group mb-4">
                            <label><strong>Unesite vašu e-mail adresu:</strong></label> <br><br>
                            <input type="email" name="email" class="form-control" placeholder="username@email.com">
                        </div>
                        <div class="form-group mb-4">
                        <button class="btn btn-lg" type="submit">Resetujte šifru</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php } ?>

<?php
require 'footer.php';
?>