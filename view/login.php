<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    header("Location: ../index.php");
}
require_once '../controller/cLogin.php';
$login = new cLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <form action= "<?php $login->logar(); ?>" Method="POST"/>
        <input type="email" name="email" required placeholder="E-mail login"/>
        <br><br>
        <input type="password" name="pas" required placeholder="Senha..."/>
        <br><br>
        <input type="submit" name="logar" value="Logar"/>
    </form>
    <?php
    // put your code here
    ?>
</body>
</html>