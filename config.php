<?php 
    if (!defined("HOST")) define("HOST", "localhost");  // Nome do host do banco de dados
    if (!defined("USER")) define("USER", "root");       // Usuário do banco de dados
    if (!defined("PASS")) define("PASS", "senac");      // Senha do usuário
    if (!defined("BASE")) define("BASE", "pet_shop");   // Nome do banco de dados

    $conn = new mysqli(HOST, USER, PASS, BASE);
