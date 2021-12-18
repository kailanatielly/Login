<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of pessoaF
 *
 * @author User
 */

    require_once 'pessoa.php';
    class pessoaF extends pessoa{
    //put your code here
    private $cpf;
    private $rg;
    private $sexo;
    public function pessoaF() {
        
    }
    
    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    public function setRg($rg): void {
        $this->rg = $rg;
    }

    public function setSexo($sexo): void {
        $this->sexo = $sexo;
    }
    
    public function __toString() {
        $pes = "Pessoa Fisíca: " . "<br>"
                . " - Nome: " . $this->getNome() . "<br>"
                . " - Telefone: " . $this->getTelefone() . "<br>"
                . " - email: " . $this->getEmail() . "<br>"
                . " - Endereço: " . $this->getEndereco() . "<br>"
                . " - CPF: " . $this->getCpf() . "<br>"
                . " - RG: " . $this->getRg() . "<br>"
                . " - Sexo: " . $this->getSexo() . "<br><br>";
        return $pes;
    }

    public function validaDoc($doc) {
        echo "Validando CPF: " . $doc;
    }

}

   