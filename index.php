<?php 
    $firstname = $name = $email = $phone = $message = "";
    $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
    $isSuccess=false;
    $emailTo = "sechivincent@gmail.com";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput($_POST["name"]);
        $email = verifyInput($_POST["email"]);
        $phone = verifyInput($_POST["phone"]);
        $message = verifyInput($_POST["message"]);
        $isSuccess=true;
        $emailText ="";

        if(empty($firstname))
        {
            $firstnameError="Votre prénom SVP";
            $isSuccess=false;
        }
        else
            $emailText .= "FirstName : $firstname\n";
        if(empty($name))
        {
            $nameError="Votre nom SVP";
            $isSuccess=false;
        }
        else
            $emailText .= "Name : $name\n";
        if(!isEmail($email))
        {
            $emailError="Email invalide";
            $isSuccess=false;
        }
        else
            $emailText .= "email : $email\n";
        if(!isPhone($phone))
        {
            $phoneError="Numéro de téléphone invalide";
            $isSuccess=false;
        }
        else
            $emailText .= "phone : $phone\n";
        if(empty($message))
        {
            $messageError="Quelle est votre message ?";
            $isSuccess=false;
        }
        else
            $emailText .= "message : $message\n";

        if($isSuccess)
        {
            $headers = "From: $firstname $name <$email> \r\nReply-To: $email";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
            $firstname = $name = $email = $phone = $message = "";
        }
    }
    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/",$var);
    }
    function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="divider"> </div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-1">
                    <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="firstname">Prénom <span class="red">*</span></label>
                                    <input type="text"  id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname;?>">
                                    <p class="comment"><?php echo $firstnameError;?></p>
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Nom <span class="red">*</span></label>
                                    <input type="text"  id="name" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $name;?>">
                                    <p class="comment"><?php echo $nameError;?></p>
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email <span class="red">*</span></label>
                                    <input type="email"  id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email;?>">
                                    <p class="comment"><?php echo $emailError; ?></p>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone">Téléphone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" value="<?php echo $phone;?>">
                                    <p class="comment"><?php echo $phoneError;?></p>
                                </div>

                                <div class="col-md-12">
                                    <label for="message">Message <span class="red">*</span></label>
                                    <textarea id="message"  name="message" class="form-control" placeholder="Votre message" rows="4" value="<?php echo $message;?>"></textarea>
                                    <p class="comment"><?php echo $messageError?></p>
                                </div>

                                <div class="col-md-12">
                                    <p class="blue"><strong>* Ces informations sont requises</strong></p>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="button1" value="Envoyer">
                                </div>
                            </div>
                            <p class="thank-you" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'?>">Votre message a bien été envoyé. Merci de m'avoir contacté.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>