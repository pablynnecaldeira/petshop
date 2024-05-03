<?php
include("Page.php");
include("config.php");

$page = new Page();
$page->header();

// Consulta SQL para selecionar todos os proprietários
$sql = "SELECT * FROM proprietarios";
$res = $conn->query($sql);

// Fechar a conexão
$conn->close();
?>

<h1 style="color:orange;">Listar Proprietários</h1>
<table class="table table-striped">
    <tr>
        <th>ID do Proprietário</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
    if ($res->num_rows > 0) {
        // Saída de dados de cada linha
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["nome"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["telefone"] . '</td>';
            echo '<td><a href="editar-proprietario.php?id=' . $row["id"] . '">Editar</a></td>';
            echo '<td><a href="excluir-proprietario.php?id=' . $row["id"] . '">Excluir</a></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">Nenhum resultado encontrado.</td></tr>';
    }
    ?>
</table>

<?php
$page->footer();
?>
