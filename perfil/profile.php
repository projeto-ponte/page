<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="estilo/estilo.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>

    #corpo {
        width: 80%;
        margin: auto;
        padding: 0vw 1vw 1vw 1vw;
        background-color: #f0f2f5;
    }

    body{
        background-color: #f0f2f5;
    }

    .rounded-circle{
      width: 168px;
      height: 168px;
      border: black solid 5px;
     }

    div#capa {  
      height: 20vh;
      background-color: gray;
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      align-content: center;
    }

    #info{
      color: black;
      text-align: center;
      margin-bottom: 10vh;
    }
    

    div.postagem{
        margin: 5vh;
        justify-content: center;
        
    }

    div.text-center{
        margin: auto;
        display: flex;
    }

    div#perfil{
        padding-bottom: 0.5vw;
        border-bottom: solid #2a5b74 2px;
        margin-bottom: 3vh;
        text-align: left;
    }
    #imgPerfil{
        width: 50px;
        height: 50px;
        border-radius: 20px;
    }

    #nome-perfil{
        margin-top: 80px;
    }
  

    div#legend{
        font-size: 20px;
        text-align: left;
}
    .card-body{
        padding: 0rem 0rem;

    }

    #img{
        width: 80%;
    }


</style>

<body>

        <div id="corpo">

        <?php
        require_once "../includes/function.php";
        if (is_logado() == true) {
            require_once "../includes/banco.php";
            $idPerfil = $_SESSION['profile'];
            $q = "SELECT * FROM perfil_usuario WHERE idPerfil='$idPerfil'";
            $busca = $banco->query($q);
            $reg = $busca->fetch_object();
            echo "
            <div id='info'>
            <div id='capa'>
                <div  id='conteudo'>
                    <img style='margin-top:5vh;' src='../uploads/$reg->foto_perfil' class='rounded-circle' alt='...'>
                </div>
            </div>
            <h3 id='nome-perfil'>$reg->descricao</h3>
        </div>
    ";  



        $perfil = $_SESSION['profile'];
        $sql_get = "SELECT * FROM publicacao WHERE idPerfil=$perfil  ORDER BY idPublicacao DESC";
        $busca = $banco->query($sql_get);
        // $reg = $busca->fetch_object();
        while ($reg = $busca->fetch_object()) {
            // echo $reg->arquivos;
            $sql_get_perfil = "SELECT * FROM perfil_usuario WHERE idPerfil='$perfil'";
            $buscaPerfil = $banco->query($sql_get_perfil);
            $Perfil = $buscaPerfil->fetch_object();
    
            // $sql_get_usuario = "SELECT * FROM usuario WHERE idUsuario='$Perfil->idUsuario'";
            // $buscaUsuario = $banco->query($sql_get_usuario);
            // $Usuario = $buscaUsuario->fetch_object();
            $data_1 = new DateTime($reg->data_hora);
            $data_2 = new DateTime(date('Y-m-d H:i:s.'));
            $intervalo = $data_1->diff($data_2); 
            if($intervalo->format('%d') != '0'){
                // echo $intervalo->format('%d');
                $intervalo = $intervalo->format('%d dias');
            }
            else if($intervalo->format('%h') != '0'){
                $intervalo = $intervalo->format('%h h');
            }
            else{
                $intervalo = $intervalo->format('%i m');
            }
            echo "
            <div class='postagem'>
                <div class='row lineImg'>
                    <div class='card text-center'>
                        <div class='card-body' style='padding: 1rem 0px;'>
                                <div id='perfil'>
                                    <div class='row'>
                                        <div class='col-sm-1'>
                                            <img id='imgPerfil' src='../uploads/$Perfil->foto_perfil' class='rounded-circle' alt='...'>
                                        </div>
                                        <div class='col-sm-11'>
                                            <h5>$Perfil->descricao<p style='color:grey; font-size:16px;'>$intervalo</p></h5>
                                        </div>
                                    </div>
                                </div>
                                <div id='legend'>
                                    <p>$reg->descricao
                                    </p>
                                </div>
                                <img src='../uploads/$reg->arquivos' id='img' alt='...'>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        
        }}
        
        ?>
    </div>
</body>