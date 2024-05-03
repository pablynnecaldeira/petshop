<?php
include("config.php");
include("page.php");

$page = new Page();
$page->header();

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Consulta SQL para atualizar o proprietário
    $sql = "UPDATE proprietarios SET nome='$nome', telefone='$telefone', email='$email' WHERE id=$id";

    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Proprietário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar proprietário: " . $conn->error;
    }
} else {
    // Recupera o ID do proprietário a ser editado
    $id = $_GET['id'];

    // Consulta SQL para selecionar o proprietário
    $sql = "SELECT * FROM proprietarios WHERE id=$id";
    $res = $conn->query($sql);

    // Recupera os dados do proprietário
    if ($res->num_rows > 0) {
        $proprietario = $res->fetch_assoc();
    } else {
        die("Proprietário não encontrado.");
    }
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Proprietário</title>
</head>
<body>
    <h1>Editar Proprietário</h1>
    <form method="post" action="editar-proprietario.php">
        <input type="hidden" name="id" value="<?php echo $proprietario['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $proprietario['nome']; ?>"><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $proprietario['telefone']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $proprietario['email']; ?>"><br>
        <input type="submit" value="Atualizar Proprietário">
    </form>
</body>
</html>
