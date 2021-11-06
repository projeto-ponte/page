<head>
    <!-- <link rel='stylesheet' href='../endereco/estilo/estilo.css'> -->
    <meta charset='UTF-8'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</head>
<style>
    div#corpo{
    width: 800px;
    margin: auto;
    padding: 20px;
    background-color: white;
    /* box-shadow: 0px 0px 30px #777; */
}
</style>
<body>
<?php
    require_once "../includes/function.php";
    if(is_logado()==true){
            require_once "../includes/menuComponent.php";
        }
    require_once "../includes/banco.php";
    require_once "./class/endereco.php";
    require_once "../includes/function.php";
    ?>
    <div id="corpo">
        <?php
        if (is_logado() == true) {
            // require_once "../logout/logout-ht.php";
            echo '<h1>Endereço</h1>';
            $user = $_SESSION['user'];
            $get = new Endereco(null, null, null, null, null, $user);
            $q = $get->retornarDadosPegar();
            $busca = $banco->query($q);
            if ($busca == null) {
                echo "<div class='alert alert-warning' role='alert'>
                        Você não possui endereço
                      </div>";
            } else {

                while ($reg = $busca->fetch_object()) {
                    echo "<div class='card' style='margin-top:5px;'>
                <div class='card-body'>
                <div class='row'>
                    <div class='col'>
                        <h4>$reg->rua, $reg->numero</h3>
                    </div>
                    <div class='row'>
                    <div class='col'>
                        <h4> $reg->bairro</h3>
                    </div>
                    </div>
                    <div class='row'>
                    <div class='col'>
                        <h4> $reg->cep</h3>
                    </div>
                    </div>
                </div>

                <a href='delete-endereco.php?cod=$reg->idEndereco'><button type='button' class='btn btn-danger'>Deletar</button></a>
                <a href='edit-endereco-form.php?cod=$reg->idEndereco''><button type='button' class='btn btn-primary'>Editar</button></a>   
                </div>
                </div>";
                }
            }
            echo "<a href='new-endereco-form.php'><button style='margin-top: 8px;' type='button' class='btn btn-primary'>Novo Endereço</button></a>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Usuário não logado 
                  </div>';
        }
        ?>
        <!-- <a href="edit-contact-form.php">Editar</a>
        <a href="delete-contact.php">Deletar</a> -->

        <br>
    </div>
</body>
