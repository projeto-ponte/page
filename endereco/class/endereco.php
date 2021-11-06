<?php

class Endereco
{
    public $idEndereco;
    public $cep = '';
    public $rua = '';
    public $bairro = '';
    public $numero = '';
    public $idUsuario;
    // private $banco = new mysqli("127.0.0.1:3309", "root", "root", "ponte");


    function __construct($cepV=null, $ruaV=null, $bairroV=null, $numeroV=null, $idEnderecoV=0,$idUsuarioV = 0)
    {
      
        $this->idEndereco = $idEnderecoV;
        $this->cep = $cepV;
        $this->rua = $ruaV;
        $this->bairro = $bairroV;
        $this->numero = $numeroV;
        $this->idUsuario = $idUsuarioV;
    }
    public function retornarDadosEnvio(){
        if($this->numero != null && $this->cep != null && $this->rua != null && $this->bairro != null){
            return "INSERT INTO endereco ( idUsuario, cep, rua, bairro, numero) VALUES ('$this->idUsuario', '$this->cep', '$this->rua', '$this->bairro','$this->numero')";
             
        }
        else{
            return false;
        }
    }
    public function retornarDadosAlterar(){
       $update = "UPDATE endereco SET 
        cep='$this->cep', 
        rua='$this->rua',
        bairro='$this->bairro',
        numero='$this->numero'
        WHERE idEndereco='$this->idEndereco'";
       return $update;
    }
    public function retornarDadosPegar(){
        return "SELECT * FROM endereco WHERE idUsuario='$this->idUsuario'";
    }
    public function retornarDadosPegarEs(){
        return "SELECT * FROM endereco WHERE idEndereco=$this->idEndereco";
    }
    public function retornarDadosDeletar(){
        return "DELETE FROM endereco WHERE idEndereco=$this->idEndereco";
    }
}
