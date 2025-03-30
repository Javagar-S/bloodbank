<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation - Save Lives</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Reset margins and paddings */
        body, header {
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        header {
            background: #ff4d4d;
            padding: 15px 0;
            text-align: center;
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
        }

        /* Carousel Section */
        section {
            margin-top: 20px; /* Avoid content overlap */
        }

        .carousel-item {
            height: 90vh; /* Adjusted for better view */
            min-height: 500px;
            position: relative;
            overflow: hidden;
        }

        /* Background Image */
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            loading: lazy; /* Improves performance */
        }

        /* Dark overlay */
        .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.2));
            z-index: 1;
        }

        /* Centered Captions */
        .carousel-caption {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            text-align: center;
            z-index: 2;
            color: #fff;
        }

        /* Heading */
        .carousel-caption h5 {
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            animation: fadeIn 1s ease-in-out;
        }

        .carousel-caption p {
            font-size: 1.8rem;
            font-weight: 400;
            max-width: 650px;
            margin: auto;
            animation: fadeInUp 1s ease-in-out;
        }

        /* Call-to-Action Buttons */
        .btn-primary {
            background-color: #ff4d4d;
            border: none;
            padding: 12px 25px;
            font-size: 1.4rem;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 30px;
            margin-top: 15px;
            transition: background-color 0.3s, box-shadow 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #cc0000;
            box-shadow: 0px 0px 15px rgba(255, 77, 77, 0.7);
            transform: scale(1.05);
        }

        /* Carousel Indicators */
        .carousel-indicators li {
            background-color: rgba(255, 255, 255, 0.5);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .carousel-indicators .active {
            background-color: #ff4d4d;
            width: 14px;
            height: 14px;
        }

        .carousel-control-prev, .carousel-control-next {
    width: 5%; /* Adjust width as needed */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: transparent; /* No background color */
    color: #ff4d4d; /* Icon color */
    font-size: 1.5rem; /* Adjust icon size */
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    color: #cc0000; /* Darker color on hover */
}
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .carousel-caption {
        width: 90%;
    }
    .carousel-caption h5 {
        font-size: 2rem;
    }
    .carousel-caption p {
        font-size: 1.2rem;
    }
    .btn-primary {
        font-size: 1rem;
        padding: 10px 20px;
    }
}

@media (max-width: 576px) {
    .carousel-caption h5 {
        font-size: 1.8rem;
    }
    .carousel-caption p {
        font-size: 1rem;
    }
}
</style>
</head>
<body>

<!-- Carousel Section -->
<section>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
</ol>
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="images/banner1.jpg" alt="Donate Blood">
        <div class="carousel-caption">
            <h5>Be a Hero, Save a Life!</h5>
            <p>Your blood donation can make a huge impact on someone's life.</p>
            <a href="become-donar.php" class="btn btn-primary">Become a Donor</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="images/cr001.webp" alt="Learn More">
        <div class="carousel-caption">
            <h5>Join Our Mission</h5>
            <p>We are committed to saving lives. Learn more about us!</p>
            <a href="page.php?type=aboutus" class="btn btn-primary">About Us</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="images/cr02.webp" alt="Why Donate?">
        <div class="carousel-caption">
            <h5>Every Drop Counts</h5>
            <p>Donating blood is a simple act that can save multiple lives.</p>
            <a href="page.php?type=donor" class="btn btn-primary">Why Donate?</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="images/cr03.webp" alt="Contact Us">
        <div class="carousel-caption">
            <h5>Have Questions?</h5>
            <p>We are here to help. Contact us for more information.</p>
            <a href="contact.php" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
</section>

<!-- Bootstrap JS and dependencies -->
<script defer src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>