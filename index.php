<?php
include("Page.php");

$page = new Page();
$page->header();
?>

<h1 style="color: orange; margin-left: 30%;  margin-top:2%">Bem-vindo ao Petshop</h1>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4Qoe2FgTIux2fjJ01oC-oGLFNuV-WKiOVnpPKDXr5pQ&s" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Cadastrar o pet</h5>
                    <p class="card-text">Temos um novo cliente? Faça o cadastro do proprietario e depois dele nas páginas abaixo!</p>
                    <a href="create-proprietario.php" class="btn btn-primary" style="margin-bottom: 3px;">Cadastro de proprietário</a>
                    <a href="create-pet.php" class="btn btn-primary">Cadastro do pet</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="https://www.mundodomarketing.com.br/wp-content/uploads/2023/08/Artigos-para-caes-sao-os-mais-buscados-na-categoria-Pet-da-Shopee-jpg-1200x900.webp" class="card-img-top" alt="pets">
                <div class="card-body">
                    <h5 class="card-title">Lista de pets</h5>
                    <p class="card-text">Quer ver o nome de todos os nossos clientes? É só acessar a página a baixo!</p>
                    <a href="listar-pets-proprietarios" class="btn btn-primary">Lista de pets</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="https://blink102.com.br/wp-content/uploads/2022/07/Pets.jpg" class="card-img-top" alt="proprietario">
                <div class="card-body">
                    <h5 class="card-title">Proprietários</h5>
                    <p class="card-text">Quer ver quais são os donos dos nossos clientes? É só acessar a página a baixo!</p>
                    <a href="listar-proprietario.php" class="btn btn-primary">Lista de proprietários</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$page->footer();
?>