<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Ripple Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .logo {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            margin-right: 15px;
            border: 3px solid white; /* Circle border for the logo */
        }

        .brand-text {
            font-size: 40px; /* Increased font size for better visibility */
            font-weight: bold;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .navbar {
            background-color: #d32f2f; /* Solid red background */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff !important;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.8);
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        .navbar-toggler {
            border: none;
            background: transparent; /* Make background transparent */
            padding: 5px 10px;
            border-radius: 5px;
            position: relative; /* Position relative for better control */
            z-index: 1; /* Ensure it stays above other elements */
        }

        .navbar-toggler:focus {
            outline: none; /* Remove outline on focus */
        }

        .navbar-toggler-icon {
            background-image: none; /* Remove default icon */
        }

        .navbar-toggler .slash {
            display: block;
            width: 30px; /* Width of each slash */
            height: 4px; /* Height of each slash */
            background-color: white; /* Color of the slashes */
            margin: 5px auto; /* Center slashes */
            transition: all 0.3s ease; /* Smooth transition */
        }

        .btn-donate {
            background-color: #ff4d4d; /* Red color for the button */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-donate:hover {
            background-color: #e60000; /* Darker red on hover */
        }

        @media (max-width: 768px) {
            .brand-text {
                font-size: 30px; /* Smaller font size for mobile */
            }
            .navbar-nav .nav-link {
                font-size: 14px; /* Smaller font size for mobile */
            }
        }
    </style>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-md">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="images/main_logo.jpg" alt="Logo" class="logo"> 
            <span class="brand-text">RED RIPPLE</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="slash"></div>
            <div class="slash"></div>
            <div class="slash"></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto"> <!-- Added ml-auto to push nav items to the right -->
                <li class="nav-item">
                <a class="nav-link" href="page.php?type=aboutus"><i class="fas fa-info-circle"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page.php?type=donor"><i class="fas fa-heart"></i> Why Become Donor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="become-donar.php"><i class="fas fa-user-plus"></i> Become a Donor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search-donor.php"><i class="fas fa-search"></i> Search Blood</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
