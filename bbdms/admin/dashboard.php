<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0) {	
    header('location:index.php');
} else {
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>BBDMS | Admin Dashboard</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .stat-panel {
            transition: transform 0.3s;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .stat-panel:hover {
            transform: scale(1.05);
        }
        .panel-footer {
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        .panel-footer a {
            color: #007bff;
        }
        .chart-container {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Dashboard</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default stat-panel">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <?php 
                                                    $sql = "SELECT id FROM tblbloodgroup";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $bg = $query->rowCount();
                                                    ?>
                                                    <div class="stat-panel-number h1"><?php echo htmlentities($bg); ?></div>
                                                    <div class="stat-panel-title text-uppercase">Listed Blood Groups</div>
                                                </div>
                                            </div>
                                            <a href="manage-bloodgroup.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default stat-panel">
                                            <div class="panel-body bk-success text-light">
                                                <div class="stat-panel text-center">
                                                    <?php 
                                                    $sql1 = "SELECT id FROM tblblooddonars";
                                                    $query1 = $dbh->prepare($sql1);
                                                    $query1->execute();
                                                    $regbd = $query1->rowCount();
                                                    ?>
                                                    <div class="stat-panel-number h1"><?php echo htmlentities($regbd); ?></div>
                                                    <div class="stat-panel-title text-uppercase">Registered Donors</div>
                                                </div>
                                            </div>
											<a href="donor-list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default stat-panel">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">
                                                    <?php 
                                                    $sql6 = "SELECT id FROM tblcontactusquery";
                                                    $query6 = $dbh->prepare($sql6);
                                                    $query6->execute();
                                                    $queryCount = $query6->rowCount();
                                                    ?>
                                                    <div class="stat-panel-number h1"><?php echo htmlentities($queryCount); ?></div>
                                                    <div class="stat-panel-title text-uppercase">Total Queries</div>
                                                </div>
                                            </div>
                                            <a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						

                        <!-- Chart Section -->
                        <div class="chart-container">
                        
                            <canvas id="donationTrendsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        window.onload = function() {
            // Chart for Blood Donation Trends
            var ctx = document.getElementById("donationTrendsChart").getContext("2d");
            var donationTrendsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // Example labels
                    datasets: [{
                        label: 'Donations',
                        data: [12, 19, 3, 5, 2, 3, 7], // Example data
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
<?php } ?>