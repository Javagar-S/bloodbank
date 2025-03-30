<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodBank & Donor Management System</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .header {
            background: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .ts-sidebar {
            background: #343a40;
            color: #fff;
            height: calc(100vh - 60px); /* Adjust height based on header */
            position: fixed;
            width: 250px;
            top: 60px; /* Position below the header */
            transition: all 0.3s;
            overflow-y: auto; /* Allow scrolling if content overflows */
        }

        .ts-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ts-sidebar-menu li {
            position: relative;
        }

        .ts-sidebar-menu li a {
            display: block;
            padding: 15px;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
        }

        .ts-sidebar-menu li a:hover {
            background: #495057;
        }

        .ts-sidebar-menu .active a {
            background: #007bff;
        }

        .submenu {
            display: none;
            list-style: none;
            padding-left: 15px;
        }

        .ts-sidebar-menu li:hover .submenu {
            display: block;
        }

        .main-content {
            margin-left: 250px; /* Space for sidebar */
            padding: 20px;
            flex: 1; /* Allow main content to grow */
            transition: margin-left 0.3s;
        }

        @media (max-width: 768px) {
            .ts-sidebar {
                width: 100%;
                position: relative;
                top: 0; /* Reset position for mobile */
            }
            .main-content {
                margin-left: 0; /* Reset margin for mobile */
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>BloodBank & Donor Management System</h1>
    </div>

    <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">
            <li class="ts-label">Main</li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
                <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'add-bloodgroup.php' || basename($_SERVER['PHP_SELF']) == 'manage-bloodgroup.php') ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-files-o"></i> Blood Group</a>
                <ul class="submenu">
                    <li><a href="add-bloodgroup.php">Add Blood Group</a></li>
                    <li><a href="manage-bloodgroup.php">Manage Blood Group</a></li>
                </ul>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'add-donor.php') ? 'active' : ''; ?>">
                <a href="add-donor.php"><i class="fa fa-edit"></i> Add Donor</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'donor-list.php') ? 'active' : ''; ?>">
                <a href="donor-list.php"><i class="fa fa-users"></i> Donor List</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'manage-conactusquery.php') ? 'active' : ''; ?>">
                <a href="manage-conactusquery.php"><i class="fa fa-desktop"></i> Manage Contact Query</a>
            </li>
            <li class="<?php echo            (basename($_SERVER['PHP_SELF']) == 'manage-pages.php') ? 'active' : ''; ?>">
                <a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'update-contactinfo.php') ? 'active' : ''; ?>">
                <a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a>
            </li>
        </ul>
    </nav>
    <script>
        // Optional: Add JavaScript to toggle submenu visibility
        document.querySelectorAll('.ts-sidebar-menu li > a').forEach(item => {
            item.addEventListener('click', event => {
                const submenu = item.nextElementSibling;
                if (submenu && submenu.classList.contains('submenu')) {
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
    </script>

</body>
</html>