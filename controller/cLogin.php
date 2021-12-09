<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of cLogin
 *
 * @author User
 */
class cLogin {

    public function logar() {
        if (isset($_POST['logar'])) {
            $email = $_POST['email'];
            $pas = $_POST['pas'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "select * from usuario where email = ?";

            $statement = $pdo->prepare($sql);
            $statement->execute([$email]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();
            if ($count > 0) {
                if (password_verify($pas, $result['pas'])) {
                    session_start();
                    $_SESSION['usuario'] = $result['nomeUser'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['logado'] = true;
                    header("Location: ../index.php");
                }
            } else {

                header("Location: login.php");
            }
            unset($statement);
            unset($pdo);
            unset($result);
        }
    }

}
