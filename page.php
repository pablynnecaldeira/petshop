<?php
class Page {
    public function header() {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Petshop</title>
            <!-- CSS do Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img width="64" height="64" src="https://img.icons8.com/external-photo3ideastudio-flat-photo3ideastudio/64/external-pet-shop-pet-shop-photo3ideastudio-flat-photo3ideastudio.png" alt="external-pet-shop-pet-shop-photo3ideastudio-flat-photo3ideastudio" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="create-pet.php">Adicionar Pet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-proprietario.php">Adicionar Proprietário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar-pets-proprietarios.php">Listar Pets e Proprietários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar-proprietario.php">Listar Proprietários</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
    }

    public function footer() {
        ?>
        <!-- JS do Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    }
}
?>
