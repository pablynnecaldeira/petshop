<?php
// create-pet.php
include("config.php");
include("page.php");

$page = new Page();
$page->header();

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para selecionar todos os proprietários
$sql = "SELECT * FROM proprietarios";
$res = $conn->query($sql);

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $proprietario_id = $_POST['proprietario_id'];

    // Consulta SQL para inserir o novo pet
    $sql = "INSERT INTO pets (nome, especie, raca, idade, proprietario_id) VALUES ('$nome', '$especie', '$raca', '$idade', '$proprietario_id')";

    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Pet adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar pet: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Adicionar Pet</title>
</head>

<body>

    <h1 style="color: orange; margin-left: 30%;  margin-top:10%">Adicionar Pet</h1>
    <form method="post" action="create-pet.php" style="margin-left: 30%; margin-top: 2%">
        <div class="input-group" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" style="color:white; background-color:orange; border: none">Nome:</span>
            <input type="text" name="nome" aria-label="Nome" class="form-control">
        </div>
        <div class="input-group" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" style="color:white; background-color:orange; border: none">Espécie:</span>
            <input type="text" name="especie" aria-label="Espécie" class="form-control">
        </div>
        <div class="input-group" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" style="color:white; background-color:orange; border: none">Raça:</span>
            <input type="text" name="raca" aria-label="Raça" class="form-control">
        </div>
        <div class="input-group mb-3" style="margin-bottom: 10px; width: 50%">
            <span class="input-group-text" style="color:white; background-color:orange; border: none" id="basic-addon1">Idade</span>
            <input type="number" name="idade" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="col-md">
            <div class="form-floating">
                <select class="form-select" id="floatingSelectGrid" name="proprietario_id" aria-label="Floating label select example">
                    <?php
                    if ($res->num_rows > 0) {
                        // Saída de dados de cada linha
                        while ($row = $res->fetch_assoc()) {
                            echo '<option value="' . $row["id"] . '">' . $row["nome"] . '</option>';
                        }
                    } else {
                        echo '<option value="">Nenhum proprietário encontrado</option>';
                    }
                    ?>
                </select>
                <label for="floatingSelectGrid">Proprietário</label>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Adicionar Pet</button>
    </form>
</body>

</html>