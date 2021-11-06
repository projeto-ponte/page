<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    div#body {
        width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: white;
        margin-bottom: 10vw;
        /* box-shadow: 0px 0px 30px #777; */
    }
    div.postagem{
        width: 1000px;
        margin: auto;
    }

    img#img {
        width: 45vw;
        /* margin: auto; */
    }
    div.text-center{
        width: 50vw;
        margin: auto;
        display: flex;
    }
    div.lineImg{
        margin-top: 5vw;
    }
    div#perfil{
        padding-bottom: 0.5vw;
        border-bottom: solid #2a5b74 2px;
        margin-bottom: 3vh;
        text-align: left;
    }
    img#imgPerfil{
        width: 50px;
        height: 50px;
        border-radius: 20px;
    }
    div#legend{
        font-size: 20px;
        text-align: left;
    }
    .card-body{
        padding: 0rem 0rem;

    }
</style>
<?php
require_once "../ponte/includes/banco.php";
require_once "includes/function.php";
if (isset($_FILES['imagem'])) {
    if(!isset($_SESSION)){
        session_start();
    }
    $perfil = intval($_SESSION['profile']);
    // echo gettype($perfil);
    $usuario = $_SESSION['user'];
    $sql_get = "SELECT * FROM perfil_usuario WHERE idUsuario=$usuario";
    $busca = $banco->query($sql_get);
    // $perfil = $busca->fetch_object();


    $descricao = $_POST['descricao'];
    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "uploads/";
    $date = date("Y-m-d H:i:s");
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
    $sql_code = "INSERT INTO publicacao (idPerfil,data_hora,descricao,arquivos) VALUES ($perfil, '$date','$descricao', '$novo_nome')";

    if ($banco->query($sql_code)) {
        // echo 'sucesso';
    } else {
        // echo 'não sucesso';
    }
}

?>
<?php
// require_once "includes/function.php";
$profileId = $_SESSION["profile"];
if (is_logado() == true && intval($profileId) > 0) {
    require_once "includes/menuComponent.php";
    echo '<div id="body">
            <div class="row g-3">
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Fazer publicação
                    </button>
                </div>
            </div>
            </div>
             ';

    $sql_get = "SELECT * FROM publicacao ORDER BY idPublicacao DESC";
    $busca = $banco->query($sql_get);
    // $reg = $busca->fetch_object();
    while ($reg = $busca->fetch_object()) {
        // echo $reg->arquivos;
        $sql_get_perfil = "SELECT * FROM perfil_usuario WHERE idPerfil='$reg->idPerfil'";
        $buscaPerfil = $banco->query($sql_get_perfil);
        $Perfil = $buscaPerfil->fetch_object();

        $sql_get_usuario = "SELECT * FROM usuario WHERE idUsuario='$Perfil->idUsuario'";
        $buscaUsuario = $banco->query($sql_get_usuario);
        $Usuario = $buscaUsuario->fetch_object();
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
                                        <img id='imgPerfil' src='uploads/$Perfil->foto_perfil' class='rounded-circle' alt='...'>
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
                            <img src='uploads/$reg->arquivos' id='img' alt='...'>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }


    echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Fazer Postagem</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <div  class="input-group mb-3">
                            <label style="background-color:#2a5b74; color:white;" class="input-group-text" for="imagem">Imagem</label>
                            <input type="file" class="form-control" id="imagem" name="imagem">
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-12">
                        <input class="form-control form-control-lg" required name="descricao" type="text" placeholder="Digite uma legenda..." aria-label=".form-control-lg example">
                    </div>
                </div>
                <div style="margin-top:10px;" class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">Postar</button>
                </div>
                
            </form>
            </div>
</div>
  </div>
</div>
    ';
    // echo '<h1>'.$_SESSION["profile"].'</h1>';
} else if(intval($profileId) <= 0) {
    // echo '<h1>'.$_SESSION["profile"].'</h1>';
    echo '<div id="corpo">';
    echo '<div class="alert alert-danger" role="alert">
                   Usuário sem perfil
                  </div></div>';
    echo 'colocar link para criar perfil';
}
else{
    echo '<div id="corpo">';
    echo '<div class="alert alert-danger" role="alert">
                   Usuário não logado
                  </div></div>';
}
?>