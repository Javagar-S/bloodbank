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
    <title>RedRipple - Blood Donation</title>

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            overflow-x: hidden;
        }

        /* Ensure content is properly spaced below the header */
        .content-container {
            padding-top: 80px; /* Prevent overlap with header */
        }

        /* Page Title */
        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #c0392b;
            text-align: center;
            margin-bottom: 20px;
            transition: 0.3s ease-in-out;
        }
        h2:hover {
            color: #a93226;
            transform: scale(1.05);
        }

        /* Breadcrumb */
        .breadcrumb {
            background: none;
            margin-bottom: 15px;
        }
        .breadcrumb a {
            color: #3498db;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .breadcrumb a:hover {
            color: #1a5276;
        }

        /* Content Section */
        .content-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .content-section p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #000; /* Set text color to black */
            font-weight: bold; /* Make text bold */
            transition: 0.3s ease-in-out;
        }

        .content-section p:hover {
            color: #c0392b;
            transform: translateX(5px);
        }

        /* Call to Action Section */
        .cta {
            background: linear-gradient(135deg, #c0392b, #a93226);
            color: white;
            padding: 25px;
            text-align: center;
            border-radius: 12px;
            font-size: 1.4rem;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .cta:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        /* Blood Drop Button */
        .donate-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: #c0392b;
            padding: 12px 20px;
            border-radius: 50px 50px 50px 0; /* Blood drop shape */
            font-weight: bold;
            font-size: 1.2rem;
            text-decoration: none;
            position: relative;
            transition: 0.3s;
            border: 2px solid white;
        }
        
        .donate-btn i {
            margin-right: 8px;
            font-size: 1.4rem;
        }
        
        .donate-btn:hover {
            background: #e74c3c;
            color: white;
            border: 2px solid #e74c3c;
            transform: scale(1.1);
        }

        /* Back to Top Button */
        #backToTop {
            position: fixed;
            bottom: 15px;
            right: 15px;
            display: none;
            background: #c0392b;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            z-index: 1000;
            transition: 0.3s;
        }

        #backToTop:hover {
            background: #a93226;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Content Section -->
<div class="container content-container">
    <div class="content-section">
        <?php 
        $pagetype = $_GET['type'];
        $sql = "SELECT type, detail, PageName FROM tblpages WHERE type = :pagetype";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
                <h2><?php echo htmlentities($result->PageName); ?></h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo htmlentities($result->PageName); ?></li>
                </ol>
                <p><?php echo $result->detail; ?></p>
        <?php }
        } else { ?>
            <h2>Page Not Found</h2>
            <p>Sorry, the page you are looking for does not exist.</p>
        <?php } ?>
    </div>
</div>

<!-- Call to Action Section -->
<div class="container">
    <div class="cta">
        <p>Be a Hero. Save a Life.</p>
        <a href="become-donar.php" class="donate-btn">
            <i class="fa fa-tint"></i> Donate Now
        </a>
    </div>
</div>

<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Back to Top Button -->
<button id="backToTop">Top</button>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const backToTop = document.getElementById("backToTop");

        window.addEventListener("scroll", function() {
            backToTop.style.display = window.scrollY > 200 ? "block" : "none";
        });

        backToTop.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

        // Animate elements on scroll
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = "fadeIn 1s forwards";
                }
            });
        });

        document.querySelectorAll(".content-section, .cta").forEach(el => observer.observe(el));
    });
</script>

</body>
</html>
