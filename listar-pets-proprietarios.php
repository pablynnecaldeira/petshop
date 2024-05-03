<?php
include("Page.php");
include("config.php");

$page = new Page();
$page->header();

// Consulta SQL para selecionar todos os pets e seus proprietários
$sql = "SELECT pets.id, pets.nome AS pet_nome, pets.especie, pets.raca, pets.idade, proprietarios.id AS proprietario_id, proprietarios.nome AS proprietario_nome FROM pets INNER JOIN proprietarios ON pets.proprietario_id = proprietarios.id";
$res = $conn->query($sql);

// Fechar a conexão
$conn->close();
?>

<h1 style="color:orange;">Listar Pets e Proprietários</h1>
<table class="table table-striped">
    <tr>
        <th>ID do Pet</th>
        <th>Nome do Pet</th>
        <th>Espécie</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>ID do Proprietário</th>
        <th>Nome do Proprietário</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
    if ($res->num_rows > 0) {
        // Saída de dados de cada linha
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["pet_nome"] . '</td>';
            echo '<td>' . $row["especie"] . '</td>';
            echo '<td>' . $row["raca"] . '</td>';
            echo '<td>' . $row["idade"] . '</td>';
            echo '<td>' . $row["proprietario_id"] . '</td>';
            echo '<td>' . $row["proprietario_nome"] . '</td>';
            echo '<td><a href="editar-pet.php?id=' . $row["id"] . '">Editar Pet</a></td>';
            echo '<td><a href="excluir-pet.php?id=' . $row["id"] . '">Excluir Pet</a></td>';
            echo '<td><a href="editar-proprietario.php?id=' . $row["proprietario_id"] . '">Editar Proprietário</a></td>';
            echo '<td><a href="excluir-proprietario.php?id=' . $row["proprietario_id"] . '">Excluir Proprietário</a></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="9">Nenhum resultado encontrado.</td></tr>';
    }
    ?>
</table>

<?php
$page->footer();
?>
