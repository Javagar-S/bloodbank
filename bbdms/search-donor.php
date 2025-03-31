<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BloodBank & Donor Management System | Search Donor</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">

    <style>
        /* Custom Styling */
        .errorWrap, .succWrap {
            padding: 12px;
            margin: 12px 0;
            background: #fff;
            border-left: 4px solid;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
            font-size: 18px;
        }
        .errorWrap { border-color: #dd3d36; color: #dd3d36; }
        .succWrap { border-color: #5cb85c; color: #5cb85c; }

        /* Search Form Container */
        .search-container {
            padding: 30px;
            border-radius: 12px;
            background: #f8f9fa;
            box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.15);
        }

        /* Text & Label Styling */
        h1 {
            font-size: 32px;
            color: #d9534f;
            font-weight: bold;
        }
        label {
            font-size: 20px;
            font-weight: bold;
            color: #343a40;
        }
        .btn-lg {
            font-size: 20px;
            transition: all 0.3s ease-in-out;
        }
        .btn-lg:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }
        .form-control {
            transition: all 0.3s ease-in-out;
        }
        .form-control:hover, .form-control:focus {
            border-color: #d9534f;
            box-shadow: 0px 0px 5px rgba(217, 83, 79, 0.5);
        }

        /* Donor Card Styling */
        .donor-card {
            transition: all 0.3s ease-in-out;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        .donor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }
        .donor-card h4 {
            color: #C0392B;
            font-weight: bold;
        }
        .donor-card p {
            color: #2C3E50;
            font-size: 16px;
        }
        .thank-you {
            font-size: 14px;
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container mt-4">
        <!-- Search Container -->
        <div class="search-container">
            <h1 class="text-center">Search Donor</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Search Donor</li>
                </ol>
            </nav>

            <!-- Error & Success Messages -->
            <?php if ($error) { ?>
                <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
            <?php } elseif ($msg) { ?>
                <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
            <?php } ?>

            <!-- Search Form -->
            <form method="post">
                <div class="row">
                    <!-- Blood Group -->
                    <div class="col-md-6 mb-3">
                        <label>Blood Group <span class="text-danger">*</span></label>
                        <select name="bloodgroup" class="form-control rounded-pill border-danger" required>
                            <option value="">Select Blood Group</option>
                            <?php 
                            $sql = "SELECT DISTINCT BloodGroup FROM tblbloodgroup ORDER BY BloodGroup";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $result) { 
                                $selected = (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == $result->BloodGroup) ? "selected" : "";
                            ?>  
                                <option value="<?php echo htmlentities($result->BloodGroup);?>" <?php echo $selected; ?>>
                                    <?php echo htmlentities($result->BloodGroup);?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Location -->
                    <div class="col-md-6 mb-3">
                        <label>Location (Optional)</label>
                        <input type="text" class="form-control rounded border-danger" name="location" 
                               placeholder="Enter location" value="<?php echo isset($_POST['location']) ? htmlentities($_POST['location']) : ''; ?>">
                    </div>

                    <!-- Search Button -->
                    <div class="col-md-12 text-center">
                        <button type="submit" name="submit" class="btn btn-danger btn-lg w-50 rounded-pill">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Display Donors -->
        <div class="row mt-4">
            <?php 
            if (isset($_POST['submit'])) {
                $status = 1;
                $bloodgroup = $_POST['bloodgroup'];
                $location = $_POST['location'];
                $sql = "SELECT * FROM tblblooddonars WHERE status=:status AND BloodGroup=:bloodgroup";
                if (!empty($location)) {
                    $sql .= " AND Address LIKE :location";
                }
                $query = $dbh->prepare($sql);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
                if (!empty($location)) {
                    $query->bindValue(':location', "%$location%", PDO::PARAM_STR);
                }
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="card donor-card text-center p-3">
                                <a href="#">
                                    <img class="card-img-top img-fluid rounded-circle mx-auto mt-3" src="images/d1.jpg" 
                                         alt="Donor Image" style="height: 150px; width: 150px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h4><?php echo htmlentities($result->FullName); ?></h4>
                                    <p><b>Blood Group:</b> <?php echo htmlentities($result->BloodGroup); ?></p>
                                    <p><b>Location:</b> <?php echo htmlentities($result->Address); ?></p>
                                    <p><b>Email:</b> <?php echo htmlentities($result->EmailId); ?></p>
                                    <p><b>Phone:</b> <?php echo htmlentities($result->MobileNumber); ?></p>
                                    <p class="thank-you">Thank you for your contribution!</p>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo "<div class='col-12 text-center'><h4 class='text-danger'>No Donors Found</h4></div>";
                }
            } ?>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
