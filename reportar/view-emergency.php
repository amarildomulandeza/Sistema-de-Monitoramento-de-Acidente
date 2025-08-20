<?php include 'includes/head.php'; ?>

<body>
    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">All Emergency Report</h4>
                    </div>
                    
                </div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
                            <label>From Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" name="from_date" id="from_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>To Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" name="to_date" id="to_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>&nbsp;</label>
                                <button class="btn btn-primary" id="search-btn"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
					<div class="col-md-12">

						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0" id="myTable">
								<thead>
									<tr>
                                        <th>No</th>
										<th>Case ID</th>
										<th>Issue</th>
										<th>Address</th>
										<th>Case Severity</th>
                                        <th>Status</th>
                                        <th>Date/Time</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
                $result = $db->prepare("SELECT * FROM emergency WHERE victim_id = {$_SESSION['SESS_USERS_ID']} AND status = 'Pending' ");
                $result->execute();
                for($i=1; $row = $result->fetch(); $i++){  
               
               ?> <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['emergency_id']; ?></td>
                                        <!-- <td><?php echo $row['agency_name']; ?></td> -->
                                        <td><?php echo $row['emergency_category']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['case_severity']; ?></td>
                                        <td > 
                                        <?php
                                        if($row['status']=="Pending"){
                                        echo "<p  class='status-red'>Pending</p>";   
                                        
                                        }else{
                                        echo "<p  class='status-green'>Resolved</p>";
                                        }     
                                        ?>   
                                        </td>
                                        <td><?php echo $row['dates']; ?></td>
                                        <td class="text-right">
                                            <a class="btn btn-primary" href="make_action.php?id=<?php echo $row['id'];?>"><i class="fa fa-eye m-r-5"></i> View Details</a>
                                            <!-- <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="make_action.php"><i class="fa fa-pencil m-r-5"></i> View Details</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div> -->
                                        </td>
                                    </tr>
                                <?php } ?>
									
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
           <?php include 'includes/message.php'; ?>
        </div>
		<div id="delete_patient" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Patient?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
    $(document).ready(function () {
        // Initialize the datepickers
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-crosshairs',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });

        // Handle the search button click event
        $('#search-btn').click(function () {
            var fromDate = $('#from_date').val();
            var toDate = $('#to_date').val();

            // Perform the search via AJAX
            $.ajax({
                url: 'search_emergency.php', // Replace with the actual search PHP file
                method: 'POST',
                data: {from_date: fromDate, to_date: toDate},
                success: function (response) {
                    // Update the table with the search results
                    $('#myTable tbody').html(response);
                }
            });
        });
    });
</script>
</body>


<!-- patients23:19-->
</html>