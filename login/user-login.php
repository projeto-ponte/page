<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Título da página</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilo/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once "../includes/banco.php";
    require_once "../includes/login.php";
    ?>
    <div style="width: 800px;
    margin: auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0px 0px 30px #777;" id="ident">
        <?php
        $u = $_POST['email'] ?? null;
        $s = $_POST['senha'] ?? null;

        if (is_null($u) || is_null($s)) {
            echo 'oi';
            require "index.php";
        } else {
            $q = "SELECT nomeFantasia, razaoSocial, senha, tipoOng, idUsuario, cnpj FROM usuario WHERE email = '$u' LIMIT 1";
            $busca = $banco->query($q);
            if (!$busca) {
                echo "<div class='alert alert-danger' role='alert'>
                Erro! Tente novamente mais tarde
                </div>";
            } else {
                if ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($s, $reg->senha)) {
                        session_start();
                        // echo $reg->idUsuario;
                        $perfil = "SELECT * FROM perfil_usuario WHERE idUsuario='$reg->idUsuario'";
                        $getPerfil = $banco->query($perfil);
                        if($getPerfil->num_rows > 0){
                            $prof = $getPerfil->fetch_object();
                            $_SESSION['profile'] = $prof->idPerfil;
                        }

                        $_SESSION['user'] = $reg->idUsuario;
                        $_SESSION['nome'] = $reg->nomeFantasia;
                        $_SESSION['tipo'] = $reg->tipoOng;

                        echo '<div class="alert alert-success" role="alert">
                        Usuário logado com sucesso
                      </div>';
                      sleep(2);
        header('Location: '.'http://localhost/ponte');
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                        Usuário ou senha incorretos
                        </div>";
                    };
                    // echo $reg->senha;
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                        Esse usuário não existe
                        </div>";
                }
            }
        }
        ?>
    </div>
</body>

</html>