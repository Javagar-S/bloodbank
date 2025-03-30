<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $fullname = trim($_POST['fullname']);
        $mobile = trim($_POST['mobileno']);
        $email = trim($_POST['emailid']);
        $age = trim($_POST['age']);
        $gender = trim($_POST['gender']);
        $bloodgroup = trim($_POST['bloodgroup']);
        $address = trim($_POST['address']);
        $message = trim($_POST['message']);
        $status = 1;

        // Validate mobile number
        if (!preg_match('/^\d{10}$/', $mobile)) {
            $error = "Invalid mobile number. It must be exactly 10 digits.";
        } 
        // Validate email
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } 
        else {
            // Sanitize inputs
            $fullname = filter_var($fullname,);
            $mobile = filter_var($mobile, FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $age = filter_var($age, FILTER_SANITIZE_NUMBER_INT);
            $gender = filter_var($gender, );
            $bloodgroup = filter_var($bloodgroup, );
            $address = filter_var($address, );
            $message = filter_var($message, );

            // Insert into database
            $sql = "INSERT INTO tblblooddonars (FullName, MobileNumber, EmailId, Age, Gender, BloodGroup, Address, Message, status) 
                    VALUES (:fullname, :mobile, :email, :age, :gender, :bloodgroup, :address, :message, :status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
            $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':age', $age, PDO::PARAM_STR);
            $query->bindParam(':gender', $gender, PDO::PARAM_STR);
            $query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();

            if ($lastInsertId) {
                $msg = "Your info submitted successfully";
            } else {
                $error = "Something went wrong. Please try again";
            }
        }
    }
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
    <title>BBDMS | Admin Add Donor</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .panel {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .panel-heading {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>

    <script language="javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            return (charCode > 31 && (charCode < 48 || charCode > 57)) ? false : true;
        }

        function validateForm() {
            var mobile = document.forms["donorForm"]["mobileno"].value;
            var email = document.forms["donorForm"]["emailid"].value;

            // Validate mobile number
            if (!/^\d{10}$/.test(mobile)) {
                alert("Invalid mobile number. It must be exactly 10 digits.");
                return false;
            }

            // Validate email
            if (!/\S+@\S+\.\S+/.test(email)) {
                alert("Invalid email format.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Add Donor</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">Basic Info</div>
                            <div class="panel-body">
                                <?php if ($error) { ?>
                                    <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?></div>
                                <?php } else if ($msg) { ?>
                                    <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?></div>
                                <?php } ?>
                                <form name="donorForm" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Full Name<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="fullname" class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label">Mobile No<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mobileno" onKeyPress="return isNumberKey(event)" maxlength="10" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email id</label>
                                        <div class="col-sm-4">
                                            <input type="email" name="emailid" class="form-control">
                                        </div>
                                        <label class="col-sm-2 control-label">Age<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="age" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Gender <span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select name="gender" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label">Blood Group<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select name="bloodgroup" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT * from tblbloodgroup";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) { ?>
                                                        <option value="<?php echo htmlentities($result->BloodGroup); ?>"><?php echo htmlentities($result->BloodGroup); ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Message<span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                            <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                        </div>
										</div>
                                </form>
                            </div>
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
</body>
</html>
<?php } ?>