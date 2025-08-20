<?php include 'includes/head.php'; ?>

<body onload="initMap()">
    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Reportar Emergência</h4>
                    </div>
                </div>
                <?php if (get("success")): ?>
                    <div>
                        <?= App::message("success", "Sua solicitação foi enviada com sucesso. A ajuda está a caminho") ?>
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
                                        <label>Agência a Reportar</label>

                                        <select class="select" name="agency_id">

                                            <option>Selecionar</option>
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
                                        <label>Gravidade do Acidente</label>
                                        <select class="select" name="case_severity">
                                            <option>Selecionar</option>

                                            <option value="Normal">Normal</option>
                                            <option value="Critical">Critico</option>
                                            <option value="Danger">Perigoso</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Acidente</label>
                                        <select class="select" name="emergency_category">
                                            <option>Selecionar</option>
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
                                        <label>Celular</label>
                                        <input class="form-control" name="phone_number" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Seu Nome</label>
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data e Hora</label>
                                        <input class="form-control" name="dates" value="<?php echo date('d-m-Y H:i'); ?>" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" hidden>
                                        <label>ID</label>
                                        <input class="form-control" name="victim_id" value="<?php echo $_SESSION['SESS_USERS_ID']; ?>" readonly type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Carregue a Fotografia do Acidente</label>
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
                                <label for="address">Enderenço Exacto do Acidente (Acione manualmente ou use o mapa abaixo)</label>
                                <textarea cols="30" rows="4" id="address" name="address" class="form-control"></textarea>
                            </div>
                            
                            <div id="map"></div><br><br>
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