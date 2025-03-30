<?php
session_start();
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

    <title>RedRipple - Blood Donation</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Google Font -->

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <style>
        /* Custom styles */
        body {
            font-family: 'Roboto', sans-serif; /* Use Roboto font */
            background-color: #f4f6f9; /* Light background color */
            color: #333333; /* Darker color for text to ensure visibility */
        }

        h1 {
            font-size: 2.8rem; /* Increase font size */
            font-weight: bold; /* Make it bold */
            color: #c0392b; /* Dark red color */
            text-align: center; /* Center align heading */
            margin-top: 30px; /* Add margin to the top */
            opacity: 0; /* Start hidden */
            transform: translateY(-30px); /* Start above */
            animation: slideIn 0.6s forwards; /* Animation for heading */
        }

        p {
            font-size: 1.2rem; /* Increase font size */
            font-weight: 400; /* Normal font weight */
            line-height: 1.6; /* Increase line height for readability */
            margin-bottom: 20px; /* Add margin below paragraphs */
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start below */
            animation: slideIn 0.6s forwards; /* Animation for paragraph */
            animation-delay: 0.2s; /* Delay for paragraph */
            color: #444444; /* Dark gray color for better visibility */
        }

        .breadcrumb-item a {
            color: #2980b9; /* Blue color for breadcrumb links */
            transition: color 0.3s ease; /* Transition for hover effect */
        }

        .breadcrumb-item a:hover {
            color: #1a5276; /* Darker blue on hover */
        }

        .breadcrumb-item.active {
            color: #2c3e50; /* Darker color for active breadcrumb */
        }

        .container-fluid {
            max-width: 1200px; /* Set a max width for the container */
            margin: 0 auto; /* Center the container */
            padding: 30px; /* Add padding */
            background-color: #ffffff; /* White background for the content area */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        /* Animation Keyframes */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Back to Top Button */
        #backToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none; /* Hidden by default */
            background-color: #c0392b; /* Red color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 1000;
        }

        #backToTop:hover {
            background-color: #a93226; /* Darker red on hover */
        }

        /* Call to Action Section */
        .cta-section {
            background-color: #f8d7da; /* Light red background */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 30px;
        }

        .cta-section h2 {
            color: #c0392b; /* Dark red color */
        }

        .cta-section p {
            color: #333333; /* Darker text color */
        }

        .cta-section .btn {
            background-color: #c0392b; /* Red color */
            color: white;
        }

        .cta-section .btn:hover {
            background-color: #a93226; /* Darker red on hover */
        }
    </style>

</head>

<body>

<?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <div class="container-fluid">
        <?php 
        $pagetype = $_GET['type'];
        $sql = "SELECT type, detail, PageName FROM tblpages WHERE type = :pagetype";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
                <h1 class="mt-4 mb-3"><?php echo htmlentities($result->PageName); ?></h1>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo htmlentities($result->PageName); ?></li>
                </ol>

                <p><?php echo $result->detail; ?></p>
        <?php }
        } else { ?>
            <h1 class="mt-4 mb-3">Page Not Found</h1>
            <p>Sorry, the page you are looking for does not exist.</p>
        <?php } ?>
    </div>
    <!-- /.container-fluid -->

    <!-- Call to Action Section -->
    <div class="container-fluid cta-section">
        <h2>Become a Lifesaver Today!</h2>
        <p>Your blood donation can save lives. Join us in our mission to provide safe blood to those in need.</p>
        <a href="donate.php" class="btn btn-lg">Donate Now</a>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" title="Go to top">Top</button>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script>
        // Trigger animations on page load
        document.addEventListener("DOMContentLoaded", function() {
            const headings = document.querySelectorAll('h1');
            const paragraphs = document.querySelectorAll('p');

            headings.forEach((heading, index) => {
                heading.style.animationDelay = `${index * 0.1}s`;
                heading.style.opacity = 1;
                heading.style.transform = 'translateY(0)';
            });

            paragraphs.forEach((paragraph, index) => {
                paragraph.style.animationDelay = `${index * 0.1 + 0.2}s`;
                paragraph.style.opacity = 1;
                paragraph.style.transform = 'translateY(0)';
            });
        });

        // Back to Top Button
        const backToTopButton = document.getElementById("backToTop");

        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        };

        backToTopButton.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        };
    </script>

</body>

</html>