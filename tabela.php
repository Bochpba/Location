<?php
include "conexao.php";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$sql = "CREATE TABLE professores(
    id_prof int(11) NOT NULL AUTO_INCREMENT,   
    nome VARCHAR(300) NOT NULL, 
    aula VARCHAR(300) NOT NULL,
    position int(11) NOT NULL,
    datae DATE NOT NULL,
    PRIMARY KEY (id_prof)
    )";

$sqle = "CREATE TABLE equipamento(
    id_equip int(11) NOT NULL AUTO_INCREMENT,   
    equip VARCHAR(300) NOT NULL, 
    marca VARCHAR(300) NOT NULL,
    modelo VARCHAR(300) NOT NULL,
    cor VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_equip)
    )";

$sqli = "CREATE TABLE logim(
    id_log int(11) NOT NULL AUTO_INCREMENT,
    logtype BOOLEAN NOT NULL,   
    logim VARCHAR(300) NOT NULL,     
    senha VARCHAR(100) NOT NULL ,  
    PRIMARY KEY (id_log)  
    )";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sqle)  && mysqli_query($conn, $sqli)) {
    echo "Tabela criada com sucesso <br>";

    $sqladm = "INSERT INTO logim (logtype, logim, senha) VALUES (true, 'admin', '')";
    $sqlquip = "INSERT INTO equipamento (equip) VALUES ('este computador')";
    if  (mysqli_query($conn, $sqladm)){
        if  (mysqli_query($conn, $sqlquip)){
echo "usuario: admin <br> senha: ";
        }
    }
} else {
    echo "Erro ao criar tabela" + mysqli_error($conexao);
}

mysqli_close($conn);
?>