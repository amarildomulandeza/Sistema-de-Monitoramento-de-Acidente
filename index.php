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
                            <a class="nav-link" href="reportar">Reportar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="estatistica.php">Estatísticas</a>
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
            <?php
                echo '<iframe src="https://acidentedeviacao.xyz/improved-banner.html" width="100%" height="500"></iframe>';
            ?>

            <!-- DICAS DE SEGURANÇA -->
            <div class="safety-tips">
                <div class="container">
                    <h2 class="text-center">Dicas de Segurança para Motoristas</h2>
                    <div class="row">
                        <div class="col-md-4 tip">
                            <h4>Use Cinto de Segurança</h4>
                            <p>O uso do cinto de segurança reduz significativamente o risco de lesões graves em caso de acidente.</p>
                        </div>
                        <div class="col-md-4 tip">
                            <h4>Respeite os Limites de Velocidade</h4>
                            <p>Manter uma velocidade adequada às condições da via pode prevenir muitos acidentes.</p>
                        </div>
                        <div class="col-md-4 tip">
                            <h4>Evite o Consumo de Álcool</h4>
                            <p>O consumo de álcool ao dirigir aumenta drasticamente o risco de acidentes graves e fatais.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TESTEMUNHOS -->
            <div class="testimonials">
                <div class="container">
                    <h2 class="text-center">O que os Usuários Dizem</h2>
                    <div class="row">
                        <div class="col-md-4 testimonial">
                            <p>"Este sistema me ajudou a reportar um acidente rapidamente, salvando vidas."</p>
                            <h5>- João Silva</h5>
                        </div>
                        <div class="col-md-4 testimonial">
                            <p>"Acompanhar os acidentes pela cidade me deixa mais consciente e seguro."</p>
                            <h5>- Maria Oliveira</h5>
                        </div>
                        <div class="col-md-4 testimonial">
                            <p>"Excelente iniciativa para melhorar a segurança nas estradas da Beira."</p>
                            <h5>- Carlos Pereira</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!--HOME 2 ICON BOXS-->
            <!-- <div class="uni-home-2-icons-box">
                        <div class="uni-shortcode-icons-box-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="uni-shortcode-icons-box-3-default">
                                            <div class="item-icons">
                                                <i class="fa fa-user-md" aria-hidden="true"></i>
                                            </div>
                                            <div class="item-caption">
                                                <h4>Admin</h4>
                                                <div class="uni-line"></div>
                                                <h4><a href="portal/admin">Login</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="uni-shortcode-icons-box-3-default">
                                            <div class="item-icons">
                                                <i class="fa fa-ambulance" aria-hidden="true"></i>
                                            </div>
                                            <div class="item-caption">
                                                <h4>Agency </h4>
                                                <div class="uni-line"></div>
                                                <h4><a href="portal/agency">Login</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="uni-shortcode-icons-box-3-default">
                                            <div class="item-icons">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                            <div class="item-caption">
                                                <h4>Users</h4>
                                                <div class="uni-line"></div>
                                                <h4><a href="portal/users">Login</a></h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> -->



            <!--DEPARTMENTS-->
            <div class="uni-hơm-1-department">
                <div class="container">
                    <div class="uni-home-title">
                        <h3>Agências Públicas</h3>
                        <div class="uni-underline"></div>
                    </div>
                    <div class="uni-shortcode-icon-box-1">
                        <div class="row">
                            <?php
                            // include 'connect.php'
                            $result = $db->prepare("SELECT * FROM agency ORDER BY id DESC ");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {
                            ?>
                                <div class="col-md-4  col-sm-6">
                                    <div class="uni-shortcode-icon-box-1-default">
                                        <div class="item-icons">
                                            <img src="uploads/<?php echo $row['photo']; ?>" alt="" class="img-responsive">
                                        </div>
                                        <div class="item-caption">
                                            <h4><?php echo $row['agency_name']; ?> <br> <small><?php echo $row['state']; ?></small></h4>
                                            <h3 style="text-align: center;"><?php echo $row['phone_number']; ?></h3>
                                            <h3 style="text-align: center;"><?php echo $row['email']; ?></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>






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