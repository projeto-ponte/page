<head>
    <link rel='stylesheet' href='estilo/estilo.css'>
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
    require_once "../includes/function.php";
    // if(is_logado() == true){
    echo "
    <h1>Novo Endereço</h1>
    <form action='new-cadastro.php' method='post'>

        <div class='row g-3'>
            <div class='col-sm-5'>
                <label for='cnpj' class='form-label'>CPF/CNPJ</label>
                <input type='number' class='form-control' name='cnpj' id='cnpj' required placeholder='insira o documento'>
            </div>
            <div class='col-sm-7'>
                <label for='razaoSocial' class='form-label'>Razão Social</label>
                <input type='text' class='form-control' name='razaoSocial' id='razaoSocial'  placeholder='insira a razão social'>
            </div>
        </div>

        <div class='row g-3'>
            <div class='col-sm-8'>
                <label for='nomeFantasia' class='form-label'>Nome/Nome Fantasia</label>
                <input type='text' class='form-control' name='nomeFantasia' id='nomeFantasia' required placeholder='insira o nome'>
            </div>
            <div class='col-sm-4'>
                <label for='tipoOng' class='form-label'>Tipo da Ong</label>
                <input type='text' class='form-control' name='tipoOng' id='tipoOng' required placeholder='insira o tipo'>
            </div>
        </div>

        <div class='row g-3'>
            <div class='col-sm-8'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' class='form-control' name='email' id='email' required placeholder='insira o Email'>
            </div>
        </div>
        <div class='row g-3'>
            <div class='col-sm-8'>
                <label for='senha' class='form-label'>Senha</label>
                <input type='password' class='form-control' name='senha' id='senha' required placeholder='insira a senha'>
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