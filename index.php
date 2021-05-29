<?php

session_start();

include "config.php";
include "vendor/autoload.php";

$msg = "";

$errmsg = "";

if(isset($_POST['submit'])){
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    $nome = $con->real_escape_string($_POST['nome']);
    $cognome = $con->real_escape_string($_POST['cognome']);
    $email = $con->real_escape_string($_POST['email']);
    $telefono = $con->real_escape_string($_POST['telefono']);

    $query = mysqli_query($con, "SELECT * FROM tbl_trial_no_verify WHERE nome='$nome' AND cognome='$cognome' email='$email' AND telefono='$telefono'");

    if($nome == "" || $cognome == "" || $email == "" || $telefono == ""){

      $errmsg = "Completa tutti i campi!";

    }else{
    if($query->num_rows == 1){
        $errmsg = "Account già registrato";
    }else{
        $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);

        $_SESSION['email'] = $email;

        mysqli_query($con, "INSERT INTO tbl_trial_no_verify(nome,cognome,email,telefono,token,stato) VALUES('$nome','$cognome','$email','$telefono','$token','0')");

        header("Location: credenziali.php");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Prova gratuita | Informatica Today Hotspot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tema bootstrap 3 per Hotspot Mikrotik">
    <meta name="author" content="Lentino Loris (Informatica Today)">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

<style>
    .reparto-otp{display:none;}
</style>
</head>

  <body>

<div id="registrazione">
    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading text-center">Registrati per ottenere la prova gratuita di 15 minuti</h2>
        <?php if($errmsg != ""){ ?>
          <div class="alert alert-danger">
            <?= $errmsg ?>
          </div>
        <?php } ?>
        <input type="text" class="form-control" name="nome" placeholder="Nome">
        <input type="text" class="form-control" name="cognome" placeholder="Cognome">
        <input type="email" class="form-control" name="email" placeholder="Indirizzo E-Mail"><br>
        <input type="number" class="form-control" name="telefono" placeholder="Numero di telefono"><br>
        <button class="btn btn-large btn-primary" name="submit" type="submit">Registrati</button>
      </form>

    </div> <!-- /container -->
    </div>

    <div id="reparto-otp" class="reparto-otp">
    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Inserisci L'OTP</h2>
        <?php if($errmsg != ""){ ?>
          <div class="alert alert-danger">
            <?= $errmsg ?>
          </div>
        <?php } ?>
        <?php if($msg != ""){ ?>
          <div class="alert alert-success">
            <?= $msg ?>
          </div>
        <?php } ?>
        <input type="text" class="input-block-level" name="otp" placeholder="Codice Ricevuto">
        <button class="btn btn-large btn-primary" name="conferma-otp" type="submit">Conferma</button>
      </form>

    </div> <!-- /container -->
    </div>
  </body>
</html>
