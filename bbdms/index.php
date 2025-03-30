<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank & Donor Management System</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Google Font -->
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
        body {
            background-color: #F7F9F9; /* Light gray background */
            color: #2C3E50; /* Dark text color for better contrast */
            font-family: 'Roboto', sans-serif; /* Modern font style */
            padding: 20px; /* Padding around the content */
            animation: backgroundAnimation 10s infinite alternate; /* Background color animation */
        }

        .navbar-toggler {
            z-index: 1;
        }

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: block;
        }

        /* Section Styling */
        .section {
            padding: 40px; /* Padding for each section */
            border-radius: 10px; /* Rounded corners */
            margin-bottom: 20px; /* Space between sections */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            opacity: 0; /* Start hidden */
            transform: translateY(50px); /* Start slightly below */
            transition: opacity 0.5s ease, transform 0.5s ease; /* Smooth transition */
        }

        .visible {
            opacity: 1; /* Fully visible */
            transform: translateY(0); /* Move to original position */
            animation: slideIn 0.5s forwards; /* Slide-in effect */
        }

        @keyframes slideIn {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Color Variants for Sections */
        .portfolio-section {
            background-color: rgb(228, 147, 147); /* White background */
        }

        .features-section {
            background-color: rgb(249, 129, 139); /* Light red */
        }

        .call-to-action-section {
            padding: 40px; /* Padding for the section */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            position: relative; /* Positioning for the hover effect */
            overflow: hidden; /* Hide overflow for the hover effect */
            background-color: #F5B7B1; /* Soft red */
            border: 2px solid #C0392B; /* Border to highlight the section */
            transition: transform 0.3s ease; /* Smooth transition for hover effect */
        }

        .call-to-action-section:hover {
            transform: scale(1.02); /* Slightly enlarge on hover */
        }

        .call-to-action-section h4 {
            color: #C0392B; /* Heading color */
            font-weight: bold;
            margin-bottom: 20px; /* Space below the heading */
            font-size: 1.8rem; /* Increase font size for emphasis */
        }

        .call-to-action-section p {
            color: #2C3E50; /* Text color */
            font-size: 1.1rem; /* Slightly larger font size for readability */
        }

        .btn-donate {
            background: linear-gradient(90deg, #C0392B, #A93226); /* Gradient background */
            color: white;
            font-weight: bold;
            border-radius: 25px; /* Rounded corners */
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
            padding: 15px 30px; /* Padding for the button */
            font-size: 1.2rem; /* Font size for the button */
            border: none; /* Remove border */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            animation: pulse 2s infinite; /* Apply pulse effect */
        }

        .btn-donate:hover {
            background: linear-gradient(90deg, #A93226, #C0392B); /* Reverse gradient on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Shadow effect on hover */
        }

        /* Donor Card Styling */
        .donor-card {
            transition: all 0.3s ease-in-out;
            background: rgb(231, 136, 136); /* White background for cards */
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Shadow for cards */
        }

        .card-title a {
            text-decoration: none;
            font-weight: bold;
            color: #C0392B; /* Link color */
        }

        h2 {
            color: #C0392B; /* Heading color */
            font-weight: bold;
            text-align: center; /* Center align headings */
        }

        /* Zoom Effect on Images */
        .card-img-top {
            transition: transform 0.3s ease; /* Smooth transition */
        }

        .card-img-top:hover {
            transform: scale(1.1); /* Zoom in on hover */
        }

        /* Responsive Adjustments */
        @media (max-width: 576px) {
            h1, h2, h4 {
                font-size: 1.5rem; /* Adjust font size for smaller screens */
            }
        }

        /* Background Animation */
        @keyframes backgroundAnimation {
            0% { background-color: rgb(239, 76, 61); }
            50% { background-color: rgb(92, 45, 44); }
            100% { background-color: rgb(232, 116, 0); }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <?php include('includes/slider.php');?>
   
    <!-- Page Content -->
    <div class="container-fluid">

        <h1 class="my-4 text-center">Welcome to BloodBank & Donor Management System</h1>

        <!-- Portfolio Section -->
        <div class="container-fluid portfolio-section">
            <h2 class="text-center my-4">Some of the Donors</h2>

            <div class="row">
                <?php 
                $status = 1;
                $sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
                $query = $dbh->prepare($sql);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                        <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
                            <div class="card h-100 donor-card">
                                <div class="text-center"> <!-- Centering the image -->
                                    <a href="#">
                                        <img class="card-img-top img-fluid rounded-circle" src="images/d1.jpg" alt="Donor Image" style="height: 200px; width: 200px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        <a href="#" style="color: #C0392B;"><?php echo htmlentities($result->FullName); ?></a>
                                    </h4>
                                    <p class="card-text" style="color: #2C3E50;"><b>Gender:</b> <?php echo htmlentities($result->Gender); ?></p>
                                    <p class="card-text" style="color: #2C3E50;"><b>Blood Group:</b> <?php echo htmlentities($result->BloodGroup); ?></p>
                                    <p class="card-text" style="color: #2C3E50;"><b>Email:</b> <?php echo htmlentities($result->EmailId); ?></p>
                                    <p class="card-text" style="color: #2C3E50;"><b>Phone:</b> <?php echo htmlentities($result->MobileNumber); ?></p>
                                    <p class="card-text"><small class="text-muted">Thank you for your contribution!</small></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <!-- /.row -->
        </div>

        <!-- Features Section -->
        <div class="container-fluid features-section">
            <div class="row section hidden">
                <div class="col-lg-6">
                    <h2 class="text-fade-in">BLOOD GROUPS</h2>
                    <p class="text-fade-in">Blood groups of any human being will mainly fall into one of the following groups:</p>
                    <ul class="text-fade-in">
                        <li>A positive or A negative</li>
                        <li>B positive or B negative</li>
                        <li>O positive or O negative</li>
                        <li>AB positive or AB negative</li>
                    </ul>
                    <p class="text-fade-in">A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">
                </div>
            </div>
            <!-- /.row -->
        </div>

        <hr>

        <!-- Call to Action Section -->
        <div class="container-fluid call-to-action-section">
            <div class="row mb-4 section hidden">
                <div class="col-md-8">
                    <h4>Become a Lifesaver Today!</h4>
                    <p>Your blood donation can save lives. Every drop counts, and your contribution can make a significant difference in the lives of those in need. Join us in our mission to provide safe blood to patients in hospitals and clinics.</p>
                    <p>Whether you are a first-time donor or a regular contributor, your support is invaluable. Learn more about the donation process and how you can help.</p>
                </div>
                <div class="col-md-4 text-center">
                    <a class="btn btn-lg btn-donate btn-block" href="become-donar.php">Become a Donor</a> <!-- Call to action button -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to check if an element is in the viewport
            function isElementInViewport(el) {
                var rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            // Function to add the visible class
            function checkVisibility() {
                $('.section.hidden').each(function() {
                    if (isElementInViewport(this)) {
                        $(this).removeClass('hidden').addClass('visible');
                    }
                });
            }

            // Check visibility on scroll
            $(window).on('scroll', function() {
                checkVisibility();
            });

            // Initial check in case elements are already in view
            checkVisibility();
        });
    </script>

</body>

</html>