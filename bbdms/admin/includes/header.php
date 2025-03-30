<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedRipple - BloodBank & Donor Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,600,700');

        :root {
            --font-family: 'Poppins', sans-serif;
            --primary-color: #37a6c4;
            --primary-dark: #2c849c;
            --background-color: #f0f0f0;
            --text-color: #222;
            --white-color: #fff;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background: linear-gradient(to right, rgb(223, 36, 36), rgb(233, 26, 26));
            color: var(--white-color);
        }
        .brand img {
            width: 40px;
            height: 40px;
            margin-right: 5px; /* Reduced margin to bring text closer */
            border-radius: 50%; /* Makes the logo round */
        }
        .brand a {
            font-size: 24px;
            font-weight: bold;
            color: var(--white-color);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .ts-profile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .ts-profile-nav li {
            position: relative;
            margin-left: 15px;
        }
        .ts-profile-nav li a {
            color: var(--white-color);
            text-decoration: none;
            padding: 8px;
            font-size: 14px;
            transition: background 0.3s;
        }
        .ts-profile-nav li a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .ts-profile-nav ul {
            display: none;
            position: absolute;
            background: #000;
            padding: 10px;
            border-radius: 5px;
            top: 100%;
            right: 0;
            z-index: 1000;
        }
        .ts-profile-nav li:hover ul {
            display: block;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .btn-brand, .btn-toggle {
            background-color: var(--primary-color);
            color: var(--white-color);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }
        .btn-brand:hover, .btn-toggle:hover {
            background-color: var(--primary-dark);
        }
        .dark-theme {
            --background-color: #222;
            --text-color: var(--white-color);
        }
        .dark-theme .btn-brand, .dark-theme .btn-toggle {
            background-color: var(--white-color);
            color: var(--primary-color);
        }
        .dark-theme .btn-brand:hover, .dark-theme .btn-toggle:hover {
            background-color: var(--primary-dark);
            color: var(--white-color);
        }
        @media (max-width: 768px) {
            .brand {
                flex-direction: column;
                align-items: center;
            }
            .ts-profile-nav {
                flex-direction: column;
                align-items: center;
            }
            .ts-profile-nav li {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

<div class="brand">
    <a href="dashboard.php">
        <img src="img/main_logo.jpg" alt="RedRipple Logo">
        RedRipple
    </a>
	<a href="dashboard.php">RedRipple - BloodBank & Donor Management System</a>
    <ul class="ts-profile-nav">
        <li class="ts-account">
            <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
            <ul>
                <li><a href="change-password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>
</body>
</html>
