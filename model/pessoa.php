<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of pessoa
 *
 * @author User
 */
    abstract class pessoa {
    //put your code here
    private $nome;//Nome da Pessoa Fisíca e Razão Social da Pessoa Jurídica
    private $telefone;
    private $email;
    private $endereco;
    //put your code here
public function pessoa() {
        
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setEndereco($endereco): void {
        $this->endereco = $endereco;
    }

    abstract function validaDoc($doc);
    
    }
