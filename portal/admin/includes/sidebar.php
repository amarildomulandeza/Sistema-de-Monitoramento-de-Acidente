<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Menu</li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-dashboard"></i> <span>Início</span></a>
                </li>
                <li>
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