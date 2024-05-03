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
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $proprietario_id = $_POST['proprietario_id'];

    // Consulta SQL para atualizar o pet
    $sql = "UPDATE pets SET nome='$nome', especie='$especie', raca='$raca', idade='$idade', proprietario_id='$proprietario_id' WHERE id=$id";

    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Pet atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar pet: " . $conn->error;
    }
} else {
    // Recupera o ID do pet a ser editado
    $id = $_GET['id'];

    // Consulta SQL para selecionar o pet
    $sql = "SELECT * FROM pets WHERE id=$id";
    $res = $conn->query($sql);

    // Recupera os dados do pet
    if ($res->num_rows > 0) {
        $pet = $res->fetch_assoc();
    } else {
        die("Pet não encontrado.");
    }
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Pet</title>
</head>

<body>
    <h1>Editar Pet</h1>
    <form method="post" action="editar-pet.php">
        <input type="hidden" name="id" value="<?php echo $pet['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $pet['nome']; ?>"><br>
        Espécie: <input type="text" name="especie" value="<?php echo $pet['especie']; ?>"><br>
        Raça: <input type="text" name="raca" value="<?php echo $pet['raca']; ?>"><br>
        Idade: <input type="number" name="idade" value="<?php echo $pet['idade']; ?>"><br>
        ID do Proprietário: <input type="number" name="proprietario_id" value="<?php echo $pet['proprietario_id']; ?>"><br>
        <input type="submit" value="Atualizar Pet">
    </form>
</body>

</html>