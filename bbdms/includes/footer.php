<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS File -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>
        html, body {
            height: 100%; /* Full height for flexbox */
            margin: 0; /* Remove default margin */
            display: flex; /* Use flexbox */
            flex-direction: column; /* Stack children vertically */
            background-color: rgb(200, 222, 243);
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .content {
            flex: 1; /* Allow content to grow and fill space */
        }

        .footer {
            background-color: black; /* Set footer background to black */
            color: #fff;
            padding: 40px;
            text-align: left;
            animation: fadeIn 1s ease-in-out; /* Add fade-in animation */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            width: 22%;
            margin-bottom: 20px;
        }

        .footer-title {
            font-size: 24px;
            font-weight: bold;
            color: #e2dcdb;  /* Coral for titles */
            margin-bottom: 15px;
            text-align: center;
        }

        .footer-section ul {
            list-style: none;
            padding-left: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #ddd;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            color: #f5f5f0;  /* Hover effect with Coral */
        }

        /* Call to Action Button */
        .donate-button {
            background-color: #ff4d4d; /* Red color for the button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-align: center;
            display: block;
            margin: 20px auto;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .donate-button:hover {
            background-color: #e60000; /* Darker red on hover */
        }

        /* Social Media Icons */
        .social-media {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .social-media a img {
            width: 50px; /* Set width for images */
            height: 50px; /* Set height for images */
            border-radius: 50%; /* Make images round */
            transition: transform 0.3s ease-in-out;
        }

        .social-media a img:hover {
            transform: scale(1.1); /* Slight scale effect on hover */
        }

        /* App Buttons */
        .app-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .app-buttons a img {
            width: 120px; /* Set width for app store images */
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .app-buttons a img:hover {
            transform: scale(1.1); /* Slight scale effect on hover */
        }

        /* Footer Bottom */
        .footer-bottom {
            text-align: center;
            margin-top: 30px;
        }

        .footer-bottom p {
            margin: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .footer-section {
                width: 45%;
                margin-bottom: 20px;
            }

            .footer-bottom p {
                font-size: 14px;
            }

            .social-media a img {
                width: 35px; /* Adjust size for smaller screens */
                height: 35px;
            }

            .app-buttons a img {
                width: 100px; /* Adjust size for app buttons */
            }
        }

        @media (max-width: 480px) {
            .footer-section {
                width: 100%;
                text-align: center;
            }

            .social-media a img {
                width: 30px; /* Further adjust size for small screens */
                height: 30px;
            }

            .app-buttons a img {
                width: 90px; /* Further adjust size for small screens */
            }
        }
        
        p {
            color: #FFFFFF; /* Set paragraph text color to white */
        }
    </style>
</head>
<body>

<div class="content">
    <!-- Your main content goes here -->
</div>

<div class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3 class="footer-title">About Us</h3>
            <p>A blood donation platform connecting donors and recipients, providing vital information about blood donation, storage, and transfusion services.</p>
        </div>
        <div class="footer-section">
            <h3 class="footer-title">Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="page.php?type=aboutus">About</a></li>
                <li><a href="become-donar.php">Become a Donor</a></li>
                <li><a href="search-donor.php">Search Blood</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3 class="footer-title">Contact</h3>
            <ul>
                <li>Email: contact@redripple.com</li>
                <li>Phone: +123 456 789</li>
                <li>Address: 123 Red Ripple St, BENGALURU, INDIA</li>
            </ul>
        </div>
        <div class="footer-section">
            <h3 class="footer-title">Follow Us</h3>
            <div class="social-media">
                <a href="https://www.facebook.com/share/1LxjDwdUr1/" target="_blank"><img src="images/fb.jpeg" alt="Facebook"></a>
                <a href="https://www.instagram.com/_red.ripple_/" target="_blank"><img src="images/insta.jpeg" alt="Instagram"></a>
                <a href="https://linkedin.com" target="_blank"><img src="images/lin.png" alt="LinkedIn"></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Red Ripple. All Rights Reserved.</p>
        <div class="app-buttons">
            <a href="https://play.google.com/store/apps" target="_blank">
                <img src="images/play.avif" alt="Google Play">
            </a>
            <a href="https://www.apple.com/app-store/" target="_blank">
                <img src="images/app.avif" alt="App Store">
            </a>
        </div>
    </div>
</div>

<!-- jQuery File -->
<script type="text/javascript" src="jquery/jquery.js"></script>

<!-- Bootstrap JS File -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- Fontawesome Icon JS -->
<script defer src="fontawesome/js/all.js"></script>

</body>
</html>
