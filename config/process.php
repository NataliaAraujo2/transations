<?php
session_start();

include_once("connection.php");
include_once("url.php");

$id;

if (!empty($_GET)) {
    $id = $_GET["id"];
}
//Retorna os dados de uma movimentação
if (!empty($id)) {
    $query = "SELECT * FROM movements WHERE id=:id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $movements = $stmt->fetch();

} else {
    //Retorna todos os dados
    $movements = [];

    $query = "SELECT * FROM movements";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $movements = $stmt->fetchAll();
}
?>