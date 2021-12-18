<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php 
require_once '../controller/ctrPessoaJ.php';
$cadPessoaJ = new ctrPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoa Jurídica</title>
    </head>
    <body>
        <h1>Cadastro de Pessoa Jurídica</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $cadPessoaJ->inserirBD(); ?>" method="POST">
            <input type="text" required placeholder="Nome aqui..." name="nome"/>
            <br><br>
            <input type="text" required placeholder="Nome Fantasia aqui..." name="nomeFantasia"/>
            <br><br>
            <input type="tel" required placeholder="Telefone aqui..." name="telefone"/>
            <br><br>
            <input type="text" placeholder="Endereço aqui..." name="endereco"/>
            <br><br>
            <input type="text" required placeholder="E-mail aqui..." name="email"/>
            <br><br>
            <input type="text" placeholder="CNPJ aqui..." name="cnpj"/>
            <br><br>
            <input type="text" placeholder="Site aqui..." name="site"/>
            <br><br>
            <br><br>
            <input type="submit" value="Salvar" name="salvarPJ"/>
            <input type="reset" value="Limpar" name="limpar"/>
        </form>
        <br>
        <?php $cadPessoaJ->getAll(); ?>
        
    </body>
</html>

