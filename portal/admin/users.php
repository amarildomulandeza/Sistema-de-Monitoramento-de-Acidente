<?php include 'includes/head.php'; ?>

<body>
    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
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
                        <li>
                            <a href="report-emergency.php"><i class="fa fa-heartbeat"></i> <span>Reportar Emergências</span></a>
                        </li>
                        <li>
                            <a href="report_history.php"><i class="fa fa-file-text-o"></i> <span>Histórico de Emergências</span></a>
                        </li>
                        <li class="active">
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
                        <h4 class="page-title">Adicionar Administrador</h4>
                    </div>
                </div>
                <?php if (get("success")): ?>
                    <div>
                        <?= App::message("success", "Utilizador eliminado") ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="save_admin.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contacto</label>
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input class="form-control" type="text" name="state">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <input class="form-control" type="text" name="username">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fotografia</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>ID do Admin</label>
                                    <input class="form-control" type="text" name="agency_id" value="<?php echo rand(1000, 9999); ?>" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Enderenço</label>
                                <textarea cols="30" rows="4" name="address" class="form-control"></textarea>
                            </div>


                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4 col-3">
                            <h4 class="page-title">Todos Admins</h4>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table datatable mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th>Nome</th>
                                            <th>ID</th>
                                            <th>Contacto</th>
                                            <th>Email</th>
                                            <th>Bairro</th>
                                            <th>Endereço</th>
                                            <th class="text-right">Acção</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $loggedInAdminId = $_SESSION['SESS_MEMBER_ID']; // Get the ID of the currently logged-in admin

                                        $result = $db->prepare("SELECT * FROM admin WHERE id <> :loggedInAdminId");
                                        $result->bindParam(':loggedInAdminId', $loggedInAdminId);
                                        $result->execute();

                                        $i = 1;
                                        while ($row = $result->fetch()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="../../uploads/<?php echo $row['photo']; ?>" class="rounded-circle m-r-5" width="28" height="28"></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['agency_id']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['state']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td class="text-right">
                                                    <a class="btn btn-primary" href="delete_users.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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