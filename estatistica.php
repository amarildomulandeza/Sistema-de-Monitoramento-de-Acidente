<?php  include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="pt">

<!-- 01_02_home_2.html  [XR&CO'2014], Tue, 22 Oct 2019 11:54:23 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estasticas de Acidentes</title>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportar">Reportar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="estatistica.php">Estatisticas</a>
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
<br><br><br><br>
<?php
// 1) Acidentes por mÃªs
$sql_mes = "SELECT 
    CASE MONTH(STR_TO_DATE(dates, '%d-%m-%Y'))
        WHEN 1 THEN 'Janeiro'
        WHEN 2 THEN 'Fevereiro'
        WHEN 3 THEN 'MarÃ§o'
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
    COUNT(*) AS total
FROM emergency
GROUP BY mes
ORDER BY MIN(STR_TO_DATE(dates, '%d-%m-%Y'))";
$res_mes = $conn->query($sql_mes);

$meses = [];
$val_mes = [];
while($r = $res_mes->fetch_assoc()){
    $meses[] = $r['mes'];
    $val_mes[] = $r['total'];
}

// 2) Acidentes por local
$sql_local = "SELECT state AS local, COUNT(*) AS total FROM emergency GROUP BY local ORDER BY total DESC";
$res_local = $conn->query($sql_local);
$locais = [];
$val_local = [];
while($r = $res_local->fetch_assoc()){
    $locais[] = $r['local'];
    $val_local[] = $r['total'];
}

// 3) Acidentes por tipo
$sql_tipo = "SELECT emergency_category AS tipo, COUNT(*) AS total FROM emergency GROUP BY tipo ORDER BY total DESC";
$res_tipo = $conn->query($sql_tipo);
$tipos = [];
$val_tipo = [];
while($r = $res_tipo->fetch_assoc()){
    $tipos[] = $r['tipo'];
    $val_tipo[] = $r['total'];
}
$conn->close();
?>

<div class="container">
    <h2 class="mb-3">ðŸ“Š GrÃ¡ficos de Acidentes</h2>

    <div class="mb-4">
        <canvas id="graficoMes" height="100"></canvas>
    </div>

    <div class="row">
        <div class="col-md-6">
            <canvas id="graficoLocal"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="graficoTipo"></canvas>
        </div>
    </div>
</div>

<script>
// Dados do PHP para JS
const meses = <?php echo json_encode($meses); ?>;
const valoresMes = <?php echo json_encode($val_mes); ?>;
const locais = <?php echo json_encode($locais); ?>;
const valoresLocal = <?php echo json_encode($val_local); ?>;
const tipos = <?php echo json_encode($tipos); ?>;
const valoresTipo = <?php echo json_encode($val_tipo); ?>;

// 1) GrÃ¡fico de barras - Acidentes por mÃªs
new Chart(document.getElementById('graficoMes'), {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [{
            label: 'Acidentes por MÃªs',
            data: valoresMes,
            backgroundColor: '#007bff'
        }]
    },
    options: { responsive: true }
});

// 2) Pizza - Acidentes por local
new Chart(document.getElementById('graficoLocal'), {
    type: 'pie',
    data: {
        labels: locais,
        datasets: [{
            label: 'Acidentes por Local',
            data: valoresLocal,
            backgroundColor: [
                '#FF6384','#36A2EB','#FFCE56','#4BC0C0',
                '#9966FF','#FF9F40','#8BC34A','#E91E63'
            ]
        }]
    },
    options: { responsive: true }
});

// 3) Pizza - Acidentes por tipo
new Chart(document.getElementById('graficoTipo'), {
    type: 'pie',
    data: {
        labels: tipos,
        datasets: [{
            label: 'Acidentes por Tipo',
            data: valoresTipo,
            backgroundColor: [
                '#FF6384','#36A2EB','#FFCE56','#4BC0C0',
                '#9966FF','#FF9F40','#8BC34A','#E91E63'
            ]
        }]
    },
    options: { responsive: true }
});
</script>
<br><br><br><br><br><br>
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
