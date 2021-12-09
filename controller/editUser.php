<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Nome = $_POST['nome'];
    $Email = $_POST['email'];

    $pdo = require_once '../pdo/connection.php';

    $sql = "UPDATE usuario SET nomeUser = ?, email = ? WHERE idUser = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $Nome, PDO::PARAM_STR);
    $sth->bindParam(2, $Email, PDO::PARAM_STR);
    $sth->bindParam(3, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaUsuarios.php");
}