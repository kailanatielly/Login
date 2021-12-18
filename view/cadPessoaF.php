<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php 
require_once '../controller/ctrPessoaF.php';
$cadPessoaF = new ctrPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoa Fisíca</title>
    </head>
    <body>
        <h1>Cadastro de Pessoa Fisíca</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $cadPessoaF->inserirBD(); ?>" method="POST">
            <input type="text" required placeholder="Nome aqui..." name="nome"/>
            <br><br>
            <input type="tel" required placeholder="Telefone aqui..." name="telefone"/>
            <br><br>
            <input type="email" required placeholder="E-mail aqui..." name="email"/>
            <br><br>
            <input type="text" placeholder="Endereço aqui..." name="endereco"/>
            <br><br>
            <input type="text" required placeholder="CPF aqui..." name="cpf"/>
            <br><br>
            <input type="text" placeholder="RG aqui..." 
                   minlength="10" maxlength="10" name="rg"/>
            <br><br>
            <input type="radio" value="F" name="sexo">Feminino
            <input type="radio" value="M" name="sexo">Masculino
            <br><br>
            <input type="submit" value="Salvar" name="salvarPF"/>
            <input type="reset" value="Limpar" name="limpar"/>
        </form>
        <br>
        <?php $cadPessoaF->getAll(); ?>
        
    </body>
</html>

