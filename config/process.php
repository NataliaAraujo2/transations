<?php
session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;
//Modificação no Banco
if (!empty($data)) {

       //Criar Movitação Atípica
    if ($data["type"] === "create") {

        $personType = $data["personType"];
        $documentNumber = $data["document"];
        $name = $data["name"];
        $transactionType = $data["transation"];
        $transactionDate = $data["date"];
        $transactionValue = $data["value"];
        $transactionDetail = $data["detail"];

        $query = "INSERT INTO movements (person_type,cpf_cnpj,name,transation, 
transation_date, transation_value, transation_detail) 
VALUES (:personType, :documentNumber, :name, :transactionType, :transactionDate,
:transactionValue, :transactionDetail)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":personType", $personType);
        $stmt->bindParam("documentNumber", $documentNumber);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":transactionType", $transactionType);
        $stmt->bindParam(":transactionDate", $transactionDate);
        $stmt->bindParam(":transactionValue", $transactionValue);
        $stmt->bindParam(":transactionDetail", $transactionDetail);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!";

        } catch (PDOException $e) {
            //erro na conexão

            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }
//Redirecionando Página

header("Location:" . $BASE_URL . "../index.php");
    //Seleção de Dados
} else {
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
}

//Fechar conexão
$conn = null;


?>