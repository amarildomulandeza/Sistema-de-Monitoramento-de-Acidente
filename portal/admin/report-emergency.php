<?php include 'includes/head.php'; ?>

<body>
    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menú</li>
                        <li class="">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Início</span></a>
                        </li>
                        <li class="">
                            <a href="agency.php"><i class="fa fa-user-md"></i> <span>Agências</span></a>
                        </li>
                        <li>
                            <a href="emergency_type.php"><i class="fa fa-wheelchair"></i> <span>Tipos de Emergências</span></a>
                        </li>
                        <?php
                        // include('../connect.php');
                        $result = $db->prepare("SELECT count(*) as total FROM emergency WHERE status = 'Pendente'");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                        ?>
                            <li>
                                <a href="view-emergency.php"><i class="fa fa-file"></i> <span>Ver Emergências</span> <span class="badge badge-pill bg-primary float-right"><?php echo $row['total']; ?></span></a>
                            </li>
                        <?php } ?>
                        <li class="active">
                            <a href="report-emergency.php"><i class="fa fa-heartbeat"></i> <span>Reportar Emergência</span></a>
                        </li>
                        <li>
                            <a href="report_history.php"><i class="fa fa-file-text-o"></i> <span>Histórico de Emergências</span></a>
                        </li>
                        <li>
                            <a href="users.php"><i class="fa fa-user-plus"></i> <span>Gerir Admin</span></a>
                        </li>
                        <li>
                        </li>
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
                        <h4 class="page-title">Reporte de Emergência</h4>
                    </div>
                </div>
                <?php if (get("success")): ?>
                    <div>
                        <?= App::message("success", "Sua solicitação foi enviada com sucesso. A ajuda está a caminho.") ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="save_emergency.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID da Emergência</label>
                                        <input class="form-control" type="text" name="emergency_id" value="<?php echo rand(1000, 9999); ?>" readonly="">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome da Agência</label>

                                        <select class="select" name="agency_id">

                                            <option>Selecione</option>
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
                                            <option>Selecione</option>

                                            <option value="Normal">Normal</option>
                                            <option value="Critical">Crítico</option>
                                            <option value="Danger">Perigoso</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categoria da Emergência </label>
                                        <select class="select" name="emergency_category">
                                            <option>Select</option>
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
                                        <label>Contactor</label>
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
                                        <label>Email</label>
                                        <input class="form-control" name="email" value="<?php echo $_SESSION['SESS_EMAIL']; ?>" readonly type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Carregue a Fotografia da Emergência</label>
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
                                <label>Enderenço</label>
                                <textarea cols="30" rows="4" name="address" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6" hidden>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input class="form-control" name="status" value="Pendente" readonly type="text">
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Enviar Requisição</button>
                            </div>


                        </form>


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