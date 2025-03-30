<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['send'])) {
    $name = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $contactno = trim($_POST['contactno']);
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($contactno) && !empty($message)) {
        $sql = "INSERT INTO tblcontactusquery(name, EmailId, ContactNumber, Message) VALUES(:name, :email, :contactno, :message)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);

        if ($query->execute()) {
            $msg = "Query Sent Successfully! We will contact you shortly.";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blood Donation - Contact Us</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">

    <style>
        body {
            background-color: #f2f2f2;
            font-size: 20px;
        }

        .contact-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            border: 3px solid #e74c3c;
            color: #333;
        }

        .contact-container:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        }

        .contact-header {
            background-color: #e74c3c;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #c0392b;
            border-color: #c0392b;
            width: 100%;
            font-size: 20px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #a93226;
            border-color: #a93226;
            transform: scale(1.05);
        }

        .errorWrap, .succWrap {
            padding: 15px;
            margin-bottom: 15px;
            background: #fff;
            border-left: 5px solid;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            font-size: 18px;
        }

        .errorWrap { border-left-color: #dd3d36; color: #dd3d36; }
        .succWrap { border-left-color: #5cb85c; color: #5cb85c; }

        .form-control {
            font-size: 18px;
            padding: 12px;
            border-radius: 6px;
            border: 2px solid #ccc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 10px rgba(231, 76, 60, 0.4);
            transform: scale(1.02);
        }

        .breadcrumb {
            background: #fff;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .contact-container { padding: 30px; font-size: 18px; }
            .btn-primary { font-size: 18px; padding: 10px; }
            .contact-header { font-size: 22px; }
        }
    </style>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="contact-container">
                    
                    <h1 class="mt-3 mb-3 text-center">Contact Us</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>

                    <div class="contact-header">Send us a Message</div>

                    <?php if ($error) { ?>
                        <div class="errorWrap"><strong>ERROR:</strong> <?php echo htmlentities($error); ?></div>
                    <?php } else if ($msg) { ?>
                        <div class="succWrap"><strong>SUCCESS:</strong> <?php echo htmlentities($msg); ?></div>
                    <?php } ?>

                    <form method="post">
                        <div class="form-group">
                            <label><b>Full Name:</b></label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label><b>Phone Number:</b></label>
                            <input type="tel" class="form-control" name="contactno" required>
                        </div>
                        <div class="form-group">
                            <label><b>Email Address:</b></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label><b>Message:</b></label>
                            <textarea rows="5" class="form-control" name="message" required></textarea>
                        </div>
                        <button type="submit" name="send" class="btn btn-primary">Send Message</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
