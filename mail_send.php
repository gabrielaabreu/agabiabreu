<?php

$error = "";

$nome = $_POST["nome"];

//email
if (empty($_POST["email"])) {
    $error .= "Email is required ";
} else {
    $email = $_POST["email"];
}

 
$To = "gabi@agabiabreu.com";
$uglySubject = "[Site | Contato]";
$Subject='=?UTF-8?B?'.base64_encode($uglySubject).'?=';

$Body .= "$nome e $email";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Transfer-Encoding: 8bit" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: $email" . "\r\n";
 
// send email
$success = mail($To, $Subject, $Body, $headers);
 
// redirect to success page
if ($success && $error == ""){
   echo "success";
}else{
    if($error == ""){
        echo "Algo deu errado... Mas deu errado num nível, que é melhor você nos ligar no telefone (21) 3490-9292, porque pelo site vai ser difícil.";
    } else {
        echo $error;
    }
}
 
?>