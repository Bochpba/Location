<?php
$sqli = "SELECT * FROM logim";
$pass = mysqli_query($conn, $sqli);

$found = false;
while ($logar = mysqli_fetch_assoc($pass)) {
  if ($_SESSION['vald'] == $logar['logim']) {
    $found = true;
    break;
  }
}
if (!$found) {
  header("location: index.php");
}
?>
