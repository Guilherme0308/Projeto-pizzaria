<?php
// Configuração para o charset UTF-8:
header('Content-Type: text/html; charset=utf-8');

// Define o fuso horário:
date_default_timezone_set('America/Sao_Paulo');

// Define variáveis globais do site:
$site_name = "Xero Pizzaria";
$site_slogan = "A melhor pizzaria!";
$site_logo = "/src/img/logo_pizzaria.png";

// Variáveis de conteúdo inicial:
$page_article = '';
$page_aside = '';

// Regex de validação de senha:
$rgpass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{7,25}$/";

// Conexão com o banco de dados
$db = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/_config.ini', true);

foreach ($db as $server => $values) {
    if ($server == $_SERVER['SERVER_NAME']) {
        $conn = new mysqli($values['hostname'], $values['username'], $values['password'], $values['database']);
        if ($conn->connect_error) die("Falha de conexão com o banco de dados: " . $conn->connect_error);
    }
}

// Configurações de UTF-8 para o banco de dados
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// Configura o MySQL para usar os nomes em português para datas
$conn->query('SET lc_time_names = pt_BR');
?>
