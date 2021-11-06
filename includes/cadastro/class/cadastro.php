<?php

class Cadastro
{
    public $idUsuario;
    public $cnpj = '';
    public $email = '';
    public $senha = '';
    public $nomeFantasia = '';
    public $razaoSocial;
    public $tipoOng;
    // private $banco = new mysqli("127.0.0.1:3309", "root", "root", "ponte");


    function __construct($cnpjV=null, $email=null, $senha=null, $nomeFantasiaV=null, $razaoSocialV=0, $tipoOngV=null, $idUsuarioV=0)
    {
      
        $this->idUsuario = $idUsuarioV;
        $this->cnpj = $cnpjV;
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeFantasia = $nomeFantasiaV;
        $this->razaoSocial = $razaoSocialV;
        $this->tipoOng = $tipoOngV;
    }
    public function retornarDadosEnvio(){
        if($this->cnpj != null && $this->email != null && $this->senha != null && $this->nomeFantasia != null && $this->razaoSocial != null && $this->tipoOng != null){
            return "INSERT INTO usuario ( cnpj, email, senha, nomeFantasia, razaoSocial, tipoOng) VALUES ('$this->cnpj', '$this->email', '$this->senha', '$this->nomeFantasia','$this->razaoSocial', '$this->tipoOng')";
             
        }
        else{
            return false;
        }
    }
    public function retornarDadosAlterar(){
       return "UPDATE usuario SET 
        cnpj='$this->cnpj', 
        nomeFantasia='$this->nomeFantasia',
        razaoSocial='$this->razaoSocial',
        tipoOng='$this->tipoOng'
        WHERE idUsuario=$this->idUsuario";
    
    }
    public function retornarDadosPegar(){
        return "SELECT * FROM usuario WHERE idUsuario='$this->idUsuario'";
    }
    // public function retornarDadosPegarEs(){
    //     return "SELECT * FROM endereco WHERE idEndereco=$this->idEndereco";
    // }
    public function retornarDadosDeletar(){
        return "DELETE FROM usuario WHERE idUsuario=$this->idUsuario";
    }
}
