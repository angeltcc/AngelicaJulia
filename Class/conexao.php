<?php

/*
tipo = tipo do banco de dados (ex. mysql, oracle, postsgre, ms sql server)
local = onde esta o banco (online é o endereço e a porta)
dbname = nome do seu banco
usuario

$pdo = new PDO('tipo:host=local;dbname=bancoDados', usuario, senha);
*/

function conectar()
{
    $pdo = new PDO('mysql:host=localhost;dbname=projetotcc', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    return $pdo;
} array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);