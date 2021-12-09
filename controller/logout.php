<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//inicializa a sessão
session_start();

//RENOVA TODAS AS VARIÁVEIS DA SESSÃO
$_SESSION = array();

//Distruir sessão
session_destroy();

//Redirecionar para tela de login após logout
header("Location: ../view/login.php");
exit;
