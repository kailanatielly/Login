<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once '../controller/ctrPessoaJ.php';
$listPes = $_REQUEST['pessoasJ'];
$listPesBD = $_REQUEST['pessoaPJBD'];
$cadPJ = new ctrPessoaJ();
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
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                 <th>Funções</th>
            </tr>
            <?php foreach ($listPes as $pj): ?>
            <tr>
                <td><?php //echo $pf->getNome(); ?></td>
                <td><?php //echo $pf->getEmail(); ?></td>
                <td><?php //echo $pf->getCpf(); ?></td>
            </tr>
            <?php endforeach; ?>
        
       <?php 
       if($listPesBD == null) {
           echo "Tabela Pessoa Jurídica está vazia!";
       }else {
           foreach($listPesBD as $pj): 
               ?>
          <tr>
              <td><?php echo $pj['nome'];?></td> 
              <td><?php echo $pj['nomeFantasia'];?></td>
              <td><?php echo $pj['cnpj']; ?></td>
          <td> 
              <form action="editPJ.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $pj['idPessoa']; ?>"/>
                  <input type="submit" name="updatePJ" value="Editar"/>
                    
              <form action=<?php $cadPJ->deletePes(); ?>" method="POST"> 
                  <input type="hidden" name="id" value="<?php echo $pj['idPessoa']; ?>"/>
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