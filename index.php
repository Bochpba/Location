<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css" />
    <title>Document</title>
</head>
<?php
session_start();
$_SESSION['vald'] = 0;
?>
<body>
    <div class="container">
        <div class="box3">
            <div class="box"></div>
            <div class="box1">
            <img src="logo.png">
            <h1>Sistema de Agendamento</h1>
            <form method="POST" action="login_ctrl.php">
                <input type="text" id="login" name="login" value="" placeholder=" Nome de Usuário"><br><br>
                <input type="password" id="senha" name="senha" value="" placeholder=" Senha..."><br><br>
                <button type="submit">Login</button>
                <p id="div" style="margin-left: 20px;"></p>
            </form>
    <?php
       if (isset($_SESSION['bool'])){
        if($_SESSION['bool'] != null){
            echo "Login ou senha incorretos.";
            $_SESSION['bool'] = null;
        }
    }
    ?>
</div>
</div>
</div>
    
  </body>
</html>