<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<?php
session_start();

?>
<body>
    <div class="container">
    <div class="boxs">
    <div class="box">
    <h1>Sistema de Agendamento</h1>
    <h2>LOGIN</h2>
    <form method="POST" action="login_ctrl.php">
        <input type="text" id="login" name="login" value="" placeholder="Login"><br><br>
        <input type="password" id="senha" name="senha" value="" placeholder="Senha"><br><br>
        <button type="submit">Entrar</button>
        <p id="div" style="margin-left: 20px"></p>
    </form>
    <?php
       
        if($_SESSION['bool'] != null){
            echo "Login ou senha incorretos.";
            $_SESSION['bool'] = null;
        }
        
    ?>
</div>
</div>
</div>
    
  </body>
</html>