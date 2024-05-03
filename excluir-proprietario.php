<?php
include("config.php");
include("page.php");

$page = new Page();
$page->header();

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recupera o ID do proprietário a ser excluído
$id = $_GET['id'];

// Consulta SQL para excluir o proprietário
$sql = "DELETE FROM proprietarios WHERE id=$id";

// Executar a consulta
if ($conn->query($sql) === TRUE) {
    echo "Proprietário excluído com sucesso.";
} else {
    echo "Erro ao excluir proprietário: " . $conn->error;
}

// Redirecionar de volta para a página de lista
header('Location: index.php');

// Fechar a conexão
$conn->close();
