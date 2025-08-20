<?php include 'connect.php'; ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoramento de Acidentes na Cidade da Beira</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />

    <!-- Font Awesome (CDN) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugin/owl-carouse/owl.carousel.min.css">
    <link rel="stylesheet" href="plugin/owl-carouse/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugin/lightgallery/lightgallery.css">
    <!-- Outros CSS de Plugins -->
    <!-- ... -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customstyle.css">

    <style>
        /* Custom styles */
        body {
            padding-top: 70px;
            /* Altura da navbar fixa */
        }

        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand img {
            width: 50px;
            height: auto;
        }

        .btn-primary {
            margin-left: auto;
        }

        /* Garantir que o footer não cubra o conteúdo */
        .page-wrapper {
            padding-bottom: 100px;
            /* Altura aproximada do footer */
        }

        /* Ajustes adicionais para responsividade */
        @media (max-width: 767.98px) {
            .navbar-brand img {
                width: 40px;
            }
        }

        /* Estilo para a seção de estatísticas */
        .statistics {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .statistics h2 {
            margin-bottom: 30px;
        }

        .statistics table {
            width: 100%;
        }

        .statistics th,
        .statistics td {
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Carregamento da Página -->
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
                <!-- LOGO -->
                <a class="navbar-brand" href="#">
                    <img src="images/logo.png" alt="Logo Sistema de Monitoramento de Acidentes">
                </a>

                <!-- Botão Toggle para Mobile -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu de Navegação -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportar.php">Reportar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="statistics.php">Estatísticas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="02_04_contact.html">Contactos</a>
                        </li>
                    </ul>

                    <!-- Botão Entrar -->
                    <a href="portal/agency" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <div class="page-wrapper">


        <!-- Seção de Estatísticas de Acidentes -->
        <!-- Seção de Estatísticas -->
        <div class="statistics">
            <div class="container">
                <h2 style="padding-top: 20px;" class="text-center">Estatísticas de Acidentes na Cidade da Beira</h2>

                <!-- Tabela Principal: Acidentes por Mês -->
                <div class="table-responsive">
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
                    GROUP_CONCAT(DISTINCT case_severity SEPARATOR '<br>') AS gravidade,
                    GROUP_CONCAT(DISTINCT emergency_category SEPARATOR '<br>') AS tipo_acidente,
                    GROUP_CONCAT(DISTINCT state SEPARATOR '<br>') AS local
                FROM 
                    emergency
                GROUP BY mes
                ORDER BY MONTH(STR_TO_DATE(dates, '%d-%m-%Y'))";
                
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
                    
                    // Percorrendo os resultados e exibindo as linhas da tabela
                    while($row_mes = $result_mes->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row_mes['mes']}</td>
                                <td>{$row_mes['total_acidentes']}</td>
                                <td>{$row_mes['gravidade']}</td>
                                <td>{$row_mes['local']}</td>
                                <td>{$row_mes['tipo_acidente']}</td>
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
                
                echo '<br><h3 style="padding-top: 20px; padding-bottom: 15px;" class="text-center">Total de Acidentes por Local</h3>';
                if ($result_local->num_rows > 0) {
                    echo '<table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Local</th>
                                    <th>Número de Acidentes</th>
                                </tr>
                            </thead>
                            <tbody>';
                    
                    // Percorrendo os resultados e exibindo as linhas da tabela
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
                
                echo '<h3 style="padding-top: 20px; padding-bottom: 15px;" class="text-center">Total de Acidentes por Tipo de Acidente</h3>';
                if ($result_tipo->num_rows > 0) {
                    echo '<table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Tipo de Acidente</th>
                                    <th>Número de Acidentes</th>
                                </tr>
                            </thead>
                            <tbody>';
                    
                    // Percorrendo os resultados e exibindo as linhas da tabela
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
            </div>
        </div>

        <!-- Rodapé -->
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

    </div> <!-- End of main-wrapper -->

    <!-- jQuery, Popper.js e Bootstrap JS (CDN) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Plugins JS -->
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="plugin/owl-carouse/owl.carousel.min.js"></script>
    <script src="plugin/lightgallery/lightgallery.js"></script>
    <!-- Outros Plugins JS -->
    <!-- ... -->

    <!-- Custom JS -->
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>

    <!-- Inicialização de Plugins -->
    <script>
        $(document).ready(function() {
            // Inicializar o Owl Carousel
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });

            // Inicializar o LightGallery
            $('#lightgallery').lightGallery({
                selector: 'a'
            });

            // Inicializar Select2
            $('.select').select2({
                placeholder: "Seleccione",
                allowClear: true
            });
        });
    </script>

</body>

</html>