<?php
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])) {
    // Sanitize and validate inputs
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $mobile = htmlspecialchars(trim($_POST['mobileno']));
    $email = htmlspecialchars(trim($_POST['emailid']));
    $age = htmlspecialchars(trim($_POST['age']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $bloodgroup = htmlspecialchars(trim($_POST['bloodgroup']));
    $address = htmlspecialchars(trim($_POST['address']));
    $message = htmlspecialchars(trim($_POST['message']));
    $status = 1;

    // Validate mobile number (basic validation)
    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        $error = "Invalid mobile number. Please enter a 10-digit number.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (!is_numeric($age) || $age < 1 || $age > 120) {
        $error = "Please enter a valid age.";
    } else {
        // Prepare SQL statement
        $sql = "INSERT INTO tblblooddonars (FullName, MobileNumber, EmailId, Age, Gender, BloodGroup, Address, Message, status) 
                VALUES (:fullname, :mobile, :email, :age, :gender, :bloodgroup, :address, :message, :status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':age', $age, PDO::PARAM_INT);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_INT);
        
        // Execute the query
        if ($query->execute()) {
            $msg = "Your information has been submitted successfully.";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BloodBank & Donor Management System | Become A Donor</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Change font family */
            background-color: #f0f8ff; /* Light background color */
            color: #333; /* Dark text color for better readability */
        }

        .navbar-toggler {
            z-index: 1;
        }

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .donor-container {
            background-color: #ffebee; /* Light red background */
            padding: 40px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s; /* Smooth transition */
        }
        .donor-container:hover {
            transform: scale(1.03); /* Slightly enlarge on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Deeper shadow on hover */
        }
        .font-italic {
            font-size: 1.1rem;
            color: #d32f2f; /* Dark red color for labels */
        }
        h1 {
            font-size: 2.5rem;
            color: #c2185b; /* Dark pink color for heading */
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .font-italic {
                font-size: 1rem;
            }
        }
        input, select, textarea {
            border: 1px solid #c2185b; /* Dark pink border */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }
        input:focus, select:focus, textarea:focus {
            border-color: #d32f2f; /* Darker red on focus */
            box-shadow: 0 0 5px rgba(211, 47, 47, 0.5); /* Shadow on focus */
        }
        .btn-primary {
            background-color: #c2185b; /* Dark pink button */
            border-color: #c2185b; /* Dark pink border */
        }
        .btn-primary:hover {
            background-color: #d32f2f; /* Darker red on hover */
            border-color: #d32f2f; /* Darker red border on hover */
        }
    </style>
</head>

<body>

<?php include('includes/header.php');?>

<!-- Page Content -->
<div class="container">

    <!-- Donor Form Container -->
    <div class="donor-container">
        <h1 class="mt-4 mb-3">Become a <small>Donor</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Become a Donor</li>
        </ol>

        <?php if(isset($error)) { ?>
            <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
        <?php } else if(isset($msg)) { ?>
            <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
        <?php } ?>

        <form name="donar" method="post">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Full Name<span style="color:red">*</span></label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>
                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Mobile Number<span style="color:red">*</span></label>
                    <input type="text" name="mobileno" class="form-control" required>
                </div>
                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Email Id</label>
                    <input type="email" name="emailid" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Age<span style="color:red">*</span></label>
                    <input type="text" name="age" class="form-control" required>
                </div>

                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Gender<span style="color:red">*</span></label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Blood Group<span style="color:red">*</span></label>
                    <select name="bloodgroup" class="form-control" required>
                        <?php 
                        $sql = "SELECT * FROM tblbloodgroup";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() > 0) {
                            foreach($results as $result) { ?>  
                                <option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <label class="font-italic">Address</label>
                    <textarea class="form-control" name="address"></textarea>
                </div>

                <div class="col-lg-8 mb-4">
                    <label class="font-italic">Message<span style="color:red">*</span></label>
                    <textarea class="form-control" name="message" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer">
                </div>
            </div>
        </form>   
    </div>
</div>

<?php include('includes/footer.php'); ?>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/tether/tether.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>