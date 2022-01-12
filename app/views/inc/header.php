<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UFT-8">
    <title>Responsive Sidebar Menu</title>
    <link rel = "stylesheet" href = "color/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href = "<?php echo URLROOT; ?>/css/style.css" rel = "stylesheet">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <style>
        #login {
            background-color: #007FFF;
        }
    </style>
</head>
<body>

<div class = "top-nav">

    <div class = "left-nav">
        <a href = "<?php echo URLROOT; ?>">Home</a>
        <a href = "<?php echo URLROOT; ?>/Play">Play</a>
<!--    <a href = "--><?php //echo URLROOT; ?><!--/Users/login" class = "login-button">Login</a>-->
<!--    <a href = "--><?php //echo URLROOT; ?><!--/Users/Register" class = "register-button">Register</a>-->
        <a href = "<?php echo URLROOT; ?>/Contact">Contact Us</a>
    </div>


    <div class = "right-nav">

<!--        <a href = "#" class = "login-button">Welcome --><?php //echo $_SESSION['user_name'];?><!-- </a>-->


        <?php if(isset($_SESSION['user_id'])) : ?>

            <a href = "<?php echo URLROOT; ?>" class = "login-button">Welcome <?php echo $_SESSION['user_name'];?> </a>


            <a href = "<?php echo URLROOT; ?>/Users/logout" class = "login-button">Logout</a>

        <?php else : ?>
        <a id="login" href = "<?php echo URLROOT; ?>/Users/login" class = "login-button">Login</a>


        <a  href = "<?php echo URLROOT; ?>/Users/Register" class = "register-button">Register</a>
        <?php endif; ?>
    </div>

</div>

