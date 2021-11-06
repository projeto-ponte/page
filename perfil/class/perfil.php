<?php

class Perfil
{
    public $idUsuario;
    public $fotoPerfil = '';
    public $descricao = '';
    // private $banco = new mysqli("127.0.0.1:3309", "root", "root", "ponte");


    function __construct($fotoPerfilV=null,$descricaoV=null, $idUsuarioV=0)
    {
      
        $this->idUsuario = $idUsuarioV;
        $this->fotoPerfil = $fotoPerfilV;
        $this->descricao = $descricaoV;
    }
    public function retornarDadosEnvio(){
        if($this->idUsuario != null && $this->fotoPerfil != null && $this->descricao != null ){
            return "INSERT INTO perfil_usuario ( idUsuario, foto_perfil, descricao) VALUES ('$this->idUsuario', '$this->fotoPerfil', '$this->descricao')";
             
        }
        else{
            return false;
        }
    }
    public function retornarDadosAlterar(){
       return "UPDATE perfil_usuario SET 
        foto_perfil='$this->fotoPerfil', 
        descricao='$this->descricao',
        WHERE  idUsuario=$this->idUsuario";
    
    }
    public function retornarDadosPegar(){
        return "SELECT * FROM perfil_usuario WHERE idUsuario='$this->idUsuario'";
    }
    // public function retornarDadosPegarEs(){
    //     return "SELECT * FROM endereco WHERE idEndereco=$this->idEndereco";
    // }
    public function retornarDadosDeletar(){
        return "DELETE FROM perfil_usuario WHERE idUsuario=$this->idUsuario";
    }
}
