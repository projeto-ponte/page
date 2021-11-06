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
    // $_SESSION['user'] = 'rykelme';
    require_once "../includes/banco.php";
    require_once "./class/cadastro.php";
    require_once "../includes/function.php";
    require_once "../includes/login.php";
    ?>
    <div id="corpo">
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        // $_SESSION['usuario'] = 'rykelme';
        if (!isset($_POST['cnpj'])) {
            require "./new-user-form.php";
        } else {
            $cnpj = $_POST['cnpj'] ?? null;
            $nomeFantasia = $_POST['nomeFantasia'] ?? null;
            $razaoSocial =  $_POST['razaoSocial'] ?? null;
            $tipoOng =  $_POST['tipoOng'] ?? null;
            $idUsuario = $_SESSION['user'];
            $cadastro = new Cadastro($cnpj, null, null, $nomeFantasia, $razaoSocial, $tipoOng, $idUsuario);
            $ok = $cadastro->retornarDadosAlterar();
            // echo $ok;
            if ($ok) {
                $q = $ok;
                if ($banco->query($q)) {
                    echo '<div class="alert alert-success" role="alert">
                    Alteração realizada
                  </div>';
                    $retur = "SELECT nomeFantasia, razaoSocial, senha, tipoOng, idUsuario, cnpj FROM usuario WHERE idUsuario='$idUsuario' LIMIT 1";
                    $busca = $banco->query($retur);
                    if ($busca) {
                        if ($busca->num_rows > 0) {
                            $reg = $busca->fetch_object();
                            $_SESSION['user'] = $reg->idUsuario;
                            $_SESSION['nome'] = $reg->nomeFantasia;
                            $_SESSION['tipo'] = $reg->tipoOng;

                            sleep(5);
                            header('Location: ' . 'http://localhost/ponte');
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                    Erro! Tente novamente mais tarde
                  </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    Não foi possível cadastrar
                  </div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Erro! Não foi possível cadastrar
                  </div>';
            }
        }
        ?>
        <br>
    </div>
</body>

</html>