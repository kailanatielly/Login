<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ctrPessoaJ
 *
 * @author User
 */
    require_once '../model/pessoaJ.php';

class ctrPessoaJ {

    //put your code here
    private $pjs = [];

    public function __construct() {
        $this->mokPJ();
    }

    public function addPessoaJ($p) {
        array_push($this->pjs, $p);
    }

    public function mokPJ() {
        $pj1 = new pessoaJ();
        $pj1->setNome('Senac RS');
        $pj1->setNomeFantasia('Senac Tech');
        $pj1->setEndereco('Av. Venancio Aires');
        $pj1->setEmail('contato@senacrs.com.br');
        $pj1->setSite('www.senacrs.com.br');
        $pj1->setTelefone('5133403340');
        $pj1->setCnpj('123321123001-18');
        $this->addPessoaJ($pj1);
    }

    public function getAll() {
        $_REQUEST['pessoasJ'] = $this->pjs;
        $this->getAllBD();
        require_once '../view/listaPJ.php';
    }

    public function imprimePJs() {
        foreach ($this->pjs as $pes) {
            echo $pes;
        }
    }

    public function inserir() {
        if (isset($_POST['salvarPJ'])) {
            $pj = new pessoaJ();
            $pj->setNome($_POST['nome']);
            $pj->setNomeFantasia($_POST['nomeFantasia']);
            $pj->setEmail($_POST['email']);
            $pj->setEndereco($_POST['endereco']);
            $pj->setTelefone($_POST['telefone']);
            $pj->setCnpj($_POST['cnpj']);
            $pj->setSite($_POST['site']);
            $this->addPessoaJ($pj);
        }
    }

    public function inserirBD() {
        if (isset($_POST['salvarPJ'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die('Não foi possivel conectar. ' . mysqli_error());
            }
            
            $Nome = $_POST['nome'];
            $NomeFantasia = $_POST['nomeFantasia'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Telefone = $_POST['telefone'];
            $Cnpj = $_POST['cnpj'];
            $Site = $_POST['site'];
            $sql = "insert into `pessoa` (`nome`,`nomeFantasia`,`telefone`,`email`,`endereco`,"
                    . "`cnpj`,`site`) values ('$Nome','$NomeFantasia','$Telefone','$Email',"
                    . "'$Endereco','$Cnpj','$Site')";

            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) {
                die('Não foi possivel inserir na tabela. ' . mysqli_error($conexao));
            }
            mysqli_close($conexao);
        }
    }

    public function getAllBD() {

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'inf4m211';
        $conexao = mysqli_connect($host, $user, $pass, $schema);

        if (!$conexao) {
            die('Não foi possível conectar. ' . mysqli_error());
        }
        $sql = "select * from pessoa where cpf is null"; 
        $result = mysqli_query($conexao, $sql);

        if ($result) {

            $pjsBD = [];

            while ($row = mysqli_fetch_assoc($result)) {

                array_push($pjsBD, $row);
            }

            $_REQUEST['pessoaPJBD'] = $pjsBD;
        } else {

            $_REQUEST['pessoaPJBD'] = 0;
        }

        mysqli_close($conexao);
    }

    public function deletePes() {
        if (isset($_POST['delete'])) {
            $id = $_POST ['id'];
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);

            if (!$conexao) {
                die('Não foi possível conectar. ' . mysqli_error());
            }
            $sql = "delete from pessoa where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao deletar.' . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Refresh: 0'); // recarrega a pág. f5 em 0 segundos
        }
    }

    public function getPessoaJById($id) {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'inf4m211';
        $conexao = mysqli_connect($host, $user, $pass, $schema);

        if (!$conexao) {
            die('Não foi possível conectar. ' . mysqli_error($conexao));
        }
        $sql = "select * from pessoa where idPessoa = $id";
        $result = mysqli_query($conexao, $sql);

        if ($result) {

            $pjsBD = [];

            while ($row = mysqli_fetch_assoc($result)) {

                array_push($pjsBD, $row);
            }
            return $pjsBD;
        }
        mysqli_close($conexao);
    }

    public function updatePJ() {
        if (isset($_POST['update'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die('Não foi possivel conectar. ' . mysqli_error());
            }
            $idPessoa = $_POST['id'];
            $Nome = $_POST['nome'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Telefone = $_POST['telefone'];
            $Cnpj = $_POST['cnpj'];
            $nomeFantasia = $_POST['nomeFantasia'];
            $Site = $_POST['site'];
            $sql = "UPDATE `pessoa` SET `nome`='$Nome',`telefone`='$Telefone',`email`='$Email',"
                    . "`endereco`='$Endereco',`cnpj`='$Cnpj',`nomeFantasia`='$nomeFantasia',"
                    . "`site`='$Site' WHERE idPessoa`='$idPessoa'";

            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) {
                die('Erro ao atualizar pessoa na tabela. ' . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: ../view/cadPessoaJ.php');
        }
        if (isset($_POST['cancelar'])) {
            header('Location:../view/cadPessoaJphp');
        }
    }

}
