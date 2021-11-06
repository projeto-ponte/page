<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="estilo/estilo.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color: #f0f2f5;
    }

    /* div#corpo {
        color: #000;
        font: 12px Verdana, sans-serif;
        margin-top: 40px;
    } */

    /* div#conteudo {
        width: 70%;
        float: right;
        text-align: center;
    } */
    div#menuTop {
        height: 10vh;
    }

    div#menu {
        border-radius: 40px;
        width: 50px;
        padding: 0;
        float: left;
        padding: 15px;
        background-color: white;
        margin-left: 40px;
        height: 32vh;
        margin-top: 15vh;
        margin-bottom: 15vh;
        box-shadow: 2px 3px 3px rgb(109, 109, 109);
    }

    div#menu ul li {
        /* margin: 0; */
        /* padding: 0px; */
        /* text-align: left; */
        list-style-type: none;
        /* height: 30px; */
        text-decoration: none;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: -37px;
    }

    div#publi {
        border-radius: 20px;
        margin: auto;
        height: 80vh;
        width: 1000px;
        background-color: white;
    }

    div#campos {
        height: 10vh;
        background-color: black;
    }
    /* div#body{
        width: 100px;
        margin: auto;
    } */


    /* a {
        height: 20px;
    } */
</style>


<body>
    <!-- <div id="corpo"> -->

    <div id="menuTop">
        <nav class="navbar navbar-white bg-white">
            <div class="container-fluid">
                <a style="margin-left: 50px;" class="navbar-brand"><img style="height: 60px; " src="../../ponte/images/logo 2.png" href="../index.php" alt=""></a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </div>
    <div id="menu">
        <ul>
            <li><a href="../../ponte/cadastro/edit-user-form.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg></a></li>
            <li><a href="../../ponte"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg></a></li>
            <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg></a></li>
            <li><a href="../../ponte/config/config.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg></a></li>
        </ul>
    </div>
    <div style="height: 30px;"></div>
    <!-- <div id='publi'>
        <div id="campos">

        </div>
    </div> -->
    <!-- </div> -->
</body>

</html>