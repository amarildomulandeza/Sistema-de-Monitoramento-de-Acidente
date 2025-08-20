<?php  include 'connect.php'; ?>
<!doctype html>
<html lang="en">

<!-- 01_02_home_2.html  [XR&CO'2014], Tue, 22 Oct 2019 11:54:23 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoramento de Acidentes na Cidade da Beira </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="fonts/poppins/poppins.css">
    <link rel="stylesheet" href="plugin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugin/process-bar/tox-progress.css">
    <link rel="stylesheet" href="plugin/owl-carouse/owl.carousel.min.css">
    <link rel="stylesheet" href="plugin/owl-carouse/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugin/animsition/css/animate.css">
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugin/mediaelement/mediaelementplayer.css">
    <link rel="stylesheet" href="plugin/datetimepicker/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="plugin/datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="plugin/lightgallery/lightgallery.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customstyle.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom styles */
        .navbar {
            position: fixed;
            /* Keep the navbar fixed at the top */
            width: 100%;
            /* Make it full-width */
            z-index: 1000;
            /* Ensure it appears above other content */
        }

        .navbar-brand img {
            width: 50px;
            /* Adjust logo size */
            height: auto;
            /* Maintain aspect ratio */
        }

        .navbar-nav {
            flex-grow: 1;
            /* Ensure the nav items take up available space */
        }

        .btn-primary {
            margin-left: auto;
            /* Push the button to the right */
        }
    </style>
</head>

<body>

    <!--load page-->
    <div class="load-page">
        <div class="sk-wave">
            <div class="sk-rect sk-rect1"></div>
            <div class="sk-rect sk-rect2"></div>
            <div class="sk-rect sk-rect3"></div>
            <div class="sk-rect sk-rect4"></div>
            <div class="sk-rect sk-rect5"></div>
        </div>
    </div>

    <!-- Cabeçalho -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="images/logo.png" alt="Logo Sistema de Monitoramento de Acidentes">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportar.php">Reportar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statistics.php">Estatísticas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="02_04_contact.html">Contactos</a>
                        </li>
                    </ul>
                    <a href="portal/agency" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </nav>
    </header>


    <div id="main-content" class="site-main-content">
        <section class="site-content-area">

            <!--BANNER-->
            <div class="uni-banner">
                <div class="uni-owl-one-item owl-carousel owl-theme">
                    <div class="item">
                        <div class="uni-banner-img uni-background-6"></div>
                        <div class="content animated" data-animation="flipInX" data-delay="0.9s">
                            <div class="container">
                                <div class="caption">
                                    <h1>Reporte os Acidentes no seu Bairro</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="uni-banner-img uni-background-5"></div>
                        <div class="content animated" data-animation="flipInX" data-delay="0.9s">
                            <div class="container">
                                <div class="caption">
                                    <h1>Acompanhe o Mapeamento das Regioes Perigosas</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="uni-banner-img uni-background-7"></div>
                        <div class="content animated" data-animation="flipInX" data-delay="0.9s">
                            <div class="container">
                                <div class="caption">
                                    <h1>Encontre os Contactos das Agências de Emergência</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php

// Executando a primeira consulta SQL (dados agrupados por mês)
$sql_mes = "SELECT 
    CASE MONTH(STR_TO_DATE(dates, '%d-%m-%Y'))
        WHEN 1 THEN 'Janeiro'
        WHEN 2 THEN 'Fevereiro'
        WHEN 3 THEN 'Março'
        WHEN 4 THEN 'Abril'
        WHEN 5 THEN 'Maio'
        WHEN 6 THEN 'Junho'
        WHEN 7 THEN 'Julho'
        WHEN 8 THEN 'Agosto'
        WHEN 9 THEN 'Setembro'
        WHEN 10 THEN 'Outubro'
        WHEN 11 THEN 'Novembro'
        WHEN 12 THEN 'Dezembro'
    END AS mes,
    COUNT(*) AS total_acidentes,
    MAX(case_severity) AS maior_case_severity,
    MAX(emergency_category) AS maior_emergency_category,
    MAX(state) AS maior_state
FROM 
    emergency
GROUP BY mes
ORDER BY MIN(STR_TO_DATE(dates, '%d-%m-%Y'))";

$result_mes = $conn->query($sql_mes);

echo '<h2>Dados Agrupados por Mês</h2>';
if ($result_mes->num_rows > 0) {
    echo '<table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Mês</th>
                    <th>Número de Acidentes</th>
                    <th>Gravidade</th>
                    <th>Local</th>
                    <th>Tipo de Acidente</th>
                </tr>
            </thead>
            <tbody>';
    
    while($row_mes = $result_mes->fetch_assoc()) {
        echo "<tr>
                <td>{$row_mes['mes']}</td>
                <td>{$row_mes['total_acidentes']}</td>
                <td>{$row_mes['maior_case_severity']}</td>
                <td>{$row_mes['maior_state']}</td>
                <td>{$row_mes['maior_emergency_category']}</td>
              </tr>";
    }
    
    echo '</tbody></table>';
} else {
    echo "0 resultados";
}

// Executando a segunda consulta SQL (total de acidentes por local)
$sql_local = "SELECT 
    state AS local,
    COUNT(*) AS total_acidentes
FROM 
    emergency
GROUP BY local
ORDER BY total_acidentes DESC";

$result_local = $conn->query($sql_local);

echo '<h2>Total de Acidentes por Local</h2>';
if ($result_local->num_rows > 0) {
    echo '<table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Local</th>
                    <th>Número de Acidentes</th>
                </tr>
            </thead>
            <tbody>';
    
    while($row_local = $result_local->fetch_assoc()) {
        echo "<tr>
                <td>{$row_local['local']}</td>
                <td>{$row_local['total_acidentes']}</td>
              </tr>";
    }
    
    echo '</tbody></table>';
} else {
    echo "0 resultados";
}

// Executando a terceira consulta SQL (total de acidentes por tipo de acidente)
$sql_tipo = "SELECT 
    emergency_category AS tipo_acidente,
    COUNT(*) AS total_acidentes
FROM 
    emergency
GROUP BY tipo_acidente
ORDER BY total_acidentes DESC";

$result_tipo = $conn->query($sql_tipo);

echo '<h2>Total de Acidentes por Tipo de Acidente</h2>';
if ($result_tipo->num_rows > 0) {
    echo '<table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tipo de Acidente</th>
                    <th>Número de Acidentes</th>
                </tr>
            </thead>
            <tbody>';
    
    while($row_tipo = $result_tipo->fetch_assoc()) {
        echo "<tr>
                <td>{$row_tipo['tipo_acidente']}</td>
                <td>{$row_tipo['total_acidentes']}</td>
              </tr>";
    }
    
    echo '</tbody></table>';
} else {
    echo "0 resultados";
}

$conn->close();
?>






        </section>
    </div>

    <footer class="site-footer footer-default">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Sobre o Sistema -->
                    <div class="col-md-4 col-sm-6">
                        <h4>Sobre o Sistema</h4>
                        <p>
                            O Sistema de Monitoramento de Acidentes visa melhorar a segurança nas estradas através da coleta e análise de dados sobre acidentes de trânsito em tempo real.
                        </p>
                    </div>
                    <!-- Contato -->
                    <div class="col-md-4 col-sm-6">
                        <h4>Contato</h4>
                        <ul class="contact-info list-unstyled">
                            <li><i class="fa fa-map-marker-alt"></i> Universidade Zambeze, Beira, Moçambique</li>
                            <li><i class="fa fa-phone"></i> +258 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:suporte@unizambeze.ac.mz">suporte@unizambeze.ac.mz</a></li>
                        </ul>
                    </div>
                    <!-- Links Rápidos -->
                    <div class="col-md-4 col-sm-12">
                        <h4>Links Rápidos</h4>
                        <ul class="quick-links list-unstyled">
                            <li><a href="#">Início</a></li>
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Serviços</a></li>
                            <li><a href="#">Contato</a></li>
                            <li><a href="#">Política de Privacidade</a></li>
                            <li><a href="#">Termos de Uso</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 text-center text-sm-left mb-2 mb-sm-0">
                        <p class="copyright-text">
                            &copy; 2024 <a href="#">Sistema de Monitoramento de Acidentes</a>. Todos os direitos reservados.
                        </p>
                    </div>
                    <div class="col-sm-6 text-center text-sm-right">
                        <div class="social-icons">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </div>
    </div>
    <script src="plugin/jquery/jquery-2.0.2.min.js"></script>
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="plugin/bootstrap/js/bootstrap.js"></script>
    <script src="plugin/process-bar/tox-progress.js"></script>
    <script src="plugin/waypoint/jquery.waypoints.min.js"></script>
    <script src="plugin/counterup/jquery.counterup.min.js"></script>
    <script src="plugin/owl-carouse/owl.carousel.min.js"></script>
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="plugin/mediaelement/mediaelement-and-player.js"></script>
    <script src="plugin/masonry/masonry.pkgd.min.js"></script>
    <script src="plugin/datetimepicker/moment.min.js"></script>
    <script src="plugin/datetimepicker/bootstrap-datepicker.min.js"></script>
    <script src="plugin/datetimepicker/bootstrap-datepicker.tr.min.js"></script>
    <script src="plugin/datetimepicker/bootstrap-datetimepicker.js"></script>
    <script src="plugin/datetimepicker/bootstrap-datetimepicker.fr.js"></script>

    <script src="plugin/lightgallery/picturefill.min.js"></script>
    <script src="plugin/lightgallery/lightgallery.js"></script>
    <script src="plugin/lightgallery/lg-pager.js"></script>
    <script src="plugin/lightgallery/lg-autoplay.js"></script>
    <script src="plugin/lightgallery/lg-fullscreen.js"></script>
    <script src="plugin/lightgallery/lg-zoom.js"></script>
    <script src="plugin/lightgallery/lg-hash.js"></script>
    <script src="plugin/lightgallery/lg-share.js"></script>
    <script src="plugin/sticky/jquery.sticky.js"></script>



    <script src="js/main.js"></script>
</body>

<!-- 01_02_home_2.html  [XR&CO'2014], Tue, 22 Oct 2019 11:54:52 GMT -->

</html>