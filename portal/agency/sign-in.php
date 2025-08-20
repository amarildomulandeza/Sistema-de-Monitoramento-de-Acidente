<?php
session_start();
if (isset($_SESSION['SESS_FIRST_NAME'])) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- index22:59-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        /* Estilo personalizado para o botão Voltar ao Início */
        .btn-custom {
            background-color: #f8f9fa;
            color: #007bff;
            border: 2px solid #007bff;
            border-radius: 30px;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
    </style>
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form method="post" action="process-login.php" class="form-signin">
                        <div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                            <br>
                            <p>SISTEMA DE MONITORAMENTO DE ACIDENTES</p>

                        </div>
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" name="username" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary account-btn">Entrar</button>
                        </div>

                        <!-- Botão personalizado para Voltar ao Início -->
                        <div class="form-group text-center">
                            <a href="/ems" class="btn btn-custom">Voltar ao Início</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

<!-- login23:12-->

</html>