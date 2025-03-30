<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Redirect if not logged in
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit;
}

$msg = '';
$error = '';

// Mark query as read
if (isset($_REQUEST['eid'])) {
    $eid = intval($_GET['eid']);
    $sql = "UPDATE tblcontactusquery SET status=1 WHERE id=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':eid', $eid, PDO::PARAM_INT);
    $msg = ($query->execute()) ? "Query marked as read." : "Failed to update status.";
}

// Delete query
if (isset($_REQUEST['del'])) {
    $did = intval($_GET['del']);
    $sql = "DELETE FROM tblcontactusquery WHERE id=:did";
    $query = $dbh->prepare($sql);
    $query->bindParam(':did', $did, PDO::PARAM_INT);
    $msg = ($query->execute()) ? "Record deleted successfully." : "Failed to delete record.";
}

// Fetch queries
$sql = "SELECT * FROM tblcontactusquery";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BBDMS | Manage Queries</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .errorWrap, .succWrap {
            padding: 10px;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 1px 1px rgba(0,0,0,.1);
        }
        .errorWrap { border-left: 4px solid #dd3d36; }
        .succWrap { border-left: 4px solid #5cb85c; }
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="page-title">Manage Contact Us Queries</h2>
                <div class="panel panel-default">
                    <div class="panel-heading">User  Queries</div>
                    <div class="panel-body">
                        <?php if ($error) echo "<div class='errorWrap'><strong>ERROR</strong>: ".htmlentities($error)."</div>"; ?>
                        <?php if ($msg) echo "<div class='succWrap'><strong>SUCCESS</strong>: ".htmlentities($msg)."</div>"; ?>
                        <div class="table-responsive">
                            <table id="zctb" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Message</th>
                                        <th>Posting Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cnt = 1; foreach ($results as $result) { ?>
                                        <tr>
                                            <td><?= htmlentities($cnt++) ?></td>
                                            <td><?= htmlentities($result->name) ?></td>
                                            <td><?= htmlentities($result->EmailId) ?></td>
                                            <td><?= htmlentities($result->ContactNumber) ?></td>
                                            <td><?= htmlentities($result->Message) ?></td>
                                            <td><?= htmlentities($result->PostingDate) ?></td>
                                            <td><?= $result->status == 1 ? 'Read' : 'Pending' ?></td>
                                            <td>
                                                <?php if ($result->status == 1) { ?>
                                                    <a href="?del=<?= htmlentities($result->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                                <?php } else { ?>
                                                    <a href="?eid=<?= htmlentities($result->id) ?>" onclick="return confirm('Mark as read?')">Mark as Read</a> |
                                                    <a href="?del=<?= htmlentities($result->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#zctb').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10
            });
        });
    </script>
</body>
</html>