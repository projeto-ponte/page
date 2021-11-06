<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Título da página</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once "../includes/banco.php";
    require_once "../includes/function.php";
    require_once "./class/endereco.php";
    ?>
    <div id="corpo">
        <?php
        if(is_logado() == true){
        // echo $_POST['numero'];
        $cod = $_GET['cod'];
            $rua = $_POST['rua'] ?? null;
            $cep = $_POST['cep'] ?? null;
            $bairro = $_POST['bairro'] ?? null;
            $numero = $_POST['numero'] ?? null;
            $endereco = new Endereco($cep, $rua, $bairro, $numero, $cod);
            $ok = $endereco->retornarDadosDeletar();
            if ($ok) {
                $q = $ok;
                if ($banco->query($q)) {
                    echo '<div class="alert alert-success" role="alert">
                    Endereço deletado
                  </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    Não foi possível alterar 
                  </div>';
                }
            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
                    Usuário não logado
                  </div>';
        }
        ?>
        <br>
        <a href="index.php"><button type="button" class="btn btn-primary">Voltar</button></a>
    </div>
</body>

</html>