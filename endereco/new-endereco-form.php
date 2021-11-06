<head>
    <link rel='stylesheet' href='estilo/estilo.css'>
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
<div id='corpo'>
<?php 
require_once "../includes/function.php";
if(is_logado() == true){
echo "
    <h1>Novo Endereço</h1>
    <form action='new-endereco.php' method='post'>

        <div class='row g-3'>
            <div class='col-sm-8'>
                <label for='numero' class='form-label'>Endereço</label>
                <input type='text' class='form-control' name='rua' id='rua' required placeholder='insira o endereço'>
            </div>
            <div class='col-sm-4'>
                <label for='numero' class='form-label'>Bairro</label>
                <input type='text' class='form-control' name='bairro' id='bairro' required placeholder='insira o bairro'>
            </div>
        </div>

        <div class='row g-3'>
            <div class='col-sm-3'>
                <label for='numero' class='form-label'>Número</label>
                <input type='number' class='form-control' name='numero' id='numero' required placeholder='insira o número'>
            </div>
            <div class='col-sm-9'>
                <label for='descricao' class='form-label'>CEP</label>
                <input type='number' class='form-control' name='cep' id='cep' required placeholder='insira o CEP'>
            </div>
        </div>
        <div style='margin-top: 10px;' class='d-grid gap-2 d-md-block'>
            <button type='submit' class='btn btn-success'>Salvar</button>
            <a href='index.php'><button type='button' class='btn btn-primary'>Voltar</button></a>
        </div>
    </form>";
}
else{
    echo "<div class='alert alert-danger' role='alert'>
                    Usuário não logado 
                  </div>
                  <a href='index.php'><button type='button' class='btn btn-primary'>Voltar</button></a>";
}
?>
</div>