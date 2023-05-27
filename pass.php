<?php
$sqli = "SELECT * FROM logim";
$pass = mysqli_query($conn, $sqli);
$logar = mysqli_fetch_assoc($pass);
?>
