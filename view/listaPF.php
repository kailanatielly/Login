<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once '../controller/ctrPessoaF.php';
$listPes = $_REQUEST['pessoasF'];
$listPesBD = $_REQUEST['pessoaPFBD'];
$cadPFs = new ctrPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th>
                <th>e-mail</th>
                <th>CPF</th>
                 <th>Funções</th>
            </tr>
            <?php foreach ($listPes as $pf): ?>
            <tr>
                <td><?php //echo $pf->getNome(); ?></td>
                <td><?php //echo $pf->getEmail(); ?></td>
                <td><?php //echo $pf->getCpf(); ?></td>
            </tr>
            <?php endforeach; ?>
        
       <?php 
       if($listPesBD == null) {
           echo "Tabela Pessoa Física está vazia!";
       }else {
           foreach($listPesBD as $pf): 
               ?>
          <tr>
              <td><?php echo $pf['nome']; ?></td>
              <td><?php echo $pf['email'];?></td>
              <td><?php echo $pf['cpf']; ?></td>
          <td> 
              <form action="editPF.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $pf['idPessoa']; ?>"/>
                  <input type="submit" name="updatePF" value="Editar"/>
                    
              <form action=<?php $cadPFs->deletePes(); ?>" method="POST"> 
                  <input type="hidden" name="id" value="<?php echo $pf['idPessoa']; ?>"/>
                  <input type="submit" name="delete" value="Deletar"/>
                  
                </form> 
                        </td> 
                    </tr>                
          <?php 
           endforeach;
       }
       ?>
        </table>
        <?php
        // put your code here 
        ?>
    </body>
</html> 