<?php
include("page.php");

$page = new Page();
$page->header();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("config.php");

    // Recuperar os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Consulta SQL para inserir o novo proprietário
    $sql = "INSERT INTO proprietarios (nome, telefone, email) VALUES ('$nome', '$telefone', '$email')";

    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Proprietário adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar proprietário: " . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Adicionar Proprietário</title>
</head>

<body>
    <h1 style="color: orange; margin-left: 30%;  margin-top:10%">Adicionar Proprietário</h1>
    <form method="post" action="create-proprietario.php" style="margin-left: 30%; margin-top: 2%">
        <div class="input-group" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" style="color:white; background-color:orange; border: none">Nome e sobrenome:</span>
            <input type="text" name="nome" aria-label="First name" class="form-control">
        </div>
        <div class="input-group mb-3" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" id="basic-addon1" style="color:white; background-color:orange; border: none">@</span>
            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" style="color:white; background-color:orange; border: none" id="basic-addon1">(...) </span>
            <input type="number" name="telefone" class="form-control" placeholder="Telefone" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
    </form>

</body>

</html>