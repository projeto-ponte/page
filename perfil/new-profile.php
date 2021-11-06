<head>
    <!-- <link rel='stylesheet' href='estilo/estilo.css'> -->
    <meta charset='UTF-8'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</head>
<style>
    div#corpo {
        width: 800px;
        margin: auto;
        padding: 20px;
        background-color: white;
        /* box-shadow: 0px 0px 30px #777; */
    }
</style>
<div id='corpo'>
    <?php
    require_once "../includes/banco.php";
    require_once "../includes/function.php";
    require_once "class/perfil.php";
    
    if (isset($_FILES['imagem'])) {
        // echo 'oie';
        if (!isset($_SESSION)) {
            session_start();
        }
        $usuario = $_SESSION['user'];

        $descricao = $_POST['descricao'];
        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "../uploads/";
        $date = date("Y-m-d H:i:s");
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
        $perfil = new Perfil($novo_nome, $descricao, $usuario);
        $envio = $perfil->retornarDadosEnvio();
        // echo $envio;
        $success = '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            An example success alert with an icon
        </div>
        </div>';
        if ($banco->query($envio)) {
            echo "<script type='text/javascript'>alert('$success');</script>";
            $get = $perfil->retornarDadosPegar();
            $busca = $banco->query($get);
            $perfilReturn = $busca->fetch_object();
            $_SESSION['profile'] = $perfilReturn->idPerfil;
            echo $_SESSION['profile'];
            header('Location: ' . 'http://localhost/ponte');

        }
        else{
            echo "<script type='text/javascript'>alert('Não foi possível cadastrar o perfil');</script>";
        }
    }
    ?>

    <?php
    echo "
    <h1>Novo Perfil</h1>
    <form action='new-profile.php' method='POST' enctype='multipart/form-data'>

        <div class='row g-3'>
            <div class='col-sm-12'>
            <label style='background-color:#2a5b74; color:white;' class='input-group-text' for='imagem'>Imagem</label>
                            <input type='file' class='form-control' id='imagem' name='imagem'>
            </div>
        </div>
        <div class='row g-3'>
            <div class='col-sm-6'>
            <label  style='margin-top:10px;' for='descricao'>Nome do Perfil</label>
                <input class='form-control form-control-lg' required name='descricao' type='text' placeholder='Digite o nome do perfil' aria-label='.form-control-lg example'>
            </div>
        </div>

        <div style='margin-top: 10px;' class='d-grid gap-2 d-md-block'>
            <button type='submit' class='btn btn-success'>Cadastrar</button>
        </div>
    </form>";
    // }
    // else{

    // }
    // <div class='row g-3'>
    //     <div class='col-sm-8'>
    //         <label for='senha' class='form-label'>Repita a senha</label>
    //         <input type='password' class='form-control' name='senha' id='senha' required placeholder='insira a senha'>
    //     </div>
    // </div>
    ?>
</div>