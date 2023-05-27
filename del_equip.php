<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once("conexao.php");

    $number = $_GET['del'];

    $del = "DELETE FROM equipamento WHERE id_equip = $number";
    mysqli_query($conn, $del);

    header('Location: ' . "tb_equipamento.php");

    ?>
</body>

</html>