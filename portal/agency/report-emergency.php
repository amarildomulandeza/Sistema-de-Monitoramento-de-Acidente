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
                        <li class="active">
                            <a href="report-emergency.php"><i class="fa fa-heartbeat"></i> <span>Reportar</span></a>
                        </li>
                        <li>
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
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Reportar Emergência</h4>
                    </div>
                </div>
                <?php if (get("success")): ?>
                    <div>
                        <?= App::message("success", "Your request has been successfully submitted help is on the way") ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="save_emergency.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID de Emergência</label>
                                        <input class="form-control" type="text" name="emergency_id" value="<?php echo rand(1000, 9999); ?>" readonly="">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome da Agência</label>

                                        <select class="select" name="agency_id">

                                            <option>Seleccione</option>
                                            <?php
                                            $result = $db->prepare("SELECT * FROM agency ");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {
                                            ?>
                                                <option value="<?php echo $row['agency_id']; ?>"><?php echo $row['agency_name']; ?></option>
                                                <hr>
                                            <?php } ?>
                                        </select>

                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Gravidade</label>
                                        <select class="select" name="case_severity">
                                            <option>Seleccione</option>

                                            <option value="Normal">Normal</option>
                                            <option value="Critical">Crítico</option>
                                            <option value="Danger">Perigoso</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categoria de Emergência </label>
                                        <select class="select" name="emergency_category">
                                            <option>Seleccione</option>
                                            <?php
                                            $result = $db->prepare("SELECT * FROM emergency_type ");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {
                                            ?>
                                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input class="form-control" name="state" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contacto</label>
                                        <input class="form-control" name="phone_number" value="<?php echo $_SESSION['SESS_PHONE_NUMBER']; ?>" type="text" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control" name="name" value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input class="form-control" name="dates" value="<?php echo date('d-m-Y'); ?>" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" hidden>
                                        <label>ID do Usuário</label>
                                        <input class="form-control" name="victim_id" value="<?php echo $_SESSION['SESS_AGENCY_ID']; ?>" readonly type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" value="<?php echo $_SESSION['SESS_EMAIL']; ?>" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Carregue Imagem da Emergência</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea cols="30" rows="4" name="description" class="form-control"></textarea>
                            </div>





                            <div class="form-group">
                                <label>Endereço</label>
                                <textarea cols="30" rows="4" name="address" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6" hidden>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input class="form-control" name="status" value="Pendente" readonly type="text">
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Submeter</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <?php include 'includes/message.php'; ?>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'

            });
        });
    </script>
</body>


<!-- add-appointment24:07-->

</html>