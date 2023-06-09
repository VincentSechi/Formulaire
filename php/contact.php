<?php 

    $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);
    $emailTo = "sechivincent@gmail.com";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["firstname"] = verifyInput($_POST["firstname"]);
        $array["name"] = verifyInput($_POST["name"]);
        $array["email"] = verifyInput($_POST["email"]);
        $array["phone"] = verifyInput($_POST["phone"]);
        $array["message"] = verifyInput($_POST["message"]);
        $array["isSuccess"]=true;
        $emailText ="";

        if(empty($array["firstname"]))
        {
            $array["firstnameError"]="Votre prénom SVP";
            $array["isSuccess"]=false;
        }
        else
            $emailText .= "FirstName : {$array["firstname"]}\n";
        if(empty($array["name"]))
        {
            $array["nameError"]="Votre nom SVP";
            $array["isSuccess"]=false;
        }
        else
            $emailText .= "Name : {$array["name"]}\n";
        if(!isEmail($array["email"]))
        {
            $array["emailError"]="Email invalide";
            $array["isSuccess"]=false;
        }
        else
            $emailText .= "email : {$array["email"]}\n";
        if(!isPhone($array["phone"]))
        {
            $array["phoneError"]="Numéro de téléphone invalide";
            $array["isSuccess"]=false;
        }
        else
            $emailText .= "phone : {$array["phone"]}\n";
        if(empty($array["message"]))
        {
            $array["messageError"]="Quelle est votre message ?";
            $array["isSuccess"]=false;
        }
        else
            $emailText .= "message : {$array["message"]}\n";

        if($array["isSuccess"])
        {
            $headers = "From: {$array["firstname"]} {$array["name"]} <{$array["email"]}> \r\nReply-To: {$array["email"]}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
        }

        echo json_encode($array);
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