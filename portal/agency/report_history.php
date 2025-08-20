<?php include 'includes/head.php'; ?>

<body>
    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Início</span></a>
                        </li>


                        <?php
                        // include('../connect.php');
                        $result = $db->prepare("SELECT count(*) as total FROM emergency WHERE agency_id = {$_SESSION['SESS_AGENCY_ID']} AND status = 'Pendente' ");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                        ?>
                            <li>
                                <a href="view-emergency.php"><i class="fa fa-file"></i> <span>Emergências</span> <span class="badge badge-pill bg-primary float-right"><?php echo $row['total']; ?></span></a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="report-emergency.php"><i class="fa fa-heartbeat"></i> <span>Reportar</span></a>
                        </li>
                        <li class="active">
                            <a href="report_history.php"><i class="fa fa-file-text-o"></i> <span>Histórico de Reportes</span></a>
                        </li>
                        <li>
                            <a href="profile.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                        </li>
                        <!-- <li>
                            <a href="information.php"><i class="fa fa-plus"></i> <span>Informação do Projecto</span></a>
                        </li> -->
                        <li>
                            <a href="logout.php"><i class="fa fa-power-off"></i> <span>Sair</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Meu Histórico</h4>
                </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box mb-0">
                        <h3 class="card-title">Histórico</h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <?php
                                $result = $db->prepare("SELECT * FROM emergency WHERE agency_id = {$_SESSION['SESS_AGENCY_ID']} AND status = 'Resolvido'   ");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {

                                ?>

                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">Reportou <?php echo $row['emergency_category']; ?> <?php echo $row['case_severity']; ?>
                                            <div class="timeline-content">em <?php echo $row['address']; ?>, <?php echo $row['state']; ?>
                                                <span class="time"><?php echo $row['date']; ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->

</html>