<?php

class Contato
{
    public $idContato;
    public $numero = '';
    public $descricao = '';
    public $idUsuario;
    // private $banco = new mysqli("127.0.0.1:3309", "root", "root", "ponte");


    function __construct($numeroV=null, $descricaoV=null, $idContato=0,$idUsuarioV=0 )
    {
        $this->numero = strval($numeroV);
        $this->descricao = $descricaoV;
        $this->idContato = $idContato;
        $this->idUsuario = $idUsuarioV;
    }
    public function retornarDadosEnvio(){
        if($this->numero != null && strlen($this->numero) <= 14 && $this->descricao != null){
            return "INSERT INTO contato (idUsuario, numero, descricao) VALUES ('$this->idUsuario', '$this->numero', '$this->descricao')";
             
        }
        else{
            return false;
        }
    }
    public function retornarDadosAlterar(){
       $update = "UPDATE contato SET 
        numero='$this->numero', 
        descricao='$this->descricao'
        WHERE idContato='$this->idContato'";
       return $update;
    }
    public function retornarDadosPegar(){
        return "SELECT * FROM contato WHERE idUsuario='$this->idUsuario'";
    }
    public function retornarDadosPegarEs(){
        return "SELECT * FROM contato WHERE idContato=$this->idContato";
    }
    public function retornarDadosDeletar(){
        return "DELETE FROM contato WHERE idContato=$this->idContato";
    }
}
